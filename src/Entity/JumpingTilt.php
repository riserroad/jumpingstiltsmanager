<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\JumpingTiltRepository")
 */
class JumpingTilt
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=5, unique=true)
     */
    private $reference;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="jumpingTilts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="jumpingTilts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairCommentary", mappedBy="jumping_tilt")
     */
    private $repairCommentaries;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comment;

    public function __construct()
    {
        $this->repairCommentaries = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->reference;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $reference): self
    {
        $this->reference = $reference;

        return $this;
    }

    public function getWeight(): ?int
    {
        return $this->weight;
    }

    public function setWeight(?int $weight): self
    {
        $this->weight = $weight;

        return $this;
    }

    public function getState(): ?State
    {
        return $this->state;
    }

    public function setState(?State $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection|RepairCommentary[]
     */
    public function getRepairCommentaries(): Collection
    {
        return $this->repairCommentaries;
    }

    public function addRepairCommentary(RepairCommentary $repairCommentary): self
    {
        if (!$this->repairCommentaries->contains($repairCommentary)) {
            $this->repairCommentaries[] = $repairCommentary;
            $repairCommentary->setJumpingTilt($this);
        }

        return $this;
    }

    public function removeRepairCommentary(RepairCommentary $repairCommentary): self
    {
        if ($this->repairCommentaries->contains($repairCommentary)) {
            $this->repairCommentaries->removeElement($repairCommentary);
            // set the owning side to null (unless already changed)
            if ($repairCommentary->getJumpingTilt() === $this) {
                $repairCommentary->setJumpingTilt(null);
            }
        }

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(?string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
