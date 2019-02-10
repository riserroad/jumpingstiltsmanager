<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\StateRepository")
 */
class State
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
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\JumpingTilt", mappedBy="state")
     */
    private $jumpingTilts;

    public function __construct()
    {
        $this->jumpingTilts = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->state; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

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
            $jumpingTilt->setState($this);
        }

        return $this;
    }

    public function removeJumpingTilt(JumpingTilt $jumpingTilt): self
    {
        if ($this->jumpingTilts->contains($jumpingTilt)) {
            $this->jumpingTilts->removeElement($jumpingTilt);
            // set the owning side to null (unless already changed)
            if ($jumpingTilt->getState() === $this) {
                $jumpingTilt->setState(null);
            }
        }

        return $this;
    }
}
