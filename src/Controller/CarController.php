<?php

namespace App\Controller;


use App\Entity\Categorie;
use App\Form\ChercheType;
use App\Entity\Car;
use App\Service\FileUploader;
use App\Form\CarType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Translation\Translator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class CarController extends AbstractController
{

    /**
     * @Route("/ajout_car", name="ajout_car")
     * @param Request $request
     * @return Response
     */
    public function ajoutCar(Request $request, FileUploader $fileUploader, TranslatorInterface $translator)
    {
        $car = new Car();
        //vhhjiu
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            /** @var UploadedFile $brochureFile */
            $brochureFile = $form->get('image')->getData();
            if ($brochureFile) {
                $brochureFileName = $fileUploader->upload($brochureFile);
                $car->setImage($brochureFileName);
            }
            $nom = $car->getMarque() . " " . $car->getModel() . " " . $car->getColor();
            $em = $this->getDoctrine()->getManager();
            $nom = $car->setNom($nom);
            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();
            $message = $translator->trans('Vehicule bien Ajouté');
            $this->addFlash('success', $message);

            return $this->redirectToRoute('ajout_car');
        }
        return $this->render('car/ajout_car.html.twig', [
            'form' => $form->createView()

        ]);
    }


    /**
     * @Route("/edit_car/{id}", name="edit_car")
     * 
     * @return Response
     */
    public function editCar(Request $request, Car $car, FileUploader $fileUploader): Response
    {

        $curentImage = $car->getImage();
        $form = $this->createForm(CarType::class, $car);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $image = $form->get('image')->getData();

            if (!is_null($image)) {
                $originalFilename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
                $brochureFileName = $fileUploader->upload($image);
                $car->setImage($brochureFileName);
            } else {
                $car->setImage($curentImage);
            }

            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();
            return $this->redirectToRoute('liste_car');
        }
        return $this->render('car/edit_car.html.twig', [
            'form' => $form->createView(),
            'art' => $car

        ]);
    }
    /**
     * @Route("/delete_car/{id}", name="delete_car")
     */
    public function delete(Car $car)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $em->remove($car);
        $em->flush();
        return $this->redirectToRoute('liste_car');
    }

    /**
     * @Route("/liste_car", name="liste_car")
     */
    public function listeCar()
    {

        $cat = $this->getDoctrine()->getManager()
            ->getRepository(Categorie::class)->findAll();

        return $this->render('car/liste_car.html.twig', [
            'cat' => $cat
        ]);
    }
}
