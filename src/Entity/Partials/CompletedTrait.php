<?php
namespace App\Entity\Partials;

trait CompletedTrait
{
    /**
    * @ORM\Column(type="boolean")
    */
    private $isComplete;

    public function getIsComplete() : bool
    {
        return $this->isComplete;
    }

    public function setIsComplete(bool $completionStatus) : self
    {
        $this->isComplete = $completionStatus;

        return $this;
    }
}