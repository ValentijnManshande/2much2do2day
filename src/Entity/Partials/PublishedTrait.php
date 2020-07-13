<?php
namespace App\Entity\Partials;

trait PublishedTrait
{
    /**
    * @ORM\Column(type="boolean")
    */
    private $isPublished;

    public function getIsPublished() : bool
    {
        return $this->isPublished;
    }

    public function setIsPublished(bool $publishStatus) : self
    {
        $this->isPublished = $publishStatus;

        return $this;
    }
}