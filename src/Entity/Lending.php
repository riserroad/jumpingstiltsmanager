<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\LendingRepository")
 */
class Lending
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $start_date;

    /**
     * @ORM\Column(type="date")
     */
    private $end_date;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Riser", mappedBy="lending")
     */
    private $risers;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\JumpingTilt", mappedBy="lending")
     */
    private $jumpingTilts;

    public function __construct()
    {
        $this->risers = new ArrayCollection();
        $this->jumpingTilts = new ArrayCollection();
    }

    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): self
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): self
    {
        $this->end_date = $end_date;

        return $this;
    }

    /**
     * @return Collection|Riser[]
     */
    public function getRisers(): Collection
    {
        return $this->risers;
    }

    public function addRiser(Riser $riser): self
    {
        if (!$this->risers->contains($riser)) {
            $this->risers[] = $riser;
            $riser->addLending($this);
        }

        return $this;
    }

    public function removeRiser(Riser $riser): self
    {
        if ($this->risers->contains($riser)) {
            $this->risers->removeElement($riser);
            $riser->removeLending($this);
        }

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
            $jumpingTilt->addLending($this);
        }

        return $this;
    }

    public function removeJumpingTilt(JumpingTilt $jumpingTilt): self
    {
        if ($this->jumpingTilts->contains($jumpingTilt)) {
            $this->jumpingTilts->removeElement($jumpingTilt);
            $jumpingTilt->removeLending($this);
        }

        return $this;
    }

   

    
}
