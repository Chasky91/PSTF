<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use DateTime;



/** @ORM\Entity */
Class Familia {

/**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */  
    protected $nroF; //TENGO DOS CLAVES PRIMARIAS, idPaciente y dni   
 
    /** @ORM\Column(type="string", nullable=false) */
    protected $dni;

    /** @ORM\Column(type="string", nullable=true)*/
    protected $nombre;

    /** @ORM\Column(type="string", nullable=true)*/
    protected $apellido; 
    /** @ORM\Column(type="string", nullable=true)*/
    protected $lugnac;
    /** @ORM\Column (type="datetime") */
    protected $fechanac;
   
    /**
    * @ORM\ManyToOne(targetEntity="EstadoCivil", inversedBy="nroF")
    * @ORM\JoinColumn(name="idEstcivil", referencedColumnName="idEstado")
    **/
    protected $estadocivil;

     /**
    * @ORM\ManyToOne(targetEntity="Educacion", inversedBy="nroF")
    * @ORM\JoinColumn(name="idEd", referencedColumnName="idEducacion")
    **/
    protected $educacion;

    /**
    * @ORM\ManyToOne(targetEntity="Profesion", inversedBy="nroF")
    * @ORM\JoinColumn(name="idprof", referencedColumnName="idProfesion")
    **/
    protected $profession;

    /**
    * @ORM\ManyToOne(targetEntity="Relacion", inversedBy="nroF")
    * @ORM\JoinColumn(name="idrel", referencedColumnName="idRelacion")
    **/
    protected $relacion;

    /**
    * @ORM\ManyToOne(targetEntity="Beneficiario", inversedBy="nroF")
    * @ORM\JoinColumn(name="idben", referencedColumnName="idBeneficiario")
    **/
    protected $idben;








    /**
     * Get nroF
     *
     * @return integer
     */
    public function getNroF()
    {
        return $this->nroF;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Familia
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
     * @return Familia
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
     * @return Familia
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
     * Set lugnac
     *
     * @param string $lugnac
     *
     * @return Familia
     */
    public function setLugnac($lugnac)
    {
        $this->lugnac = $lugnac;

        return $this;
    }

    /**
     * Get lugnac
     *
     * @return string
     */
    public function getLugnac()
    {
        return $this->lugnac;
    }

    /**
     * Set fechanac
     *
     * @param \DateTime $fechanac
     *
     * @return Familia
     */
    public function setFechanac($fechanac)
    {
        $this->fechanac = $fechanac;

        return $this;
    }

    /**
     * Get fechanac
     *
     * @return \DateTime
     */
    public function getFechanac()
    {
        return $this->fechanac;
    }

    /**
     * Set estadocivil
     *
     * @param \Application\Entity\EstadoCivil $estadocivil
     *
     * @return Familia
     */
    public function setEstadocivil(\Application\Entity\EstadoCivil $estadocivil = null)
    {
        $this->estadocivil = $estadocivil;

        return $this;
    }

    /**
     * Get estadocivil
     *
     * @return \Application\Entity\EstadoCivil
     */
    public function getEstadocivil()
    {
        return $this->estadocivil;
    }

    /**
     * Set educacion
     *
     * @param \Application\Entity\Educacion $educacion
     *
     * @return Familia
     */
    public function setEducacion(\Application\Entity\Educacion $educacion = null)
    {
        $this->educacion = $educacion;

        return $this;
    }

    /**
     * Get educacion
     *
     * @return \Application\Entity\Educacion
     */
    public function getEducacion()
    {
        return $this->educacion;
    }

    /**
     * Set profession
     *
     * @param \Application\Entity\Profesion $profession
     *
     * @return Familia
     */
    public function setProfession(\Application\Entity\Profesion $profession = null)
    {
        $this->profession = $profession;

        return $this;
    }

    /**
     * Get profession
     *
     * @return \Application\Entity\Profesion
     */
    public function getProfession()
    {
        return $this->profession;
    }

    /**
     * Set relacion
     *
     * @param \Application\Entity\Relacion $relacion
     *
     * @return Familia
     */
    public function setRelacion(\Application\Entity\Relacion $relacion = null)
    {
        $this->relacion = $relacion;

        return $this;
    }

    /**
     * Get relacion
     *
     * @return \Application\Entity\Relacion
     */
    public function getRelacion()
    {
        return $this->relacion;
    }

    /**
     * Set idben
     *
     * @param \Application\Entity\Beneficiario $idben
     *
     * @return Familia
     */
    public function setIdben(\Application\Entity\Beneficiario $idben = null)
    {
        $this->idben = $idben;

        return $this;
    }

    /**
     * Get idben
     *
     * @return \Application\Entity\Beneficiario
     */
    public function getIdben()
    {
        return $this->idben;
    }
}
