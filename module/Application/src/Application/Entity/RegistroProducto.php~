<?php 
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 */
class RegistroProducto
{


    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected  $idRegistro;

    /**
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumn(name="productoId", referencedColumnName="id_producto", nullable=false)
     */
    protected $productoId;



    /**
     * Get idRegistro
     *
     * @return integer
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    /**
     * Set productoId
     *
     * @param \Application\Entity\Producto $productoId
     *
     * @return RegistroProducto
     */
    public function setProductoId(\Application\Entity\Producto $productoId = null)
    {
        $this->productoId = $productoId;

        return $this;
    }

    /**
     * Get productoId
     *
     * @return \Application\Entity\Producto
     */
    public function getProductoId()
    {
        return $this->productoId;
    }
}
