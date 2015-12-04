<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity 
 */
class Modulo {
    
    /**
     * @ORM\Column(name="id", type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $idModulo;
    /**
     * @ORM\ManyToOne(targetEntity="Producto")
     * @ORM\JoinColumn(name="producto_id", referencedColumnName="id_producto")
     */
    protected $producto;
    /**
     * @ORM\Column(name="nombre", type="string", length=140,  nullable=false, unique=false)
     */
    protected $tipo;
    


    /**
     * Get idModulo
     *
     * @return integer
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Modulo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set producto
     *
     * @param \Application\Entity\Producto $producto
     *
     * @return Modulo
     */
    public function setProducto(\Application\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Application\Entity\Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
