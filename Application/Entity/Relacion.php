<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relacion
 *
 * @ORM\Table(name="Relacion")
 * @ORM\Entity
 */
class Relacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idRelacion", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idRelacion;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $descripcion;

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
        $this->nroF = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idRelacion
     *
     * @return integer
     */
    public function getIdRelacion()
    {
        return $this->idRelacion;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Relacion
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
     * Add nroF
     *
     * @param \Application\Entity\Familia $nroF
     *
     * @return Relacion
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

