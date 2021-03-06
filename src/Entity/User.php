<?php

namespace App\Entity;


use Symfony\Component\Security\Core\User\UserInterface;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @UniqueEntity(fields={"email"}, message="Ya existe una cuenta con este email")
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
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=63)
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
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

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos(): ?string
    {
        return $this->apellidos;
    }

    public function setApellidos(string $apellidos): self
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    public function gettelefono(): ?string
    {
        return $this->telefono;
    }

    public function settelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }


    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAdmin(){

        if (in_array('ROLE_ADMIN', $this->getRoles()) 
                || in_array('ROLE_SUPER_ADMIN', $this->getRoles())) {
            return true;
        }
    }

    public function setAdmin(bool $admin)
    {

        if (!in_array('ROLE_SUPER_ADMIN', $this->getRoles())) {

            if($admin){                
                    $this->setRoles(['ROLE_ADMIN']);
                    $this->setEnabled(true);
            } else {
                $this->setRoles([]);            
            }
        }
        
        return $this;
    }

    public function getAuto(){
        if (in_array('ROLE_AUTO', $this->getRoles()) 
                || in_array('ROLE_ADMIN', $this->getRoles()) 
                || in_array('ROLE_SUPER_ADMIN', $this->getRoles())) {
            return true;
        }
    }

    public function setAuto(bool $auto)
    {
        
        if(!in_array('ROLE_SUPER_ADMIN', $this->getRoles()) && 
            !in_array('ROLE_ADMIN', $this->getRoles())) {

            if($auto){
                $this->setRoles(['ROLE_AUTO']);
            } else {
                $this->setRoles([]);            
            }
        }

        return $this;
    }

}
