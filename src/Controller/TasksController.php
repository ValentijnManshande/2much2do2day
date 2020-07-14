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
    private $security;

    public function __construct(Security $security)
    {
        $this->security = $security;
    }
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
        $user = $this->security->getUser();
        $form = $this->createForm(TaskListType::class, $taskList);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $name = $form->get('name')->getData();
            $description = $form->get('description')->getData();
            $tasks = $form->get('tasks')->getData();
            $published = $form->get('isPublished')->getData();
            $complete = false;
            
            $taskList->setName($name);
            $taskList->setDescription($description);

            // tasks should be set via add/remove methods and get persisted via Doctrine magic,
            // hence their absence here.

            $taskList->setUser($user->getId());
            $taskList->setIsPublished($published);
            $taskList->setIsComplete($complete);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($taskList);
            $entityManager->flush();

            return $this->render('tasks/index.html.twig', [
                'succes' => true,
            ]);
        }
        
        return $this->render('tasks/new.html.twig', [
            'taskList' => $form->createView(),
        ]);
    }

    public function edit()
    {
            // TO DO
    }

    public function remove()
    {
            // TO DO
    }

    public function show($id)
    {
        
    }
}
