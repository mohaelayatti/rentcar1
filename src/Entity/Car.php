<?php

namespace App\Entity;

use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CarRepository::class)
 */
class Car
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
    private $nom;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $marque;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="decimal", scale=2)
     */
    private $prixLoc;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
       private $color;

    /**
     * @ORM\Column(type="integer")
     */
    private $reduction;

      /**
       * @ORM\Column(type="text", nullable=true)
       */
    private $descri;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $image;


    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie", inversedBy="cars")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorie;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="car")
     */
    private $reservation;

    public function __construct()
    {
        $this->reservation = new ArrayCollection();
    }

    /**
     * @return Collection|Reservation[]
     */
    public function getReservation(): Collection
    {
        return $this->reservations;
    }
    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setCar($this);
        }
        return $this;
    }
    public function remove(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);

            if ($reservation->getCar() === $this) {
                $reservation->setCar(null);
            }
        }
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

   
   
    public function getNom()
    {
        return $this->nom;
    }
    public function setNom($nom)
    {
        $this->nom = $nom;
        return $this;
     }
    public function getMarque(): ?string
    {
        return $this->marque;
    }
    public function setMarque(string $marque): ?self
    {
        $this->marque = $marque;
        return $this;
    }
    public function getModel(): ?string
    {
        return $this->model;
    }
    public function setModel(string $model): ?self
    {
        $this->model = $model;
        return $this;
    }
    public function getPrixLoc()
    {
        return $this->prixLoc;
    }
    public function setPrixLoc($prixLoc): ?self
    {
        $this->prixLoc = $prixLoc;
        return $this;
    }
    
    public function getColor(): ?string
    {
        return $this->color;
    }
    public function setColor(string $color): ?self
    {
        $this->color = $color;
        return $this;
    }
    public function getReduction(): ?int
    {
        return $this->reduction;
    }
    public function setReduction(int $reduction): ?self
    {
        $this->reduction = $reduction;
        return $this;
    }
    public function __toString()
    {
        return $this->nom;
        
    }
    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }
    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;
        return $this;
    }

    
   /**
   * @return text
   */
    public function getDescri()
   {
        return $this->descri;
    }
    /**
     * @return text
     */
    public function setDescri($descri)
{
        $this->descri = $descri;
        return $this;
 
    }
    
    public function getImage()
    {
        return $this->image;
    }
    public function setImage($image)
    {
        $this->image = $image;
        return $this;
    }
   
   
    
}


