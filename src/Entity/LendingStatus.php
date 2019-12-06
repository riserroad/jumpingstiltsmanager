<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LendingStatusRepository")
 */
class LendingStatus
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Lending", mappedBy="status")
     */
    private $lendings;

    public function __construct()
    {
        $this->lendings = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->name; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

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
            $lending->setStatus($this);
        }

        return $this;
    }

    public function removeLending(Lending $lending): self
    {
        if ($this->lendings->contains($lending)) {
            $this->lendings->removeElement($lending);
            // set the owning side to null (unless already changed)
            if ($lending->getStatus() === $this) {
                $lending->setStatus(null);
            }
        }

        return $this;
    }
}
