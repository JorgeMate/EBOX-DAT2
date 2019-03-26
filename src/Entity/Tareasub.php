<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TareasubRepository")
 */
class Tareasub
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $tareasub;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Tarea", inversedBy="tareasubs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tarea;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTareasub(): ?string
    {
        return $this->tareasub;
    }

    public function setTareasub(string $tareasub): self
    {
        $this->tareasub = $tareasub;

        return $this;
    }

    public function getTarea(): ?Tarea
    {
        return $this->tarea;
    }

    public function setTarea(?Tarea $tarea): self
    {
        $this->tarea = $tarea;

        return $this;
    }
}
