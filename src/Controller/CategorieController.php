<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Entity\SearchCat;
use App\Form\CategorieType;
use App\Form\CatType;
use App\Form\SearchCatType;
use App\Repository\CategorieRepository;
use App\Repository\ArticleStockRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Exception\ForeignKeyConstraintViolationException;



    
class CategorieController extends AbstractController

{
      
     
     /**
     * @Route("/ajout_categorie", name="ajout_categorie")
     * @param Request $request
     * @return Response
     */
    public function ajoutCategorie(Request $request,CategorieRepository $cat, TranslatorInterface $translator): Response
    {
        $c = new Categorie();
        $form = $this->createForm(CategorieType::class, $c);
        $form->handleRequest($request);
       
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($c);
            $em->flush();
            $message = $translator->trans('Categorie a été bien Ajouté');
            $this->addFlash('success', $message);
            return $this->redirectToRoute('ajout_categorie');
        }
        return $this->render('categorie/ajout_categorie.html.twig', [
            'form' => $form->createView(),
            'cat' =>$cat->findAll()

        ]);
    }

    /**
     * @Route("/edit_cat/{id}", name="edit_cat")
     * 
     * @return Response
     */
    public function editCategorie(Request $request, Categorie $cat, TranslatorInterface $translator)
    {

        $form = $this->createForm(CategorieType::class, $cat);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
            $message = $translator->trans('Categorie a été bien modifié');
            $this->addFlash('success', $message);
            return $this->redirectToRoute('ajout_categorie');
        }
        return $this->render('categorie/edit_cat.html.twig', [
            'form' => $form->createView()

        ]);
    }
    /**
     * @Route("/delete_cat/{id}", name="delete_cat")
     */
    public function delete(Categorie $cat, TranslatorInterface $translator)
    {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cat);
            $em->flush();
            $message = $translator->trans('Categorie a été bien suprimée');
            $this->addFlash('success', $message);
             
        return $this->redirectToRoute('ajout_categorie');
    }
    /**
     * @Route("/home", name="home")
     */
    public function home()
    {

        $cat = $this->getDoctrine()->getManager()
            ->getRepository(Categorie::class)->findAll();

        return $this->render('home.html.twig', [
            'cat' => $cat
        ]);
    }

}