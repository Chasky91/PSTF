<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity 
 */
class ProductosDeModulo {
    
    /**
     * @ORM\ManyToOne(targetEntity="Modulo")
     * @ORM\JoinColumn(name="moduloId", referencedColumnName="idModulo",nullable=false, unique=False)
     * @ORM\Id
     */
 
    protected $moduloId;
    
   /**
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumn( name ="idProducto",referencedColumnName="id_producto",  nullable=false, unique=False)
     * @ORM\Id
     */
    protected $idProducto;
    /**
     * @ORM\Column(name="cantidad",type="integer",  nullable=true)
     */
    protected $cantidad;


    /**
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return ProductosDeModulo
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
     * Set moduloId
     *
     * @param \Application\Entity\Modulo $moduloId
     *
     * @return ProductosDeModulo
     */
    public function setModuloId(\Application\Entity\Modulo $moduloId)
    {
        $this->moduloId = $moduloId;

        return $this;
    }

    /**
     * Get moduloId
     *
     * @return \Application\Entity\Modulo
     */
    public function getModuloId()
    {
        return $this->moduloId;
    }

    /**
     * Set idProducto
     *
     * @param \Application\Entity\Producto $idProducto
     *
     * @return ProductosDeModulo
     */
    public function setIdProducto(\Application\Entity\Producto $idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \Application\Entity\Producto
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
}
