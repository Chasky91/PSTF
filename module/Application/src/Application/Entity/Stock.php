<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 *@ORM\Entity
 * 
 */
class Stock
{
    
    /**
     *
     * @ORM\Column(type="integer",unique=true)
     * @ORM\GeneratedValue
     * @ORM\Id
     */
    protected $idStock;
    
    /**
     * @ORM\Column(type="integer")
     */
    protected $cantidad;
      /**
     * @ORM\Column(type="integer")
     */
    protected $unidad; 
    /** @ORM\Column (type="datetime") */
    protected $fecha_de_ingreso;
    
    /*
     * construct
     */
    public function __construct() {
        $this->fecha_de_ingreso =new DateTime();
    }


       

    /**
     * Get idStock
     *
     * @return integer
     */
    public function getIdStock()
    {
        return $this->idStock;
    }

    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Stock
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
     * Set unidad
     *
     * @param integer $unidad
     *
     * @return Stock
     */
    public function setUnidad($unidad)
    {
        $this->unidad = $unidad;

        return $this;
    }

    /**
     * Get unidad
     *
     * @return integer
     */
    public function getUnidad()
    {
        return $this->unidad;
    }

    /**
     * Set fechaDeIngreso
     *
     * @param \DateTime $fechaDeIngreso
     *
     * @return Stock
     */
    public function setFechaDeIngreso($fechaDeIngreso)
    {
        $this->fecha_de_ingreso = $fechaDeIngreso;

        return $this;
    }

    /**
     * Get fechaDeIngreso
     *
     * @return \DateTime
     */
    public function getFechaDeIngreso()
    {
        return $this->fecha_de_ingreso;
    }
}
