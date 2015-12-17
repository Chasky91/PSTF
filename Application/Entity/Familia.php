<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Familia
 *
 * @ORM\Table(name="Familia")
 * @ORM\Entity
 */
class Familia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="nroF", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $nroF;

    /**
     * @var string
     *
     * @ORM\Column(name="dni", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $apellido;

    /**
     * @var string
     *
     * @ORM\Column(name="lugnac", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $lugnac;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechanac", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fechanac;

    /**
     * @var \Application\Entity\EstadoCivil
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EstadoCivil", inversedBy="nroF")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEstcivil", referencedColumnName="idEstado", nullable=true)
     * })
     */
    private $estadocivil;

    /**
     * @var \Application\Entity\Educacion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Educacion", inversedBy="nroF")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEd", referencedColumnName="idEducacion", nullable=true)
     * })
     */
    private $educacion;

    /**
     * @var \Application\Entity\Profesion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Profesion", inversedBy="nroF")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprof", referencedColumnName="idProfesion", nullable=true)
     * })
     */
    private $profession;

    /**
     * @var \Application\Entity\Relacion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Relacion", inversedBy="nroF")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idrel", referencedColumnName="idRelacion", nullable=true)
     * })
     */
    private $relacion;

    /**
     * @var \Application\Entity\Beneficiario
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Beneficiario", inversedBy="nroF")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idben", referencedColumnName="idBeneficiario", nullable=true)
     * })
     */
    private $idben;


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

