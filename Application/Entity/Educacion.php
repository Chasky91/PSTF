<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Educacion
 *
 * @ORM\Table(name="Educacion")
 * @ORM\Entity
 */
class Educacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idEducacion", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEducacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Beneficiario", mappedBy="idBeneficiario")
     */
    private $idBeneficiario;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Familia", mappedBy="nroF")
     */
    private $nroF;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idBeneficiario = new \Doctrine\Common\Collections\ArrayCollection();
        $this->nroF = new \Doctrine\Common\Collections\ArrayCollection();
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

