<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 */
class RegistroDeEntrega
{
    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $idRegistro;
 
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
     * Get idRegistro
     *
     * @return integer
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return RegistroDeEntrega
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
     * @return RegistroDeEntrega
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
     * @return RegistroDeEntrega
     */
    public function setBeneficiarioId(\Application\Entity\Beneficiario $beneficiarioId)
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
