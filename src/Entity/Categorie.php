<?php

namespace App\Entity;


use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategorieRepository")
 */
class Categorie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255)
     */
    private $nomCategorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Car", mappedBy="categorie")
     */
    private $cars;
    

    public function __construct()
    {
        $this->cars = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNomCategorie(): ?string
    {
        return $this->nomCategorie;
    }
    public function setNomCategorie(?string $nomCategorie): ?self
    {
        $this->nomCategorie = $nomCategorie;
        return $this;
    }

    /**
     * @return Collection|Car[]
     */
    public function getCars(): Collection
    {
        return $this->cars;
    }
    public function addCar(Car $car): self
    {
        if (!$this->cars->contains($car)) {
            $this->cars[] = $car;
            $car->setCategorie($this);
        }
        return $this;
    }
    public function removeArticle(Car $car): self
    {
        if ($this->cars->contains($car)) {
            $this->cars->removeElement($car);
            // set the owning side to null (unless already changed)
            if ($car->getCategorie() === $this) {
                $car->setCategorie(null);
            }
        }
        return $this;
    }
    public function __toString()
    {
        return $this->nomCategorie;

     }
  
}