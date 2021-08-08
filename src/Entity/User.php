<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(
 * fields= {"email"},
 * message="email déja utilisé"
 * )
 */
class User implements UserInterface
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string",length=255 )
     * @Assert\Email()
     */
    private $email;

    /**
     * @ORM\Column(type="string",length=255 )
     */
    private $username;
    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @ORM\Column(type="string",length=255)
     * @Assert\Length(min = "6", minMessage = "le mot de pass doit contenir 6 carracteres")
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password", message="vous n'avez pas saisie le meme mot de pass")
     */
    public $confirm_password;


    public function getId(): ?int
    {
        return $this->id;
    }
    public function getUsername(): ?string
    {
        return $this->username;
    }
    public function setUsername(string $username): ?self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): ?self
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }
    public function setPassword(string $password): ?self
    {
        $this->password = $password;

        return $this;
    }


   
    public function getRoles()
    {
        //return ['ROLE_ADMIN'];
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }
    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }
    public function eraseCredentials()
    {
    }
    public function getSalt()
    {
    }
}
