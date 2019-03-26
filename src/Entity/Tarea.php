<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TareaRepository")
 */
class Tarea
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
    private $tarea;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Tareasub", mappedBy="tarea")
     */
    private $tareasubs;

    public function __construct()
    {
        $this->tareasubs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }
   
    public function getTarea(): ?string
    {
        return $this->tarea;
    }

    public function setTarea(string $tarea): self
    {
        $this->tarea = $tarea;

        return $this;
    }

    /**
     * @return Collection|Tareasub[]
     */
    public function getTareasubs(): Collection
    {
        return $this->tareasubs;
    }

    public function addTareasub(Tareasub $tareasub): self
    {
        if (!$this->tareasubs->containsgetTareasubs()($tareasub)) {
            $this->tareasubs[] = $tareasub;
            $tareasub->setTarea($this);
        }

        return $this;
    }

    public function removeTareasub(Tareasub $tareasub): self
    {
        if ($this->tareasubs->contains($tareasub)) {
            $this->tareasubs->removeElement($tareasub);
            // set the owning side to null (unless already changed)
            if ($tareasub->getTarea() === $this) {
                $tareasub->setTarea(null);
            }
        }

        return $this;
    }
}
