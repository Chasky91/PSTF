<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/** 
*
*@ORM\Entity 
*@ORM\Table(name="empleado")
*/

class Empleado
{
    /**
     * @ORM\Column(type="integer",unique=true)
     * @ORM\GeneratedValue
     * @ORM\Id
     */   
    protected $id;
    /** @ORM\Column(unique=true, type="integer") */
    protected $dni;
    /** @ORM\Column (length=140) */
    protected $nombre;
    /** @ORM\Column (length=140) */
    protected $apellido;
    /** @ORM\Column (type="datetime") */
    protected $fechaAlta;
    /**
    * @ORM\ManyToOne(targetEntity="Sector", inversedBy="empleados")
    * @ORM\JoinColumn(name="sector_id", referencedColumnName="id")
    **/
    protected $sector;
    
    public function __construct() {
   
        $this->fechaAlta = new DateTime();
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
     * Set dni
     *
     * @param string $dni
     *
     * @return Empleado
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Empleado
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
     * Set apellido
     *
     * @param string $apellido
     *
     * @return Empleado
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;

        return $this;
    }

    /**
     * Get apellido
     *
     * @return string
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Empleado
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;

        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
    }

    /**
     * Set sector
     *
     * @param \Application\Entity\Sector $sector
     *
     * @return Empleado
     */
    public function setSector(\Application\Entity\Sector $sector = null)
    {
        $this->sector = $sector;

        return $this;
    }

    /**
     * Get sector
     *
     * @return \Application\Entity\Sector
     */
    public function getSector()
    {
        return $this->sector;
    }
}
