<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PedidoRepository")
 */
class Pedido
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Cliente", inversedBy="pedidos")
     */
    private $cliente;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CodigoS", mappedBy="pedido")
     */
    private $codigoS;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CodigoP", mappedBy="pedido")
     */
    private $codigoP;

    public function __construct()
    {
        $this->codigoS = new ArrayCollection();
        $this->codigoPs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|CodigoS[]
     */
    public function getCodigoS(): Collection
    {
        return $this->codigoS;
    }

    public function addCodigo(CodigoS $codigo): self
    {
        if (!$this->codigoS->contains($codigo)) {
            $this->codigoS[] = $codigo;
            $codigo->setPedido($this);
        }

        return $this;
    }

    public function removeCodigo(CodigoS $codigo): self
    {
        if ($this->codigoS->contains($codigo)) {
            $this->codigoS->removeElement($codigo);
            // set the owning side to null (unless already changed)
            if ($codigo->getPedido() === $this) {
                $codigo->setPedido(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CodigoP[]
     */
    public function getCodigoP(): Collection
    {
        return $this->codigoP;
    }

    public function addCodigoP(CodigoP $codigoP): self
    {
        if (!$this->codigoP->contains($codigoP)) {
            $this->codigoP[] = $codigoP;
            $codigoP->setPedido($this);
        }

        return $this;
    }

    public function removeCodigoP(CodigoP $codigoP): self
    {
        if ($this->codigoP->contains($codigoP)) {
            $this->codigoP->removeElement($codigoP);
            // set the owning side to null (unless already changed)
            if ($codigoP->getPedido() === $this) {
                $codigoP->setPedido(null);
            }
        }

        return $this;
    }
}
