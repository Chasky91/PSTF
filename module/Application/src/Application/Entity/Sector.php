<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="Sector")
 */
class Sector
{
     /**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */
    protected $id;
    /** @ORM\Column */
    protected $nombre;
    /**
    * @ORM\OneToMany(targetEntity="Empleado", mappedBy="sector")
    **/	
    protected $empleados;
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
