<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * Empleado
 *
 * @ORM\Table(name="empleado")
 * @ORM\Entity
 */
class Empleado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contrasena", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $contrasena;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", precision=0, scale=0, nullable=false, unique=false)
     */
    private $salt;

    /**
     * @var integer
     *
     * @ORM\Column(name="dni", type="integer", precision=0, scale=0, nullable=false, unique=true)
     */
    private $dni;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=140, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=140, precision=0, scale=0, nullable=false, unique=false)
     */
    private $apellido;

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
     * @var \Application\Entity\Sector
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Sector", inversedBy="empleados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sector_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $sector;


    /*

    Al crear el usuario tengo que hashear la pwd
    
    $usuario = new Usuario();
    $passwordHasheada = $usuario->hashPassword($data['password']);
    $usuario->setPassword($passwordHasheada);
    $em->persist($usuario);
    $em->flush(); 
    
    */


    public function __construct()
    {
        $this->salt = sha1(mt_rand());
        $this->fechaAlta = new DateTime();  
        $this->activo = true;       
    }

    public function hashPassword($password)
    {
        $hash = crypt($password, '$5$rounds=1000$' . $this->salt .'$');        
        return $hash;
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
     * Set email
     *
     * @param string $email
     *
     * @return Empleado
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contrasena
     *
     * @param string $contrasena
     *
     * @return Empleado
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;

        return $this;
    }

    /**
     * Get contrasena
     *
     * @return string
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * Set salt
     *
     * @param string $salt
     *
     * @return Empleado
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string
     */
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Set dni
     *
     * @param integer $dni
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
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Empleado
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
