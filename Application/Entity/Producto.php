<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 *
 * @ORM\Table(name="producto")
 * @ORM\Entity(repositoryClass="Application\Repository\Producto")
 */
class Producto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_producto", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id_producto;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=200, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=350, precision=0, scale=0, nullable=false, unique=false)
     */
    private $descripcion;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $cantidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $activo;

    /**
     * @var integer
     *
     * @ORM\Column(name="stockCritico", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $stockCritico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fecha_ingreso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Application\Entity\ProductosDeModulo", mappedBy="idProducto")
     */
    private $modulo_id;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modulo_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idProducto
     *
     * @return integer
     */
    public function getIdProducto()
    {
        return $this->id_producto;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Producto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Producto
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Producto
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Producto
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set stockCritico
     *
     * @param integer $stockCritico
     *
     * @return Producto
     */
    public function setStockCritico($stockCritico)
    {
        $this->stockCritico = $stockCritico;

        return $this;
    }

    /**
     * Get stockCritico
     *
     * @return integer
     */
    public function getStockCritico()
    {
        return $this->stockCritico;
    }

    /**
     * Set fechaIngreso
     *
     * @param \DateTime $fechaIngreso
     *
     * @return Producto
     */
    public function setFechaIngreso($fechaIngreso)
    {
        $this->fecha_ingreso = $fechaIngreso;

        return $this;
    }

    /**
     * Get fechaIngreso
     *
     * @return \DateTime
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
    }

    /**
     * Add moduloId
     *
     * @param \Application\Entity\ProductosDeModulo $moduloId
     *
     * @return Producto
     */
    public function addModuloId(\Application\Entity\ProductosDeModulo $moduloId)
    {
        $this->modulo_id[] = $moduloId;

        return $this;
    }

    /**
     * Remove moduloId
     *
     * @param \Application\Entity\ProductosDeModulo $moduloId
     */
    public function removeModuloId(\Application\Entity\ProductosDeModulo $moduloId)
    {
        $this->modulo_id->removeElement($moduloId);
    }

    /**
     * Get moduloId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModuloId()
    {
        return $this->modulo_id;
    }
}

