<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\RubberRepository")
 */
class Rubber
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
    private $color;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JumpingTilt", mappedBy="rubber")
     */
    private $jumpingTilts;

    public function __construct()
    {
        $this->jumpingTilts = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->color; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(string $color): self
    {
        $this->color = $color;

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
            $jumpingTilt->setRubber($this);
        }

        return $this;
    }

    public function removeJumpingTilt(JumpingTilt $jumpingTilt): self
    {
        if ($this->jumpingTilts->contains($jumpingTilt)) {
            $this->jumpingTilts->removeElement($jumpingTilt);
            // set the owning side to null (unless already changed)
            if ($jumpingTilt->getRubber() === $this) {
                $jumpingTilt->setRubber(null);
            }
        }

        return $this;
    }
}
