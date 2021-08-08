<?php

namespace App\Controller;

use App\Entity\Client;
use App\Form\ClientType;
use App\Repository\ClientRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


/**
 * @IsGranted("ROLE_USER")
 * 
 */

class ClientController extends AbstractController
{

    /**
     * @Route("/ajout_client", name="ajout_client")
     * @param Request $request
     * @return Response
     */
    public function ajoutClient(Request $request,TranslatorInterface $translator): Response
    {
        $c = new Client();
        $form = $this->createForm(ClientType::class, $c);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($c);
            $em->flush();
            $message = $translator->trans('Client a été bien Ajouté');
            $this->addFlash('success', $message);
            return $this->redirectToRoute('ajout_client');
        }
        return $this->render('client/ajout_client.html.twig', [
            'form' => $form->createView()
            

        ]);
    }
    /**
     * @Route("/liste_client", name="liste_client")
     * 
     */
    public function listeClient(ClientRepository $client)
    {
        
        return $this->render('client/liste_client.html.twig', [
            'controller_name' => 'ClientController',
            'client' => $client->findBy(
            array(),
            array('nomClient' => 'ASC')       
        )
            ]);
    }
    /**
     * @Route("/edit_client/{id}", name="edit_client")
     * 
     * @return Response
     */
    public function editClient(Request $request, client $client)
    {

        $form = $this->createForm(ClientType::class, $client);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($client);
            $em->flush();
            return $this->redirectToRoute('liste_client');
        }
        return $this->render('client/edit_client.html.twig', [
            'form' => $form->createView()

        ]);
    }
    /**
     * @Route("/delete_client/{id}", name="delete_client")
     */
    public function delete(Client $client)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $em->remove($client);
        $em->flush();
        return $this->redirectToRoute('liste_client');
    }

    /**
     * @Route("/chercheClient", name="chercheClient")
     * @param Request $request
     * @return Response
     */

    public function chercheClient(Request $request)
    {
        $repo = $this->getDoctrine()->getManager();
        $client = $repo->getRepository(Client::class)->findAll();

        if ($request->isMethod("POST")) {
            $nom = $request->get('nomClient');
            $d = $repo->getRepository(Client::class)->findBy(['nomClient' => $nom]);
            return $this->render('client/chercheClient.html.twig', array('client' => $d));
        }
    }

    /**
     * @Route("/top_client", name="top_client")
     *
     */

    public function top_client(ClientRepository $clientRepository)
    {
        
        $clients = $clientRepository->findAll();
        $clientNom =[];
        $reservation =[];
        
        foreach($clients as $client){
            
        $clientNom[]=$client->getNomClient();
         $reservation[]=count($client->getReservation());
        }
           
            return $this->render('client/top_client.html.twig', [
            'clientNom' =>json_encode($clientNom) ,
             'reservation' => json_encode($reservation)

        ]);
       
    }  
}
