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
     */
    protected  $idRegistro;
    /**
     * @ORM\OneToMany(targetEntity="Beneficiario", mappedBy="idBeneficiario")
     */
    protected $benificiarioId;
    /** @ORM\Column(type="text", nullable=false) */
    protected $detalleEntrega;
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
     * Add benificiarioId
     *
     * @param \Application\Entity\Beneficiario $benificiarioId
     *
     * @return AsistenciaMensual
     */
    public function addBenificiarioId(\Application\Entity\Beneficiario $benificiarioId)
    {
        $this->benificiarioId[] = $benificiarioId;

        return $this;
    }

    /**
     * Remove benificiarioId
     *
     * @param \Application\Entity\Beneficiario $benificiarioId
     */
    public function removeBenificiarioId(\Application\Entity\Beneficiario $benificiarioId)
    {
        $this->benificiarioId->removeElement($benificiarioId);
    }

    /**
     * Get benificiarioId
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getBenificiarioId()
    {
        return $this->benificiarioId;
    }
}
