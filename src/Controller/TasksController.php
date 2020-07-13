<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Security;
use App\Form\TaskListType;
use App\Entity\TaskList;

class TasksController extends AbstractController
{
    /**
     * @Route("/my-list", name="my_list")
     */
    public function index()
    {
        return $this->render('tasks/index.html.twig');
    }

    /**
    * @Route("/my-list/new", name="new_list", methods={"GET", "POST"})
    */
    public function new(Request $request, Security $security)
    {
        $taskList = new TaskList();
        $user = $this->getUser();
        $form = $this->createForm(TaskListType::class, $taskList);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // TO DO
        }
        return $this->render('tasks/new.html.twig', [
            'taskList' => $form->createView(),
        ]);
    }

    public function edit()
    {

    }

    public function remove()
    {

    }

    public function show($id)
    {
        
    }
}
