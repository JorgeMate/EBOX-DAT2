<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SemiRepository")
 */
class Semi
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=127)
     */
    private $s_semi;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $i_externo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $i_en_cajas;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $i_uds_caja;

    /**
     * @ORM\Column(type="smallint", nullable=true)
     */
    private $i_cajas_palet;

    /**
     * @ORM\Column(type="smallint")
     */
    private $i_uds_palet;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_especificaciones;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_changed;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_changed;
    
    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_added;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $i_added;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mt_notas;

    /**
     * @ORM\Column(type="boolean")
     */
    private $i_activo;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $i_lito_lote;

    /**
     * @ORM\Column(type="boolean")
     */
    private $generico;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $stock_min;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valor;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $i_forzar_lote;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_lote;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Trabajo", mappedBy="semis")
     */
    private $trabajos;

    /**
     * @ORM\Column(type="integer", nullable=true, unique=true)
     */
    private $id_anterior;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CodigoS", mappedBy="semi")
     */
    private $codigoS;


    public function __construct()
    {
        $this->trabajos = new ArrayCollection();
        $this->codigoS = new ArrayCollection();
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

 

    public function getSSemi(): ?string
    {
        return $this->s_semi;
    }

    public function setSSemi(string $s_semi): self
    {
        $this->s_semi = $s_semi;

        return $this;
    }

    public function getIExterno(): ?bool
    {
        return $this->i_externo;
    }

    public function setIExterno(bool $i_externo): self
    {
        $this->i_externo = $i_externo;

        return $this;
    }

    public function getIEnCajas(): ?bool
    {
        return $this->i_en_cajas;
    }

    public function setIEnCajas(bool $i_en_cajas): self
    {
        $this->i_en_cajas = $i_en_cajas;

        return $this;
    }

    public function getIUdsCaja(): ?int
    {
        return $this->i_uds_caja;
    }

    public function setIUdsCaja(int $i_uds_caja): self
    {
        $this->i_uds_caja = $i_uds_caja;

        return $this;
    }

    public function getICajasPalet(): ?int
    {
        return $this->i_cajas_palet;
    }

    public function setICajasPalet(int $i_cajas_palet): self
    {
        $this->i_cajas_palet = $i_cajas_palet;

        return $this;
    }

    public function getIUdsPalet(): ?int
    {
        return $this->i_uds_palet;
    }

    public function setIUdsPalet(int $i_uds_palet): self
    {
        $this->i_uds_palet = $i_uds_palet;

        return $this;
    }

    public function getSEspecificaciones(): ?string
    {
        return $this->s_especificaciones;
    }

    public function setSEspecificaciones(?string $s_especificaciones): self
    {
        $this->s_especificaciones = $s_especificaciones;

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

    public function getMtNotas(): ?string
    {
        return $this->mt_notas;
    }

    public function setMtNotas(?string $mt_notas): self
    {
        $this->mt_notas = $mt_notas;

        return $this;
    }

    public function getIActivo(): ?bool
    {
        return $this->i_activo;
    }

    public function setIActivo(bool $i_activo): self
    {
        $this->i_activo = $i_activo;

        return $this;
    }

    public function getILitoLote(): ?bool
    {
        return $this->i_lito_lote;
    }

    public function setILitoLote(bool $i_lito_lote): self
    {
        $this->i_lito_lote = $i_lito_lote;

        return $this;
    }

    public function getGenerico(): ?bool
    {
        return $this->generico;
    }

    public function setGenerico(bool $generico): self
    {
        $this->generico = $generico;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }

    public function getStockMin(): ?int
    {
        return $this->stock_min;
    }

    public function setStockMin(int $stock_min): self
    {
        $this->stock_min = $stock_min;

        return $this;
    }

    public function getValor(): ?float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }

    public function getIForzarLote(): ?bool
    {
        return $this->i_forzar_lote;
    }

    public function setIForzarLote(bool $i_forzar_lote): self
    {
        $this->i_forzar_lote = $i_forzar_lote;

        return $this;
    }

    public function getSLote(): ?string
    {
        return $this->s_lote;
    }

    public function setSLote(?string $s_lote): self
    {
        $this->s_lote = $s_lote;

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
            $trabajo->addSemi($this);
        }

        return $this;
    }

    public function removeTrabajo(Trabajo $trabajo): self
    {
        if ($this->trabajos->contains($trabajo)) {
            $this->trabajos->removeElement($trabajo);
            $trabajo->removeSemi($this);
        }

        return $this;
    }

    public function getIdAnterior(): ?int
    {
        return $this->id_anterior;
    }

    public function setIdAnterior(?int $id_anterior): self
    {
        $this->id_anterior = $id_anterior;

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
            $codigo->setSemi($this);
        }

        return $this;
    }

    public function removeCodigo(CodigoS $codigo): self
    {
        if ($this->codigoS->contains($codigo)) {
            $this->codigoS->removeElement($codigo);
            // set the owning side to null (unless already changed)
            if ($codigo->getSemi() === $this) {
                $codigo->setSemi(null);
            }
        }

        return $this;
    }

}
