<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 */
class Registro
{
    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected $idRegistro;
 
    /**
     * @ORM\Column(type="integer", nullable=false)
     */
    protected $itemId;
    
    /**
     * @ORM\Column(type="string" , nullable=true)
     */
    protected $tipo;
    /**
     * @ORM\Column(name="cantidad", type="integer", nullable=true)
     */
    protected $cantidad;
    
    /**
     * @ORM\Column(name="fechaEntrega", type="datetime")
     */
    protected $fechaEntrega;
    
    /**
     * @ORM\ManyToOne(targetEntity="Beneficiario")
     * @ORM\JoinColumn(name="beneficiarioId", referencedColumnName="idBeneficiario")
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
     * Set itemId
     *
     * @param integer $itemId
     *
     * @return Registro
     */
    public function setItemId($itemId)
    {
        $this->itemId = $itemId;

        return $this;
    }

    /**
     * Get itemId
     *
     * @return integer
     */
    public function getItemId()
    {
        return $this->itemId;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Registro
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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return Registro
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
     * Set fechaEntrega
     *
     * @param \DateTime $fechaEntrega
     *
     * @return Registro
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
     * @return Registro
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
