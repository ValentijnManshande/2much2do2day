<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class TasksController extends AbstractController
{
    /**
     * @Route("/my-list", name="my_list")
     */
    public function index()
    {
        return $this->render('tasks/index.html.twig', [
            'controller_name' => 'TasksController',
        ]);
    }

    /**
    * @Route("/my-list/new", name="new_list")
    */
    public function new()
    {

    }

    public function edit()
    {

    }

    public function remove()
    {

    }

    /**
    * @Route("/my-list/{id}", name="my_list")
    */
    public function show($id)
    {
        
    }
}
