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
     * @ORM\Column(type="string", length=5)
     */
    private $reference;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $weight;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Category", inversedBy="jumpingTilts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\State", inversedBy="jumpingTilts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $state;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairCommentary", mappedBy="jumpingTilt")
     */
    private $repair_comments;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Lending", mappedBy="jumpingTilt", cascade={"persist", "remove"})
     */
    private $lending;

    public function __construct()
    {
        $this->repair_comments = new ArrayCollection();
    }
    public function __toString()
    {
        return $this->reference ; 
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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

    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;

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

    /**
     * @return Collection|RepairCommentary[]
     */
    public function getRepairComments(): Collection
    {
        return $this->repair_comments;
    }

    public function addRepairComment(RepairCommentary $repairComment): self
    {
        if (!$this->repair_comments->contains($repairComment)) {
            $this->repair_comments[] = $repairComment;
            $repairComment->setJumpingTilt($this);
        }

        return $this;
    }

    public function removeRepairComment(RepairCommentary $repairComment): self
    {
        if ($this->repair_comments->contains($repairComment)) {
            $this->repair_comments->removeElement($repairComment);
            // set the owning side to null (unless already changed)
            if ($repairComment->getJumpingTilt() === $this) {
                $repairComment->setJumpingTilt(null);
            }
        }

        return $this;
    }

    public function getLending(): ?Lending
    {
        return $this->lending;
    }

    public function setLending(Lending $lending): self
    {
        $this->lending = $lending;

        // set the owning side of the relation if necessary
        if ($this !== $lending->getJumpingTilt()) {
            $lending->setJumpingTilt($this);
        }

        return $this;
    }
}
