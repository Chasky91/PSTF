<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\OneToOne(targetEntity="AsistenciaMensual")
     * @ORM\JoinColumn(name="registroId", referencedColumnName="idRegistro",unique=FALSE)
     * @ORM\Id
     */
    protected $registroId;

    /**
     * Set idPlanilla
     *
     * @param \Application\Entity\Beneficiario $idPlanilla
     *
     * @return Planilla
     */
    public function setIdPlanilla(\Application\Entity\Beneficiario $idPlanilla) {
        $this->idPlanilla = $idPlanilla;

        return $this;
    }

    /**
     * Get idPlanilla
     *
     * @return \Application\Entity\Beneficiario
     */
    public function getIdPlanilla() {
        return $this->idPlanilla;
    }

    /**
     * Set registroId
     *
     * @param \Application\Entity\AsistenciaMensual $registroId
     *
     * @return Planilla
     */
    public function setRegistroId(\Application\Entity\AsistenciaMensual $registroId) {
        $this->registroId = $registroId;

        return $this;
    }

    /**
     * Get registroId
     *
     * @return \Application\Entity\AsistenciaMensual
     */
    public function getRegistroId() {
        return $this->registroId;
    }

}
