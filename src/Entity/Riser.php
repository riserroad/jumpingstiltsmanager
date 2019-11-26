<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\RiserRepository")
 */
class Riser
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
    private $firstname;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastname;

    /**
     * @ORM\Column(type="date")
     */
    private $birthdate;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Lending", inversedBy="risers")
     */
    private $lending;

    public function __construct()
    {
        $this->lending = new ArrayCollection();
    }

   

    public function __toString()
    {
        return $this->firstname . " " . strtoupper($this->lastname) ; 
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getBirthdate(): ?\DateTimeInterface
    {
        return $this->birthdate;
    }

    public function setBirthdate(\DateTimeInterface $birthdate): self
    {
        $this->birthdate = $birthdate;

        return $this;
    }

    /**
     * @return Collection|Lending[]
     */
    public function getLending(): Collection
    {
        return $this->lending;
    }

    public function addLending(Lending $lending): self
    {
        if (!$this->lending->contains($lending)) {
            $this->lending[] = $lending;
        }

        return $this;
    }

    public function removeLending(Lending $lending): self
    {
        if ($this->lending->contains($lending)) {
            $this->lending->removeElement($lending);
        }

        return $this;
    }

   
}
