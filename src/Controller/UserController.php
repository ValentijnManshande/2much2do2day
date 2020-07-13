<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @Route("/users", name="user_overview")
     */
    public function index()
    {
        if(!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        };

        return $this->render('user/index.html.twig');
    }

    /**
    * @Route("/my-profile", name="my_profile")
    */
    public function show()
    {
        if(!$this->isGranted('IS_AUTHENTICATED_FULLY')) {
            return $this->redirectToRoute('app_login');
        };

        return $this->render('user/profile.html.twig');
    }


    // TO DO: set up user profile related views and actions.
}
