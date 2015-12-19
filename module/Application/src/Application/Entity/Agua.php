<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\Common\Collections\Collection;
use DateTime;

/** @ORM\Entity */
class Agua
{
	/**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */
   
    protected $idAgua; //TENGO  CLAVES PRIMARIAS, idEstado 

    /** @ORM\Column(type="text", nullable=true) */
	protected $descripcion;
    /**
    * @ORM\OneToMany(targetEntity="Vivienda", mappedBy="obtenida")
    **/
    protected $idV;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idV = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idAgua
     *
     * @return integer
     */
    public function getIdAgua()
    {
        return $this->idAgua;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Agua
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
     * @return Agua
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
