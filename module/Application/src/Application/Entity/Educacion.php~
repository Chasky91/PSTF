<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\Common\Collections\Collection;
use DateTime;

/** @ORM\Entity */
class Educacion
{
	/**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */
   
    protected $idEducacion; //TENGO  CLAVES PRIMARIAS, idEstado 

    /** @ORM\Column(type="text", nullable=true) */
	protected $descripcion;
    /**
    * @ORM\OnetoMany(targetEntity="Beneficiario", mappedBy="educacion")
    **/
    protected $idBeneficiario;

    /**
    * @ORM\OnetoMany(targetEntity="Familia", mappedBy="educacion")
    **/
    protected $nroF;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idBeneficiario = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idEducacion
     *
     * @return integer
     */
    public function getIdEducacion()
    {
        return $this->idEducacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Educacion
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
     * Add idBeneficiario
     *
     * @param \Application\Entity\Beneficiario $idBeneficiario
     *
     * @return Educacion
     */
    public function addIdBeneficiario(\Application\Entity\Beneficiario $idBeneficiario)
    {
        $this->idBeneficiario[] = $idBeneficiario;

        return $this;
    }

    /**
     * Remove idBeneficiario
     *
     * @param \Application\Entity\Beneficiario $idBeneficiario
     */
    public function removeIdBeneficiario(\Application\Entity\Beneficiario $idBeneficiario)
    {
        $this->idBeneficiario->removeElement($idBeneficiario);
    }

    /**
     * Get idBeneficiario
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdBeneficiario()
    {
        return $this->idBeneficiario;
    }

    /**
     * Add nroF
     *
     * @param \Application\Entity\Familia $nroF
     *
     * @return Educacion
     */
    public function addNroF(\Application\Entity\Familia $nroF)
    {
        $this->nroF[] = $nroF;

        return $this;
    }

    /**
     * Remove nroF
     *
     * @param \Application\Entity\Familia $nroF
     */
    public function removeNroF(\Application\Entity\Familia $nroF)
    {
        $this->nroF->removeElement($nroF);
    }

    /**
     * Get nroF
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNroF()
    {
        return $this->nroF;
    }
}
