<?php

namespace App\Controller;

use DateTime;
use App\Entity\Car;
use App\Entity\Date;
use App\Entity\Client;

use App\Entity\Categorie;

use App\Entity\DateSearch;
use App\Entity\Reservation;
use App\Service\T_HTML2PDF;
use App\Form\DateSearchType;
use App\Form\ReservationType;
use App\Form\DateReservationType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ReservationRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @IsGranted("ROLE_USER")
 * 
 */

class ReservationController extends AbstractController
{

    /**
     * @Route("/new_reservation", name="new_reservation")
     * @param Request $request
     * @return Response
     */
    public function ajoutReservation(Request $request, TranslatorInterface $translator): Response
    {
        $repo = $this->getDoctrine()->getManager();
        $cat = $repo->getRepository(Categorie::class)->findBy(
            array(),
            array('nomCategorie' => 'ASC')
        );

        $v = new Reservation();


        $form = $this->createForm(ReservationType::class, $v);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($v);
            $em->flush();
            $message = $translator->trans('Reservation a été bien ajoutée');
            $this->addFlash('success', $message);
            return $this->redirectToRoute('new_reservation');
        }

        return $this->render('reservation/new_reservation.html.twig', [
            'form' => $form->createView(),
            'cat' => $cat

        ]);
    }

    /**
     * @Route("/liste_reservation", name="liste_reservation")
     * @param Request $request
     * @return Response
     */
    public function listeReservation(Request $request, ReservationRepository $reservation)
    {
        return $this->render('reservation/liste_reservation.html.twig', [
            'controller_name' => 'ReservationController',
            'res' => $reservation->findBy(
                array(),
                array('dateReservation' => 'ASC')
            )

        ]);
    }


    /**
     * @Route("/edit_reservation/{id}", name="edit_reservation")
     * @param Request $request
     * @return Response
     */
    public function edit_reservation(Request $request, Reservation $reservation, EntityManagerInterface $em)
    {

        $form = $this->createForm(ReservationType::class, $reservation);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reservation);
            $em->flush();
            return $this->redirectToRoute('liste_reservation');
        }
        return $this->render('reservation/edit_reservation.html.twig', [
            'form' => $form->createView(),
            'res' => $reservation
        ]);
    }
    /**
     * @Route("/delete_reservation/{id}", name="delete_reservation")
     */
    public function delete(Reservation $reservation)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($reservation);
        $em->flush();
        return $this->redirectToRoute('liste_reservation');
    }

    /**
     * @Route("/cherche", name="cherche")
     * @param Request $request
     * @return Response
     */

    public function chercheReservation(Request $request, ReservationRepository $v): Response
    {
        $dateSearch = new DateSearch();
        $form = $this->createForm(DateSearchType::class, $dateSearch);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $minDate = $dateSearch->getMinDate();
            $maxDate = $dateSearch->getMaxDate();
            $v = $this->getDoctrine()
                ->getRepository(Reservation::class)->findByDate($minDate, $maxDate, array('dateReservation' => 'ASC'));
            if (!$v) {
                throw $this->createNotFoundException('Aucune reservation pour cette date');
            }
                       

            return $this->render('reservation/formSearchDate.html.twig', [
                'form' => $form->createView(),
                'reservation' => $v,
                'minDate' => $minDate,
                'maxDate' => $maxDate

            ]);
        }
        return $this->render('reservation/formSearchDate.html.twig', [
            'form' => $form->createView(),
            'reservation' => $v,

        ]);
    }

    /**
     * @Route("/reservation_jour", name="reservation_jour")
     * @param Request $request
     * @return Response
     */

    public function ReservationJour(Request $request, ReservationRepository $v): Response
    {
        $date = new Date();
        $form = $this->createForm(DateReservationType::class, $date);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $d = $date->getDate();
            $v = $this->getDoctrine()
                ->getRepository(Reservation::class)->findByDate_reservation($d);
            if (!$v) {
                return $this->render('reservation/reservation_journaliere.html.twig', [
                    'form' => $form->createView(),
                    'reservation' => $v,
                    'date' => $date,
                    'd' => $d
                ]);
            }
            foreach ($v as $reservation) {
                $cars[] = $reservation->getCar();
            }
           
            return $this->render('reservation/reservation_journaliere.html.twig', [
                'form' => $form->createView(),
                'reservation' => $v,
                'date' => $date
            ]);
        }
        return $this->render('reservation/reservation_journaliere.html.twig', [
            'form' => $form->createView(),
            'reservation' => $v,
            'date' => $date
        ]);
    }
    /**
     * @Route("/reservation_client/{id}", name="reservation_client")
     * @param Request $request
     * @return Response
     */
    public function reservationClient(Request $request, $id)
    {

        $client = $this->getDoctrine()->getManager()
            ->getRepository(Client::class)->find($id);
        $reservation = $client->getReservation()->toArray();

        return $this->render('reservation/reservation_client.html.twig', [
            'controller_name' => 'ReservationController',
            'reservation' => $reservation,
            'client' => $client

        ]);
    }

    /**
     * @Route("/fa/{id}", name="fa")
     */
    public function facture($id)
    {
        $reservation = $this->getDoctrine()
            ->getRepository(Reservation::class)->find($id);
        // Retrieve the HTML generated in our twig file
        $template = $this->renderView('reservation/fa.html.twig', [
            'controller_name' => 'ReservationController',
            'reservation' => $reservation
        ]);
        $html2pdf = new T_Html2Pdf('P', 'A4', 'fr', true, 'UTF-8 ', array(10, 15, 10, 15));
        $html2pdf->create('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
        return $html2pdf->generatePdf($template, "reservation");
    }

    /**
     * @Route("/bon/{id}", name="bon")
     */
    public function bon($id)
    {
        $reservation = $this->getDoctrine()
            ->getRepository(reservation::class)->find($id);

        // Retrieve the HTML generated in our twig file
        $template = $this->renderView('reservation/bon.html.twig', [
            'controller_name' => 'reservationController',
            'reservation' => $reservation
        ]);
        $html2pdf = new T_Html2Pdf('P', 'A4', 'fr', true, 'UTF-8 ', array(10, 15, 10, 15));
        $html2pdf->create('P', 'A4', 'fr', true, 'UTF-8', array(10, 15, 10, 15));
        return $html2pdf->generatePdf($template, "reservation");
    }
    /**
     * @Route("/top_reservation", name="top_reservation")
     */
    public function top_reservation(ReservationRepository $reservationRepository)
    {
        
        $reservations = $reservationRepository->findBy(
            array(),
            array('dateReservation' => 'ASC')
        );

        foreach ($reservations as $reservation) {

            $date[] = $reservation->getDateReservation()->format('d-m-Y');

            $montant[] = $reservation->getNbreJour() * $reservation->getCar()->getPrixLoc();
        }

        //dump($date);
        // exit();    
        return $this->render('reservation/top_reservation.html.twig', [
            'montant' => json_encode($montant),
            'date' => json_encode($date)

        ]);
    }
}
