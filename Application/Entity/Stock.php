<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Stock
 *
 * @ORM\Table(name="Stock")
 * @ORM\Entity
 */
class Stock
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idStock", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idStock;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $cantidad;

    /**
     * @var integer
     *
     * @ORM\Column(name="unidad", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $unidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_de_ingreso", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fecha_de_ingreso;


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

