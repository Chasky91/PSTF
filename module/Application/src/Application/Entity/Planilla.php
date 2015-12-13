<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @ORM\Entity
 */
class Planilla {

    /**
     * @ORM\OneToOne(targetEntity="Beneficiario")
     * @ORM\JoinColumn(name="idPlanilla", referencedColumnName="idBeneficiario",unique=FALSE)
     * @ORM\Id
     */
    protected $idPlanilla;

    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     */
    protected $registroId;

    /** @ORM\Column (type="datetime") */
    protected $fechDeEntrega;
    
    public function __construct() {
        $this->fechDeEntrega = new DateTime();
    }


    /**
     * Set registroId
     *
     * @param integer $registroId
     *
     * @return Planilla
     */
    public function setRegistroId($registroId)
    {
        $this->registroId = $registroId;

        return $this;
    }

    /**
     * Get registroId
     *
     * @return integer
     */
    public function getRegistroId()
    {
        return $this->registroId;
    }

    /**
     * Set fechDeEntrega
     *
     * @param \DateTime $fechDeEntrega
     *
     * @return Planilla
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
     * @return Planilla
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
}
