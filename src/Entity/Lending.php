<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
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
     * @ORM\OneToOne(targetEntity="App\Entity\JumpingTilt", inversedBy="lending", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $jumpingTilt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Riser", inversedBy="lendings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $riser;

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

    public function getJumpingTilt(): ?JumpingTilt
    {
        return $this->jumpingTilt;
    }

    public function setJumpingTilt(JumpingTilt $jumpingTilt): self
    {
        $this->jumpingTilt = $jumpingTilt;

        return $this;
    }

    public function getRiser(): ?Riser
    {
        return $this->riser;
    }

    public function setRiser(?Riser $riser): self
    {
        $this->riser = $riser;

        return $this;
    }
}
