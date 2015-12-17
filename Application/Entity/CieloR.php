<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CieloR
 *
 * @ORM\Table(name="CieloR")
 * @ORM\Entity
 */
class CieloR
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idCieloR", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCieloR;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $descripcion;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Vivienda", mappedBy="idVivienda")
     */
    private $idV;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idV = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idCieloR
     *
     * @return integer
     */
    public function getIdCieloR()
    {
        return $this->idCieloR;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return CieloR
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
     * Add idV
     *
     * @param \Application\Entity\Vivienda $idV
     *
     * @return CieloR
     */
    public function addIdV(\Application\Entity\Vivienda $idV)
    {
        $this->idV[] = $idV;

        return $this;
    }

    /**
     * Remove idV
     *
     * @param \Application\Entity\Vivienda $idV
     */
    public function removeIdV(\Application\Entity\Vivienda $idV)
    {
        $this->idV->removeElement($idV);
    }

    /**
     * Get idV
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIdV()
    {
        return $this->idV;
    }
}

