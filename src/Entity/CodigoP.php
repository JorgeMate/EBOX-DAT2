<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CodigoPRepository")
 */
class CodigoP
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
    private $i_completo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $i_externo;

    /**
     * @ORM\Column(type="string", length=10)
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
     * @ORM\ManyToOne(targetEntity="App\Entity\Trabajo", inversedBy="codigoP")
     * @ORM\JoinColumn(nullable=false)
     */
    private $trabajo;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_trabajo;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idpack_list;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $i_impar;

    /**
     * @ORM\Column(type="integer")
     */
    private $i_unidades;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $i_peso;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $d_fecha_exp;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_changed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_changed;

    /**
     * @ORM\Column(type="datetime")
     */
    private $t_added;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_added;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_lote;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $n_peso_palet;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_dir1;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_dir2;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_dir3;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_dir4;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_dir5;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_dir6;

    /**
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $s_orden_de_compra;

    /**
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $s_cod_art;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valor;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $cerrado;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pedido", inversedBy="codigoP")
     */
    private $pedido;




    
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

    public function getICompleto(): ?bool
    {
        return $this->i_completo;
    }

    public function setICompleto(?bool $i_completo): self
    {
        $this->i_completo = $i_completo;

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

    public function setSExterno(?string $s_externo): self
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

    public function getTrabajo(): ?Trabajo
    {
        return $this->trabajo;
    }

    public function setTrabajo(?Trabajo $trabajo): self
    {
        $this->trabajo = $trabajo;

        return $this;
    }

    public function getSTrabajo(): ?string
    {
        return $this->s_trabajo;
    }

    public function setSTrabajo(?string $s_trabajo): self
    {
        $this->s_trabajo = $s_trabajo;

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

    public function getIImpar(): ?bool
    {
        return $this->i_impar;
    }

    public function setIImpar(?bool $i_impar): self
    {
        $this->i_impar = $i_impar;

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

    public function getIPeso(): ?int
    {
        return $this->i_peso;
    }

    public function setIPeso(?int $i_peso): self
    {
        $this->i_peso = $i_peso;

        return $this;
    }

    public function getDFechaExp(): ?\DateTimeInterface
    {
        return $this->d_fecha_exp;
    }

    public function setDFechaExp(?\DateTimeInterface $d_fecha_exp): self
    {
        $this->d_fecha_exp = $d_fecha_exp;

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

    public function getIChanged(): ?int
    {
        return $this->i_changed;
    }

    public function setIChanged(?int $i_changed): self
    {
        $this->i_changed = $i_changed;

        return $this;
    }

    public function getTAdded(): ?\DateTimeInterface
    {
        return $this->t_added;
    }

    public function setTAdded(\DateTimeInterface $t_added): self
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

    public function getILote(): ?int
    {
        return $this->i_lote;
    }

    public function setILote(?int $i_lote): self
    {
        $this->i_lote = $i_lote;

        return $this;
    }

    public function getNPesoPalet(): ?float
    {
        return $this->n_peso_palet;
    }

    public function setNPesoPalet(?float $n_peso_palet): self
    {
        $this->n_peso_palet = $n_peso_palet;

        return $this;
    }

    public function getSDir1(): ?string
    {
        return $this->s_dir1;
    }

    public function setSDir1(?string $s_dir1): self
    {
        $this->s_dir1 = $s_dir1;

        return $this;
    }

    public function getSDir2(): ?string
    {
        return $this->s_dir2;
    }

    public function setSDir2(?string $s_dir2): self
    {
        $this->s_dir2 = $s_dir2;

        return $this;
    }

    public function getSDir3(): ?string
    {
        return $this->s_dir3;
    }

    public function setSDir3(?string $s_dir3): self
    {
        $this->s_dir3 = $s_dir3;

        return $this;
    }

    public function getSDir4(): ?string
    {
        return $this->s_dir4;
    }

    public function setSDir4(?string $s_dir4): self
    {
        $this->s_dir4 = $s_dir4;

        return $this;
    }

    public function getSDir5(): ?string
    {
        return $this->s_dir5;
    }

    public function setSDir5(?string $s_dir5): self
    {
        $this->s_dir5 = $s_dir5;

        return $this;
    }

    public function getSDir6(): ?string
    {
        return $this->s_dir6;
    }

    public function setSDir6(?string $s_dir6): self
    {
        $this->s_dir6 = $s_dir6;

        return $this;
    }

    public function getSOrdenDeCompra(): ?string
    {
        return $this->s_orden_de_compra;
    }

    public function setSOrdenDeCompra(?string $s_orden_de_compra): self
    {
        $this->s_orden_de_compra = $s_orden_de_compra;

        return $this;
    }

    public function getSCodArt(): ?string
    {
        return $this->s_cod_art;
    }

    public function setSCodArt(?string $s_cod_art): self
    {
        $this->s_cod_art = $s_cod_art;

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

    public function getCerrado(): ?bool
    {
        return $this->cerrado;
    }

    public function setCerrado(?bool $cerrado): self
    {
        $this->cerrado = $cerrado;

        return $this;
    }

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

}
