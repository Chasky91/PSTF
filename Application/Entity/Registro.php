<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Registro
 *
 * @ORM\Table(name="Registro")
 * @ORM\Entity
 */
class Registro
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRegistro", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRegistro;

    /**
     * @var integer
     *
     * @ORM\Column(name="itemId", type="integer", precision=0, scale=0, nullable=false, unique=false)
     */
    private $itemId;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $tipo;

    /**
     * @var integer
     *
     * @ORM\Column(name="cantidad", type="integer", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cantidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEntrega", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fechaEntrega;

    /**
     * @var \Application\Entity\Beneficiario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Beneficiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="beneficiarioId", referencedColumnName="idBeneficiario", nullable=true)
     * })
     */
    private $beneficiarioId;


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

