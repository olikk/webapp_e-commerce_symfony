<?php
// src/Controller/UserController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;

/**
 * Controller used to manage current user.
 *
 */
class UserController extends AbstractController
{
    /**
     * @Route("/profile", methods={"GET", "POST"}, name="app_profile")
     */
    public function index(){
        return $this->render('User/profile.twig');
    }
    /**
     * @Route("/edit-user", methods={"GET", "POST"}, name="user_edit")
     */
    public function edit(Request $request): Response
    {
         $session = $request->getSession();
        $user = $this->getUser();
         if ($request->isMethod('POST')) {
            $user->setEmail($request->request->get('email'));
            $user->setNom($request->request->get('name'));
            $user->setPrenom($request->request->get('surname'));
             $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('user_edit');
         }
        
        //return $this->redirectToRoute('user_edit');
        
        return $this->render('User/profile.twig');
    }
    /**
     * @Route("/change-password", methods={"GET", "POST"}, name="user_change_password")
     */
    public function changePassword(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $user = $this->getUser();
        $session = $request->getSession();
         if ($request->isMethod('POST')) {
            $old = $encoder->encodePassword($user, $request->request->get('passwordOld'));
           
            if($user->getPassword() != $old) {
                $session->getFlashBag()->set('error_msg', "Le mot de passe incorrecte");
            }else{
                $user->setPassword($encoder->encodePassword($user, $request->request->get('passwordNew')));
                $this->getDoctrine()->getManager()->flush();
                return $this->redirectToRoute('app_logout');
            } 
        }
        return $this->render('User/profile.twig');
    }
}