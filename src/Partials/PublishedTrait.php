<?php
namespace App\Partials;

trait PublishedTrait
{
    /**
    * @ORM\Column(type="boolean")
    */
    public boolean $isPublished;

    public function getIsPublished() : bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $publishStatus = false) : self
    {
        $this->isPublished = $publishStatus;

        return $this;
    }
}