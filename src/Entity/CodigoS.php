<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CodigoSRepository")
 */
class CodigoS
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1, nullable=true)
     */
    private $c_origen;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $i_externo;

    /**
     * @ORM\Column(type="string", length=10, unique=true)
     */
    private $s_codigo;

    /**
     * @ORM\Column(type="string", length=32, nullable=true)
     */
    private $s_externo;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $i_loc;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Semi", inversedBy="codigoS")
     * @ORM\JoinColumn(nullable=false)
     */
    private $semi;

    /**
     * @ORM\Column(type="integer")
     */
    private $i_unidades;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_uds_tomadas;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dt_consumo;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_changed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_added;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_added;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $s_notas;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idpedido;

    /**
     * @ORM\Column(type="string", length=64, nullable=true)
     */
    private $s_semi;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valor;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idpack_list;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_changed;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCOrigen(): ?string
    {
        return $this->c_origen;
    }

    public function setCOrigen(?string $c_origen): self
    {
        $this->c_origen = $c_origen;

        return $this;
    }

    public function getIExterno(): ?bool
    {
        return $this->i_externo;
    }

    public function setIExterno(?bool $i_externo): self
    {
        $this->i_externo = $i_externo;

        return $this;
    }

    public function getSCodigo(): ?string
    {
        return $this->s_codigo;
    }

    public function setSCodigo(string $s_codigo): self
    {
        $this->s_codigo = $s_codigo;

        return $this;
    }

    public function getSExterno(): ?string
    {
        return $this->s_externo;
    }

    public function setSExterno(string $s_externo): self
    {
        $this->s_externo = $s_externo;

        return $this;
    }

    public function getILoc(): ?int
    {
        return $this->i_loc;
    }

    public function setILoc(?int $i_loc): self
    {
        $this->i_loc = $i_loc;

        return $this;
    }

    public function getSemi(): ?Semi
    {
        return $this->semi;
    }

    public function setSemi(?Semi $semi): self
    {
        $this->semi = $semi;

        return $this;
    }

    public function getIUnidades(): ?int
    {
        return $this->i_unidades;
    }

    public function setIUnidades(int $i_unidades): self
    {
        $this->i_unidades = $i_unidades;

        return $this;
    }

    public function getIUdsTomadas(): ?int
    {
        return $this->i_uds_tomadas;
    }

    public function setIUdsTomadas(?int $i_uds_tomadas): self
    {
        $this->i_uds_tomadas = $i_uds_tomadas;

        return $this;
    }

    public function getDtConsumo(): ?\DateTimeInterface
    {
        return $this->dt_consumo;
    }

    public function setDtConsumo(?\DateTimeInterface $dt_consumo): self
    {
        $this->dt_consumo = $dt_consumo;

        return $this;
    }

    public function getTChanged(): ?\DateTimeInterface
    {
        return $this->t_changed;
    }

    public function setTChanged(?\DateTimeInterface $t_changed): self
    {
        $this->t_changed = $t_changed;

        return $this;
    }

    public function getTAdded(): ?\DateTimeInterface
    {
        return $this->t_added;
    }

    public function setTAdded(?\DateTimeInterface $t_added): self
    {
        $this->t_added = $t_added;

        return $this;
    }

    public function getIAdded(): ?int
    {
        return $this->i_added;
    }

    public function setIAdded(?int $i_added): self
    {
        $this->i_added = $i_added;

        return $this;
    }

    public function getSNotas(): ?string
    {
        return $this->s_notas;
    }

    public function setSNotas(?string $s_notas): self
    {
        $this->s_notas = $s_notas;

        return $this;
    }

    public function getIdpedido(): ?int
    {
        return $this->idpedido;
    }

    public function setIdpedido(?int $idpedido): self
    {
        $this->idpedido = $idpedido;

        return $this;
    }

    public function getSSemi(): ?string
    {
        return $this->s_semi;
    }

    public function setSSemi(?string $s_semi): self
    {
        $this->s_semi = $s_semi;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(?float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getIdpackList(): ?int
    {
        return $this->idpack_list;
    }

    public function setIdpackList(?int $idpack_list): self
    {
        $this->idpack_list = $idpack_list;

        return $this;
    }

    public function getIChanged(): ?int
    {
        return $this->i_changed;
    }

    public function setIChanged(?int $i_changed): self
    {
        $this->i_changed = $i_changed;

        return $this;
    }
}
