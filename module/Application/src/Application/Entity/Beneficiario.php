<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use DateTime;

//En teoria esto es para la herencia y que me crea otra tabla aparte


/** @ORM\Entity */
class Beneficiario
{
    /**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */  
    protected $idBeneficiario; //TENGO DOS CLAVES PRIMARIAS, idPaciente y dni   

    /** @ORM\Column(type="bigint", nullable=false, unique=true) */
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
    * @ORM\ManyToOne(targetEntity="EstadoCivil", inversedBy="idBeneficiario")
    * @ORM\JoinColumn(name="idEstcivil", referencedColumnName="idEstado")
    **/
    protected $estadocivil;

     /**
    * @ORM\ManyToOne(targetEntity="Educacion", inversedBy="idBeneficiario")
    * @ORM\JoinColumn(name="idEd", referencedColumnName="idEducacion")
    **/
    protected $educacion;

    /**
    * @ORM\ManyToOne(targetEntity="Profesion", inversedBy="idBeneficiario")
    * @ORM\JoinColumn(name="idprof", referencedColumnName="idProfesion")
    **/
    protected $profession;

    /** @ORM\Column(type="string", nullable=true)*/
    protected $domben; 
    /** @ORM\Column(type="string", nullable=true)*/
    protected $resben;
    /** @ORM\Column(type="bigint", nullable=true) */
    protected $telfben;



    /**
    * @ORM\OneToMany(targetEntity="Familia", mappedBy="idben")
    **/
    protected $fam;




    /** @ORM\Column(type="string", nullable=true)*/
    private $activo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaAlta", type="datetime", precision=0, scale=0, nullable=false, unique=false)
     */
    private $fechaAlta;



    public function __construct()
    {

        $this->fechaAlta = new DateTime();  
        $this->activo = 'Pendiente';       
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
     * @param string $activo
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
     * @return string
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
