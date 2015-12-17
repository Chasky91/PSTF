<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Beneficiario
 *
 * @ORM\Table(name="Beneficiario")
 * @ORM\Entity
 */
class Beneficiario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idBeneficiario", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idBeneficiario;

    /**
     * @var integer
     *
     * @ORM\Column(name="dni", type="bigint", precision=0, scale=0, nullable=false, unique=true)
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
     * @var string
     *
     * @ORM\Column(name="domben", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $domben;

    /**
     * @var string
     *
     * @ORM\Column(name="resben", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $resben;

    /**
     * @var integer
     *
     * @ORM\Column(name="telfben", type="bigint", precision=0, scale=0, nullable=true, unique=false)
     */
    private $telfben;

    /**
     * @var boolean
     *
     * @ORM\Column(name="activo", type="boolean", precision=0, scale=0, nullable=false, unique=false)
     */
    private $activo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fechaAlta;

    /**
     * @var \Application\Entity\EstadoCivil
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\EstadoCivil", inversedBy="idBeneficiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEstcivil", referencedColumnName="idEstado", nullable=true)
     * })
     */
    private $estadocivil;

    /**
     * @var \Application\Entity\Educacion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Educacion", inversedBy="idBeneficiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEd", referencedColumnName="idEducacion", nullable=true)
     * })
     */
    private $educacion;

    /**
     * @var \Application\Entity\Profesion
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Profesion", inversedBy="idBeneficiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprof", referencedColumnName="idProfesion", nullable=true)
     * })
     */
    private $profession;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="Application\Entity\Familia", mappedBy="nroF")
     */
    private $fam;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->fam = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get idBeneficiario
     *
     * @return integer
     */
    public function getIdBeneficiario()
    {
        return $this->idBeneficiario;
    }

    /**
     * Set dni
     *
     * @param integer $dni
     *
     * @return Beneficiario
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return integer
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * Set domben
     *
     * @param string $domben
     *
     * @return Beneficiario
     */
    public function setDomben($domben)
    {
        $this->domben = $domben;

        return $this;
    }

    /**
     * Get domben
     *
     * @return string
     */
    public function getDomben()
    {
        return $this->domben;
    }

    /**
     * Set resben
     *
     * @param string $resben
     *
     * @return Beneficiario
     */
    public function setResben($resben)
    {
        $this->resben = $resben;

        return $this;
    }

    /**
     * Get resben
     *
     * @return string
     */
    public function getResben()
    {
        return $this->resben;
    }

    /**
     * Set telfben
     *
     * @param integer $telfben
     *
     * @return Beneficiario
     */
    public function setTelfben($telfben)
    {
        $this->telfben = $telfben;

        return $this;
    }

    /**
     * Get telfben
     *
     * @return integer
     */
    public function getTelfben()
    {
        return $this->telfben;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Beneficiario
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     *
     * @return Beneficiario
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
     * Set estadocivil
     *
     * @param \Application\Entity\EstadoCivil $estadocivil
     *
     * @return Beneficiario
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
     * @return Beneficiario
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
     * @return Beneficiario
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
     * Add fam
     *
     * @param \Application\Entity\Familia $fam
     *
     * @return Beneficiario
     */
    public function addFam(\Application\Entity\Familia $fam)
    {
        $this->fam[] = $fam;

        return $this;
    }

    /**
     * Remove fam
     *
     * @param \Application\Entity\Familia $fam
     */
    public function removeFam(\Application\Entity\Familia $fam)
    {
        $this->fam->removeElement($fam);
    }

    /**
     * Get fam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFam()
    {
        return $this->fam;
    }
}

