<?php

namespace App\Entity;

use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * @ORM\Entity(repositoryClass=ReservationRepository::class)
 * 
 */

class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="datetime")
     */
    private $dateReservation;
    /**
     * @ORM\Column(type="datetime")
     */
    private $dateDepart;

   /**
     * @ORM\Column(type="integer")
     */
    private $nbreJour;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $car;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Client", inversedBy="reservations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function getClient(): ?Client
    {
        return $this->client;
    }

    public function setClient(?Client $client): self
    {
        $this->client = $client;

        return $this;
    }

   

   public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }
  
   
    public function getId(): ?int
    {
        return $this->id;
    }
public function getDateReservation(): ?\DateTimeInterface
    {
        return $this->dateReservation;
    }
    public function setDateReservation(\DateTimeInterface $dateReservation): ?self
    {
        $this->dateReservation = $dateReservation;
        return $this;
    }
        
    public function getDateDepart(): ?\DateTimeInterface
    {
        return $this->dateDepart;
    }
    public function setDateDepart(\DateTimeInterface $dateDepart): ?self
    {
        $this->dateDepart = $dateDepart;
        return $this;
    }
    public function getNbreJour(): ?int
    {
        return $this->nbreJour;
    }
    public function setNbreJour(int $nbreJour): ?self
    {
        $this->nbreJour = $nbreJour;
        return $this;
    }
    
}
