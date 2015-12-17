<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sector
 *
 * @ORM\Table(name="sector")
 * @ORM\Entity
 */
class Sector
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Empleado", mappedBy="sector")
     */
    private $empleados;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->empleados = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Sector
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add empleado
     *
     * @param \Application\Entity\Empleado $empleado
     *
     * @return Sector
     */
    public function addEmpleado(\Application\Entity\Empleado $empleado)
    {
        $this->empleados[] = $empleado;

        return $this;
    }

    /**
     * Remove empleado
     *
     * @param \Application\Entity\Empleado $empleado
     */
    public function removeEmpleado(\Application\Entity\Empleado $empleado)
    {
        $this->empleados->removeElement($empleado);
    }

    /**
     * Get empleados
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmpleados()
    {
        return $this->empleados;
    }
}

