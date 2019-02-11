<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RepairCommentaryRepository")
 */
class RepairCommentary
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
    private $repair_date;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\JumpingTilt", inversedBy="repairCommentaries")
     * @ORM\JoinColumn(nullable=false)
     */
    private $jumping_tilt;

    public function __toString()
    {
        return $this->comment ; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRepairDate(): ?\DateTimeInterface
    {
        return $this->repair_date;
    }

    public function setRepairDate(\DateTimeInterface $repair_date): self
    {
        $this->repair_date = $repair_date;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }

    public function getJumpingTilt(): ?JumpingTilt
    {
        return $this->jumping_tilt;
    }

    public function setJumpingTilt(?JumpingTilt $jumping_tilt): self
    {
        $this->jumping_tilt = $jumping_tilt;

        return $this;
    }
}
