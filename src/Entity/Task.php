<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Partials\CompletedTrait;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    use CompletedTrait;
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="TaskList", inversedBy="tasks")
     * @ORM\JoinColumn(name="task_list_id", referencedColumnName="id")
     */
    private $taskList;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTaskList(): ?TaskList
    {
        return $this->taskList;
    }

    public function setTaskList(?TaskList $taskList): self
    {
        $this->taskList = $taskList;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
