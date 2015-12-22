<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 */
class RegistroDeModulo
{
    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $idDetalle;
 
    /**
     * @ORM\Column(type="text", nullable=false)
     */
    protected $descripcion;
    
    /**
     * @ORM\Column(name="fechaEntrega", type="datetime")
     */
    protected $fechaEntrega;
    
    /**
     * @ORM\ManyToOne(targetEntity="Beneficiario")
     * @ORM\JoinColumn(name="beneficiarioId", referencedColumnName="idBeneficiario",nullable=false)
     */
    protected $beneficiarioId;

    public function __construct() {
        $this->fechaEntrega = new DateTime();
    }



    /**
     * Get idDetalle
     *
     * @return integer
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return DetalleDeEntrga
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

    /**
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     *
     * @return DetalleDeEntrga
     */
    public function setFechaEntrega($fechaEntrega)
    {
        $this->fechaEntrega = $fechaEntrega;

        return $this;
    }

    /**
     * Get fechaEntrega
     *
     * @return \DateTime
     */
    public function getFechaEntrega()
    {
        return $this->fechaEntrega;
    }

    /**
     * Set beneficiarioId
     *
     * @param \Application\Entity\Beneficiario $beneficiarioId
     *
     * @return DetalleDeEntrga
     */
    public function setBeneficiarioId(\Application\Entity\Beneficiario $beneficiarioId = null)
    {
        $this->beneficiarioId = $beneficiarioId;

        return $this;
    }

    /**
     * Get beneficiarioId
     *
     * @return \Application\Entity\Beneficiario
     */
    public function getBeneficiarioId()
    {
        return $this->beneficiarioId;
    }
}
