<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\EditUserType;
use App\Form\RegistrationType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class SecurityController extends AbstractController
{
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/inscription", name="security_registration")
     * @param Request $request
     * @return Response
     */
    public function registration(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = new User();
        $form = $this->CreateForm(RegistrationType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($user);
            $manager->flush();
            
            return $this->redirectToRoute('login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->CreateView()
                    ]);
    }


    /**
     * @Route("/login", name="login")
     * @param Request $request
     * @return Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsename = $authenticationUtils->getLastUsername();
        return $this->render('security/login.html.twig', [
           'last_username' => $lastUsename,
            'error' => $error
        ]);
    }

    
    /**
     * @Route("/logout", name="logout")
     */
    public function logout()
    {

        return $this->redirectToRoute('login');
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/liste_user", name="liste_user")
     */
    public function listeUser(UserRepository $users)
    {

        return $this->render('security/listeUser.html.twig', [

            'users' => $users->findAll()
        ]);
    }

    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/edit_user/{id}", name="edit_user")
     * 
     * @return Response
     */
    public function editUser(Request $request, User $user, UserPasswordEncoderInterface $encoder)
    {
        $p=$user->setPassword('');
        $form = $this->createForm(EditUserType::class, $p);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
          
            return $this->redirectToRoute('liste_user');
        }
        return $this->render('security/edit_user.html.twig', [
            'form' => $form->createView()

        ]);
    }
    /**
     * @IsGranted("ROLE_ADMIN")
     * @Route("/delete_user/{id}", name="delete_user")
     */
    public function delete(User $user)
    {
        $em = $this->getDoctrine()
            ->getManager();
        $em->remove($user);
        $em->flush();
        return $this->redirectToRoute('security_registration');
    }
}
