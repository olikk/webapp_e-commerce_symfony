<?php
// src/Controller/DefaultController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/about")
     */
     public function index() {
        return $this->render("about.twig");
     }
     /**
     * @Route("/payment")
     */
     public function index1() {
        return $this->render("payment.twig");
     }
}