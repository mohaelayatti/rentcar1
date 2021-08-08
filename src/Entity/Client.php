<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\ClientRepository;
use App\Entity\Reservation;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $nomClient;
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $adressClient;
    
    /**
     * @ORM\Column(type="string",length=255)
     */
    private $telfClient;
    /**
     * @ORM\Column(type="string",length=255, nullable=true)
     */
    private $faxClient;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservation", mappedBy="client")
     */
    private $reservations;

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
            $reservation->setClient($this);
        }
        return $this;
    }
    public function remove(Reservation $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);

            if ($reservation->getClient() === $this) {
                $reservation->setClient(null);
            }
        }
        return $this;
    }


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNomClient(): ?string
    {
        return $this->nomClient;
    }
    public function setNomClient(string $nomClient): ?self
    {
        $this->nomClient = $nomClient;
        return $this;
    }
    public function getAdressClient(): ?string
    {
        return $this->adressClient;
    }
    public function setAdressClient(string $adressClient): ?self
    {
        $this->adressClient = $adressClient;
        return $this;
    }
    public function getTelfClient(): ?string
    {
        return $this->telfClient;
    }
    public function setTelfClient(string $telfClient): ?self
    {
        $this->telfClient = $telfClient;
        return $this;
    }
    public function getFaxClient(): ?string
    {
        return $this->faxClient;
    }
    public function setFaxClient(string $faxClient): ?self
    {
        $this->faxClient = $faxClient;
        return $this;
    }
   
}
