<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
    * @Route("/", name="home")
    */
    public function index()
    {
        // have users log in first
        if(!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        };

        return $this->render('main/index.html.twig');
    }

    /**
    * @Route("/overview", name="list_overview")
    */
    public function overview()
    {
        if(!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        };

        return $this->render('main/overview.html.twig');
    }
}