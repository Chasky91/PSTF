<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
//producto tiene ID
//               nombre
//               descripcion
//               cantidad
//               stockCritico
//               fecha de ingreso
/** 
*
*@ORM\Entity(repositoryClass="Application\Repository\Producto") 
*@ORM\Table(name="producto")
*/
class Producto  
{
    
    /**
     * @ORM\Column(type="integer",unique=true)
     * @ORM\GeneratedValue
     * @ORM\Id
     */   
    protected $id_producto;
    /** @ORM\Column (length= 200) */
    protected $nombre;
    /** @ORM\Column (length=350) */
    protected $descripcion;
    /** @ORM\Column (type="integer") */
    protected $cantidad;
    /** @ORM\Column(name="activo", type="boolean", nullable=false) */
    protected $activo;
    /** @ORM\Column (type="integer") */
    protected $stockCritico;
    /** @ORM\Column (type="datetime") */
    protected $fecha_ingreso;
     /**
     * @ORM\ManyToOne(targetEntity="Modulo")
     * @ORM\JoinColumn(name="modulo_id", referencedColumnName="idModulo",nullable=true)
     */
    protected $modulo_id;
    
    public function __construct() {
        $this->fecha_ingreso = new DateTime();
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
     * Set moduloId
     *
     * @param \Application\Entity\Modulo $moduloId
     *
     * @return Producto
     */
    public function setModuloId(\Application\Entity\Modulo $moduloId = null)
    {
        $this->modulo_id = $moduloId;

        return $this;
    }

    /**
     * Get moduloId
     *
     * @return \Application\Entity\Modulo
     */
    public function getModuloId()
    {
        return $this->modulo_id;
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
}
