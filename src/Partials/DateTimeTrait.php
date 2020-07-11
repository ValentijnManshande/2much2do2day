<?php
namespace App\Partials;

trait DateTimeTrait
{
    /**
    * @ORM\Column(type="datetime", name="created_at", nullable=false)
    */
    public \DateTime $createdAt;

    /**
    * @ORM\Column(type="datetime", name="updated_at", nullable=true)
    */
    public \DateTime $updatedAt;

    public function getCreatedAt() : DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createDate = null) : self
    {
        if (!$createDate) {
            $createDate = new \DateTime();
        }

        $this->createdAt = $createDate;

        return $this;
    }

    public function getUpdatedAt() : ?DateTime
    {
        return $this->$updatedAt;
    }

    public function setUpdatedAt(DateTime $updateDate) : self
    {
        $this->$updatedAt = $updateDate;

        return $this;
    }
}