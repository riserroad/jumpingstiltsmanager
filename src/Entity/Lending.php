<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator as CustomAssert;
use DateInterval;
use DateTime;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LendingRepository")
 * @CustomAssert\LendingDate
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
     * @Assert\NotBlank
     */
    private $startDate;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank     
     * @Assert\GreaterThanOrEqual(propertyPath="startDate")
     */
    private $endDate;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Riser", inversedBy="lendings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $riser;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\JumpingTilt", inversedBy="lendings")
     * @ORM\JoinColumn(nullable=true)
     */
    private $jumpingTilt;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\LendingStatus", inversedBy="lendings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $status;

    public function __construct()
    {
        $this->startDate = new DateTime(); 
        $this->endDate = new DateTime(); 

        // add 3 months on the endDate  ( period of lending )
        $this->endDate->add(new DateInterval('P3M')); 
    }


    
    public function __toString()
    {
        return "location N° " . $this->id ; 
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->endDate;
    }

    public function setEndDate(\DateTimeInterface $endDate): self
    {
        $this->endDate = $endDate;

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

    public function getJumpingTilt(): ?JumpingTilt
    {
        return $this->jumpingTilt;
    }

    public function setJumpingTilt(?JumpingTilt $jumpingTilt): self
    {
        $this->jumpingTilt = $jumpingTilt;

        return $this;
    }

    public function getStatus(): ?LendingStatus
    {
        return $this->status;
    }

    public function setStatus(?LendingStatus $status): self
    {
        $this->status = $status;

        return $this;
    }
}
