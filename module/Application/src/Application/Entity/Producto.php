<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** 
*
*@ORM\Entity 
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
    protected $item;
    /** @ORM\Column (length=350) */
    protected $descripcion;
    /** @ORM\Column (type="datetime") */
    protected $fecha_ingreso;
    
    
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
     * Set item
     *
     * @param string $item
     *
     * @return Producto
     */
    public function setItem($item)
    {
        $this->item = $item;

        return $this;
    }

    /**
     * Get item
     *
     * @return string
     */
    public function getItem()
    {
        return $this->item;
    }

    

    /**
     * Set fechaIngreso
     *
     * @param string $fechaIngreso
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
     * @return string
     */
    public function getFechaIngreso()
    {
        return $this->fecha_ingreso;
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
}
