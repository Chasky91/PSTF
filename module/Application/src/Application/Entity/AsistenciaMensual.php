<?php 
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
/**
 *
 * @ORM\Entity
 */
class AsistenciaMensual
{


    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected  $idRegistro;

    /**
     * @ORM\OneToOne(targetEntity="Modulo")
     * @ORM\JoinColumn(name="modulo", referencedColumnName="idModulo", nullable=true, unique=true)
     */
    protected $modulo;

    /**
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumn(name="producto", referencedColumnName="id_producto", nullable=true, unique=true)
     */
    protected $producto;

    /** @ORM\Column(type="text", nullable=true) */
    protected $otro;
    /** @ORM\Column (type="datetime") */
    protected $fechDeEntrega;

    public function __construct() {
         $this->fechDeEntrega = new DateTime();  
    }


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
     * Set otro
     *
     * @param string $otro
     *
     * @return AsistenciaMensual
     */
    public function setOtro($otro)
    {
        $this->otro = $otro;

        return $this;
    }

    /**
     * Get otro
     *
     * @return string
     */
    public function getOtro()
    {
        return $this->otro;
    }

    /**
     * Set fechDeEntrega
     *
     * @param \DateTime $fechDeEntrega
     *
     * @return AsistenciaMensual
     */
    public function setFechDeEntrega($fechDeEntrega)
    {
        $this->fechDeEntrega = $fechDeEntrega;

        return $this;
    }

    /**
     * Get fechDeEntrega
     *
     * @return \DateTime
     */
    public function getFechDeEntrega()
    {
        return $this->fechDeEntrega;
    }

    /**
     * Set modulo
     *
     * @param \Application\Entity\Modulo $modulo
     *
     * @return AsistenciaMensual
     */
    public function setModulo(\Application\Entity\Modulo $modulo = null)
    {
        $this->modulo = $modulo;

        return $this;
    }

    /**
     * Get modulo
     *
     * @return \Application\Entity\Modulo
     */
    public function getModulo()
    {
        return $this->modulo;
    }

    /**
     * Set producto
     *
     * @param \Application\Entity\Producto $producto
     *
     * @return AsistenciaMensual
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
