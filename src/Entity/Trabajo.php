<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TrabajoRepository")
 */
class Trabajo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $idpedido;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $s_path_paletiza;

    /**
     * @ORM\Column(type="string", length=127)
     */
    private $s_trabajo;

    /**
     * @ORM\Column(type="integer")
     */
    private $i_unidades;

    /**
     * @ORM\Column(type="string", length=31, nullable=true)
     */
    private $s_cod_art;

    /**
     * @ORM\Column(type="string", length=63, nullable=true)
     */
    private $s_orden_de_compra;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mt_notas;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_finalizado;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_tipo_palet;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_en2pal;

    /**
     * @ORM\Column(type="smallint", options={"default" : 0})
     */
    private $i_en_cajas;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_for_ban;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_separadores;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_apilado;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private $i_uds_planta;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_plantas_par;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_plantas_impar;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_peso_par;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_peso_impar;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_cantoneras;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_tapado;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_alt_par;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_alt_impar;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mt_otros_gra;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dimension_caja;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_uds_caja;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $i_cajas_planta;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $mt_otros_caj;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dir1;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dir2;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dir3;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dir4;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dir5;

    /**
     * @ORM\Column(type="string", length=127, nullable=true)
     */
    private $s_dir6;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_eti_x_caja;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 0})
     */
    private $n_kg_x_caja;

    /**
     * @ORM\Column(type="smallint", nullable=true, options={"default" : 1})
     */
    private $i_eti_defecto;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : true})
     */
    private $i_activo;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_lote;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private $idsemi_pedido;

    /**
     * @ORM\Column(type="float", nullable=true, options={"default" : 0})
     */
    private $n_peso_palet;

    /**
     * @ORM\Column(type="float", nullable=true, options={"default" : 0})
     */
    private $valor;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default" : false})
     */
    private $i_extranjero;

    /**
     * @ORM\Column(type="float", nullable=true, options={"default" : 0})
     */
    private $manod;

    /**
     * @ORM\Column(type="float", nullable=true, options={"default" : 0})
     */
    private $venta;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_changed;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private $i_changed;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $t_added;

    /**
     * @ORM\Column(type="integer", nullable=true, options={"default" : 0})
     */
    private $i_added;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Carpeta", mappedBy="trabajos")
     */
    private $carpetas;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Semi", inversedBy="trabajos")
     */
    private $semis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CodigoP", mappedBy="trabajo")
     */
    private $codigoP;

    /**
     * @ORM\Column(type="integer", unique=true, nullable=true)
     */
    private $id_anterior;


    public function __construct()
    {
        $this->carpetas = new ArrayCollection();
        $this->semis = new ArrayCollection();
        $this->codigoP = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSPathPaletiza(): ?string
    {
        return $this->s_path_paletiza;
    }

    public function setSPathPaletiza(?string $s_path_paletiza): self
    {
        $this->s_path_paletiza = $s_path_paletiza;

        return $this;
    }

    public function getSTrabajo(): ?string
    {
        return $this->s_trabajo;
    }

    public function setSTrabajo(string $s_trabajo): self
    {
        $this->s_trabajo = $s_trabajo;

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

    public function getSCodArt(): ?string
    {
        return $this->s_cod_art;
    }

    public function setSCodArt(?string $s_cod_art): self
    {
        $this->s_cod_art = $s_cod_art;

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

    public function getMtNotas(): ?string
    {
        return $this->mt_notas;
    }

    public function setMtNotas(?string $mt_notas): self
    {
        $this->mt_notas = $mt_notas;

        return $this;
    }

    public function getIFinalizado(): ?bool
    {
        return $this->i_finalizado;
    }

    public function setIFinalizado(bool $i_finalizado): self
    {
        $this->i_finalizado = $i_finalizado;

        return $this;
    }

    public function getSTipoPalet(): ?string
    {
        return $this->s_tipo_palet;
    }

    public function setSTipoPalet(?string $s_tipo_palet): self
    {
        $this->s_tipo_palet = $s_tipo_palet;

        return $this;
    }

    public function getIEn2pal(): ?bool
    {
        return $this->i_en2pal;
    }

    public function setIEn2pal(bool $i_en2pal): self
    {
        $this->i_en2pal = $i_en2pal;

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

    public function getSForBan(): ?string
    {
        return $this->s_for_ban;
    }

    public function setSForBan(?string $s_for_ban): self
    {
        $this->s_for_ban = $s_for_ban;

        return $this;
    }

    public function getSSeparadores(): ?string
    {
        return $this->s_separadores;
    }

    public function setSSeparadores(?string $s_separadores): self
    {
        $this->s_separadores = $s_separadores;

        return $this;
    }

    public function getSApilado(): ?string
    {
        return $this->s_apilado;
    }

    public function setSApilado(?string $s_apilado): self
    {
        $this->s_apilado = $s_apilado;

        return $this;
    }

    public function getIUdsPlanta(): ?int
    {
        return $this->i_uds_planta;
    }

    public function setIUdsPlanta(?int $i_uds_planta): self
    {
        $this->i_uds_planta = $i_uds_planta;

        return $this;
    }

    public function getIPlantasPar(): ?int
    {
        return $this->i_plantas_par;
    }

    public function setIPlantasPar(int $i_plantas_par): self
    {
        $this->i_plantas_par = $i_plantas_par;

        return $this;
    }

    public function getIPlantasImpar(): ?int
    {
        return $this->i_plantas_impar;
    }

    public function setIPlantasImpar(int $i_plantas_impar): self
    {
        $this->i_plantas_impar = $i_plantas_impar;

        return $this;
    }

    public function getIPesoPar(): ?int
    {
        return $this->i_peso_par;
    }

    public function setIPesoPar(int $i_peso_par): self
    {
        $this->i_peso_par = $i_peso_par;

        return $this;
    }

    public function getIPesoImpar(): ?int
    {
        return $this->i_peso_impar;
    }

    public function setIPesoImpar(int $i_peso_impar): self
    {
        $this->i_peso_impar = $i_peso_impar;

        return $this;
    }

    public function getICantoneras(): ?bool
    {
        return $this->i_cantoneras;
    }

    public function setICantoneras(bool $i_cantoneras): self
    {
        $this->i_cantoneras = $i_cantoneras;

        return $this;
    }

    public function getITapado(): ?bool
    {
        return $this->i_tapado;
    }

    public function setITapado(bool $i_tapado): self
    {
        $this->i_tapado = $i_tapado;

        return $this;
    }

    public function getIAltPar(): ?int
    {
        return $this->i_alt_par;
    }

    public function setIAltPar(int $i_alt_par): self
    {
        $this->i_alt_par = $i_alt_par;

        return $this;
    }

    public function getIAltImpar(): ?int
    {
        return $this->i_alt_impar;
    }

    public function setIAltImpar(int $i_alt_impar): self
    {
        $this->i_alt_impar = $i_alt_impar;

        return $this;
    }

    public function getMtOtrosGra(): ?string
    {
        return $this->mt_otros_gra;
    }

    public function setMtOtrosGra(?string $mt_otros_gra): self
    {
        $this->mt_otros_gra = $mt_otros_gra;

        return $this;
    }

    public function getSDimensionCaja(): ?string
    {
        return $this->s_dimension_caja;
    }

    public function setSDimensionCaja(?string $s_dimension_caja): self
    {
        $this->s_dimension_caja = $s_dimension_caja;

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

    public function getICajasPlanta(): ?int
    {
        return $this->i_cajas_planta;
    }

    public function setICajasPlanta(int $i_cajas_planta): self
    {
        $this->i_cajas_planta = $i_cajas_planta;

        return $this;
    }

    public function getMtOtrosCaj(): ?string
    {
        return $this->mt_otros_caj;
    }

    public function setMtOtrosCaj(?string $mt_otros_caj): self
    {
        $this->mt_otros_caj = $mt_otros_caj;

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

    public function getIEtiXCaja(): ?bool
    {
        return $this->i_eti_x_caja;
    }

    public function setIEtiXCaja(bool $i_eti_x_caja): self
    {
        $this->i_eti_x_caja = $i_eti_x_caja;

        return $this;
    }

    public function getNKgXCaja(): ?int
    {
        return $this->n_kg_x_caja;
    }

    public function setNKgXCaja(int $n_kg_x_caja): self
    {
        $this->n_kg_x_caja = $n_kg_x_caja;

        return $this;
    }

    public function getIEtiDefecto(): ?bool
    {
        return $this->i_eti_defecto;
    }

    public function setIEtiDefecto(bool $i_eti_defecto): self
    {
        $this->i_eti_defecto = $i_eti_defecto;

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

    public function getILote(): ?bool
    {
        return $this->i_lote;
    }

    public function setILote(bool $i_lote): self
    {
        $this->i_lote = $i_lote;

        return $this;
    }

    public function getIdsemiPedido(): ?int
    {
        return $this->idsemi_pedido;
    }

    public function setIdsemiPedido(int $idsemi_pedido): self
    {
        $this->idsemi_pedido = $idsemi_pedido;

        return $this;
    }

    public function getNPesoPalet(): ?float
    {
        return $this->n_peso_palet;
    }

    public function setNPesoPalet(float $n_peso_palet): self
    {
        $this->n_peso_palet = $n_peso_palet;

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

    public function getIExtranjero(): ?bool
    {
        return $this->i_extranjero;
    }

    public function setIExtranjero(bool $i_extranjero): self
    {
        $this->i_extranjero = $i_extranjero;

        return $this;
    }

    public function getManod(): ?float
    {
        return $this->manod;
    }

    public function setManod(float $manod): self
    {
        $this->manod = $manod;

        return $this;
    }

    public function getVenta(): ?float
    {
        return $this->venta;
    }

    public function setVenta(float $venta): self
    {
        $this->venta = $venta;

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

    public function setIChanged(int $i_changed): self
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

    public function setIAdded(int $i_added): self
    {
        $this->i_added = $i_added;

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
            $carpeta->addTrabajo($this);
        }

        return $this;
    }

    public function removeCarpeta(Carpeta $carpeta): self
    {
        if ($this->carpetas->contains($carpeta)) {
            $this->carpetas->removeElement($carpeta);
            $carpeta->removeTrabajo($this);
        }

        return $this;
    }

    /**
     * @return Collection|Semi[]
     */
    public function getSemis(): Collection
    {
        return $this->semis;
    }

    public function addSemi(Semi $semi): self
    {
        if (!$this->semis->contains($semi)) {
            $this->semis[] = $semi;
        }

        return $this;
    }

    public function removeSemi(Semi $semi): self
    {
        if ($this->semis->contains($semi)) {
            $this->semis->removeElement($semi);
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
            $codigoP->setTrabajo($this);
        }

        return $this;
    }

    public function removeCodigoP(CodigoP $codigoP): self
    {
        if ($this->codigoP->contains($codigoP)) {
            $this->codigoP->removeElement($codigoP);
            // set the owning side to null (unless already changed)
            if ($codigoP->getTrabajo() === $this) {
                $codigoP->setTrabajo(null);
            }
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

}
