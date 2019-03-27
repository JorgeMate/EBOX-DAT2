<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarpetaRepository")
 */
class Carpeta
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

    // , unique=true ojo, año + name

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="carpetas")
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Formato", inversedBy="carpetas")
     */
    private $formato;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activa;

    /**
     * @ORM\Column(type="smallint")
     */
    private $año;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Trabajo", inversedBy="carpetas")
     */
    private $trabajos;

    

    public function __construct()
    {    
        $this->trabajos = new ArrayCollection();   
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

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

        return $this;
    }

    public function getFormato(): ?Formato
    {
        return $this->formato;
    }

    public function setFormato(?Formato $formato): self
    {
        $this->formato = $formato;

        return $this;
    }

    public function getActiva(): ?bool
    {
        return $this->activa;
    }

    public function setActiva(bool $activa): self
    {
        $this->activa = $activa;

        return $this;
    }

    public function getAño(): ?int
    {
        return $this->año;
    }

    public function setAño(int $año): self
    {
        $this->año = $año;

        return $this;
    }

    /**
     * @return Collection|Trabajo[]
     */
    public function getTrabajos(): Collection
    {
        return $this->trabajos;
    }

    public function addTrabajo(Trabajo $trabajo): self
    {
        if (!$this->trabajos->contains($trabajo)) {
            $this->trabajos[] = $trabajo;
        }

        return $this;
    }

    public function removeTrabajo(Trabajo $trabajo): self
    {
        if ($this->trabajos->contains($trabajo)) {
            $this->trabajos->removeElement($trabajo);
        }

        return $this;
    }



}
