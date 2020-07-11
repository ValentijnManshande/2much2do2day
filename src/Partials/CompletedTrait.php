<?php
namespace App\Partials;

trait CompletedTrait
{
    /**
    * @ORM\Column(type="boolean")
    */
    public boolean $isComplete;

    public function getIsComplete() : bool
    {
        return $this->isComplete;
    }

    public function setIsComplete(bool $completionStatus = false) : self
    {
        $this->isComplete = $completionStatus;

        return $this;
    }
}