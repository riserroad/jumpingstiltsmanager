<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
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
     * @ORM\ManyToOne(targetEntity="App\Entity\JumpingTilt", inversedBy="repairCommentaries")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank
     */
    private $jumpingTilt;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank
     */
    private $repairDate;

    /**
     * @ORM\Column(type="text")
     */
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getRepairDate(): ?\DateTimeInterface
    {
        return $this->repairDate;
    }

    public function setRepairDate(\DateTimeInterface $repairDate): self
    {
        $this->repairDate = $repairDate;

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
}
