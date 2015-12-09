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
     * @ORM\Column(type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected  $idPlanilla;
    /** 
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $idBenificiario;
    /** @ORM\Column(type="text", nullable=false) */
    protected $detalleEntrega;
    /** @ORM\Column (type="datetime") */
    protected $fechDeEntrega;

    public function __construct() {
         $this->fechDeEntrega = new DateTime();  
    }

    

    /**
     * Set idPlanilla
     *
     * @param integer $idPlanilla
     *
     * @return AsistenciaMensual
     */
    public function setIdPlanilla($idPlanilla)
    {
        $this->idPlanilla = $idPlanilla;

        return $this;
    }

    /**
     * Get idPlanilla
     *
     * @return integer
     */
    public function getIdPlanilla()
    {
        return $this->idPlanilla;
    }

    /**
     * Set idBenificiario
     *
     * @param integer $idBenificiario
     *
     * @return AsistenciaMensual
     */
    public function setIdBenificiario($idBenificiario)
    {
        $this->idBenificiario = $idBenificiario;

        return $this;
    }

    /**
     * Get idBenificiario
     *
     * @return integer
     */
    public function getIdBenificiario()
    {
        return $this->idBenificiario;
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
}
