<?php

namespace Application\Entity;

/**
 * RegistroDeModulo
 */
class RegistroDeModulo
{
    /**
     * @var integer
     */
    private $idDetalle;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \DateTime
     */
    private $fechaEntrega;

    /**
     * @var \Application\Entity\Beneficiario
     */
    private $beneficiarioId;


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
     * @return RegistroDeModulo
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
     * @return RegistroDeModulo
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
     * @return RegistroDeModulo
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

