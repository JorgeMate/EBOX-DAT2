<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OperarioRepository")
 */
class Operario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=127, unique=true)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint", unique=true)
     */
    private $iname;

    /**
     * @ORM\Column(type="boolean")
     */
    private $activo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $planta;

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

    public function getIname(): ?int
    {
        return $this->iname;
    }

    public function setIname(int $iname): self
    {
        $this->iname = $iname;

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

    public function getPlanta(): ?bool
    {
        return $this->planta;
    }

    public function setPlanta(bool $planta): self
    {
        $this->planta = $planta;

        return $this;
    }
}
