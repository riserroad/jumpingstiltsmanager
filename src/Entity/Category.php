<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
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
     * @Assert\NotBlank
     */
    private $name;

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
        return $this->name; 
    }

    public function getId(): ?int
    {
        return $this->id;
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
