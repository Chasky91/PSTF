<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\Common\Collections\Collection;
use DateTime;

/** @ORM\Entity */
class EstadoCivil
{
	/**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */
   
    protected $idEstado; //TENGO  CLAVES PRIMARIAS, idEstado 

    /** @ORM\Column(type="text", nullable=true) */
	protected $descripcion;
    /**
    * @ORM\OneToMany(targetEntity="Beneficiario", mappedBy="estadocivil")
    **/
    protected $idBeneficiario;

    /**
    * @ORM\OnetoMany(targetEntity="Familia", mappedBy="nroF")
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
     * Get idEstado
     *
     * @return integer
     */
    public function getIdEstado()
    {
        return $this->idEstado;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return EstadoCivil
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
     * @return EstadoCivil
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
     * @return EstadoCivil
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
