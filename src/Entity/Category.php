<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JumpingTilt", mappedBy="category")
     */
    private $jumpingTilts;

    public function __construct()
    {
        $this->jumpingTilts = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->category; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|JumpingTilt[]
     */
    public function getJumpingTilts(): Collection
    {
        return $this->jumpingTilts;
    }

    public function addJumpingTilt(JumpingTilt $jumpingTilt): self
    {
        if (!$this->jumpingTilts->contains($jumpingTilt)) {
            $this->jumpingTilts[] = $jumpingTilt;
            $jumpingTilt->setCategory($this);
        }

        return $this;
    }

    public function removeJumpingTilt(JumpingTilt $jumpingTilt): self
    {
        if ($this->jumpingTilts->contains($jumpingTilt)) {
            $this->jumpingTilts->removeElement($jumpingTilt);
            // set the owning side to null (unless already changed)
            if ($jumpingTilt->getCategory() === $this) {
                $jumpingTilt->setCategory(null);
            }
        }

        return $this;
    }
}
