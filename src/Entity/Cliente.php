<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ClienteRepository")
 */
class Cliente
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Carpeta", mappedBy="cliente")
     */
    private $carpetas;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $codConta;

    public function __construct()
    {
        $this->carpetas = new ArrayCollection();
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
     * @return Collection|Carpeta[]
     */
    public function getCarpetas(): Collection
    {
        return $this->carpetas;
    }

    public function addCarpeta(Carpeta $carpeta): self
    {
        if (!$this->carpetas->contains($carpeta)) {
            $this->carpetas[] = $carpeta;
            $carpeta->setCliente($this);
        }

        return $this;
    }

    public function removeCarpeta(Carpeta $carpeta): self
    {
        if ($this->carpetas->contains($carpeta)) {
            $this->carpetas->removeElement($carpeta);
            // set the owning side to null (unless already changed)
            if ($carpeta->getCliente() === $this) {
                $carpeta->setCliente(null);
            }
        }

        return $this;
    }

    public function getActivo(): ?bool
    {
        return $this->activo;
    }

    public function setActivo(bool $activo): self
    {
        $this->activo = $activo;

        return $this;
    }

    public function getCodConta(): ?string
    {
        return $this->codConta;
    }

    public function setCodConta(?string $codConta): self
    {
        $this->codConta = $codConta;

        return $this;
    }
}
