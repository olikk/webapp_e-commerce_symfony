<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;



class SecurityController extends AbstractController
{
    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }
    
    /**
     * @Route("/register", name="app_register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $passwordEncoder) {
         if ($request->isMethod('POST')) {
             if (($user = $this->getDoctrine()->getRepository(User::class)->findOneBy(array(
                'email' => $request->request->get('email')))) == null){
                $user = new User();
                $user->setEmail($request->request->get('email'));
                $user->setNom($request->request->get('name'));
                $user->setPrenom($request->request->get('surname'));
                $user->setPassword($passwordEncoder->encodePassword(
                    $user,
                    $request->request->get('password')
                ));
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
                 $request->getSession()->getFlashBag()->set('success', 'Votre compte à bien été enregistré.');
                return $this->redirectToRoute('app_logout');
            }else{
                $request->getSession()->getFlashBag()->set('danger', "L'utilisateur existe déjà");
            }
         }
        return $this->render('security/signup.twig');
    }
    /**
     * This is the route the user can use to logout.
     *
     * But, this will never be executed. Symfony will intercept this first
     * and handle the logout automatically. See logout in config/packages/security.yaml
     *
     * @Route("/logout", name="app_logout")
     */
    public function logout(): void
    {
        throw new \Exception('This should never be reached!');
    }
}
