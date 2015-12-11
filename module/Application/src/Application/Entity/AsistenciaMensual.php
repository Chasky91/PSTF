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
     * @ORM\OneToOne(targetEntity="Beneficiario")
     * @ORM\JoinColumn(name="idPlanilla", referencedColumnName="idBeneficiario")
     * @ORM\Id
     */
    protected $idPlanilla;
    /**
     * @ORM\OneToOne(targetEntity="Registro")
     * @ORM\JoinColumn(name="registroId", referencedColumnName="idRegistro")
     * @ORM\Id
     */
    protected  $registroId;

    /**
     * @ORM\OneToOne(targetEntity="Modulo")
     * @ORM\JoinColumn(name="modulo", referencedColumnName="idModulo", nullable=true)
     */
    protected $modulo;

    /**
     * @ORM\OneToOne(targetEntity="Producto")
     * @ORM\JoinColumn(name="producto", referencedColumnName="id_producto",nullable=true)
     */
    protected $producto;

    /** @ORM\Column(type="text", nullable=true) */
    protected $detalleEntrega;
    /** @ORM\Column (type="datetime") */
    protected $fechDeEntrega;

    public function __construct() {
         $this->fechDeEntrega = new DateTime();  
    }


    /**
     * Set detalleEntrega
     *
     * @param string $detalleEntrega
     *
     * @return AsistenciaMensual
     */
    public function setDetalleEntrega($detalleEntrega)
    {
        $this->detalleEntrega = $detalleEntrega;

        return $this;
    }

    /**
     * Get detalleEntrega
     *
     * @return string
     */
    public function getDetalleEntrega()
    {
        return $this->detalleEntrega;
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
     * Set idPlanilla
     *
     * @param \Application\Entity\Beneficiario $idPlanilla
     *
     * @return AsistenciaMensual
     */
    public function setIdPlanilla(\Application\Entity\Beneficiario $idPlanilla)
    {
        $this->idPlanilla = $idPlanilla;

        return $this;
    }

    /**
     * Get idPlanilla
     *
     * @return \Application\Entity\Beneficiario
     */
    public function getIdPlanilla()
    {
        return $this->idPlanilla;
    }

    /**
     * Set registroId
     *
     * @param \Application\Entity\Registro $registroId
     *
     * @return AsistenciaMensual
     */
    public function setRegistroId(\Application\Entity\Registro $registroId)
    {
        $this->registroId = $registroId;

        return $this;
    }

    /**
     * Get registroId
     *
     * @return \Application\Entity\Registro
     */
    public function getRegistroId()
    {
        return $this->registroId;
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
