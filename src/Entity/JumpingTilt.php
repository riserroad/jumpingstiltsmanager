<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\JumpingTiltRepository")
 * @UniqueEntity("reference")
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
     * @Assert\NotBlank
     * @Assert\Regex(pattern = "/[A-Z]([0-9]){2}/", message = "La référence doit commencer par une lettre majuscule suivi de 2 chiffre ex: A02")
     */
    private $reference;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Assert\Range(min = 5, max = 150)
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
     * @ORM\OneToMany(targetEntity="App\Entity\Lending", mappedBy="jumpingTilt", orphanRemoval=true)
     */
    private $lendings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\RepairCommentary", mappedBy="jumpingTilt", orphanRemoval=true)
     */
    private $repairCommentaries;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Rubber", inversedBy="jumpingTilts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $rubber;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\StorageArea", inversedBy="jumpingTilts")
     * @ORM\JoinColumn(nullable=false)
     */
    private $storageArea;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\ModelJumpingStilt", inversedBy="jumpingTilts")
     */
    private $model;

    public function __construct()
    {
        $this->lendings = new ArrayCollection();
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
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
     * @return Collection|Lending[]
     */
    public function getLendings(): Collection
    {
        return $this->lendings;
    }

    public function addLending(Lending $lending): self
    {
        if (!$this->lendings->contains($lending)) {
            $this->lendings[] = $lending;
            $lending->setJumpingTilt($this);
        }

        return $this;
    }

    public function removeLending(Lending $lending): self
    {
        if ($this->lendings->contains($lending)) {
            $this->lendings->removeElement($lending);
            // set the owning side to null (unless already changed)
            if ($lending->getJumpingTilt() === $this) {
                $lending->setJumpingTilt(null);
            }
        }

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

    public function getRubber(): ?Rubber
    {
        return $this->rubber;
    }

    public function setRubber(?Rubber $rubber): self
    {
        $this->rubber = $rubber;

        return $this;
    }

    public function getStorageArea(): ?StorageArea
    {
        return $this->storageArea;
    }

    public function setStorageArea(?StorageArea $storageArea): self
    {
        $this->storageArea = $storageArea;

        return $this;
    }

    public function getModel(): ?ModelJumpingStilt
    {
        return $this->model;
    }

    public function setModel(?ModelJumpingStilt $model): self
    {
        $this->model = $model;

        return $this;
    }
}
