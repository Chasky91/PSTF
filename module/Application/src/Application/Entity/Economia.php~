<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use Doctrine\Common\Collections\ArrayCollection;
//use Doctrine\Common\Collections\Collection;
use DateTime;

/** @ORM\Entity */
class Economia
{
	/**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */  
    protected $idEconomia; 
   

	/**
    * @ORM\OneToOne(targetEntity="Beneficiario")
    * @ORM\JoinColumn(name="idben", referencedColumnName="idBeneficiario")
    */
     private $beneficiario;   

   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $trabajo;

    /** @ORM\Column(type="string", nullable=true)**/
    protected $nomTrab;

   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $ingreso;

    /** @ORM\Column(type="string", nullable=true)**/
    protected $canIng;
   
    /** @ORM\Column(type="string", nullable=true)**/
    protected $tiempoIng;
    /** @ORM\Column(type="text", nullable=true)**/
    protected $obser1;
   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $ayuda;

    /** @ORM\Column(type="string", nullable=true)**/
    protected $tipo;
    /** @ORM\Column(type="string", nullable=true)**/
    protected $canAyuda;
   
    /** @ORM\Column(type="string", nullable=true)**/
    protected $tiempoA;
    /** @ORM\Column(type="text", nullable=true)**/
    protected $obser2;    
    /** @ORM\Column(type="text", nullable=true)**/
    protected $obser3;  


    /**
     * Get idEconomia
     *
     * @return integer
     */
    public function getIdEconomia()
    {
        return $this->idEconomia;
    }

    /**
     * Set trabajo
     *
     * @param boolean $trabajo
     *
     * @return Economia
     */
    public function setTrabajo($trabajo)
    {
        $this->trabajo = $trabajo;

        return $this;
    }

    /**
     * Get trabajo
     *
     * @return boolean
     */
    public function getTrabajo()
    {
        return $this->trabajo;
    }

    /**
     * Set nomTrab
     *
     * @param string $nomTrab
     *
     * @return Economia
     */
    public function setNomTrab($nomTrab)
    {
        $this->nomTrab = $nomTrab;

        return $this;
    }

    /**
     * Get nomTrab
     *
     * @return string
     */
    public function getNomTrab()
    {
        return $this->nomTrab;
    }

    /**
     * Set ingreso
     *
     * @param boolean $ingreso
     *
     * @return Economia
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return boolean
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set canIng
     *
     * @param string $canIng
     *
     * @return Economia
     */
    public function setCanIng($canIng)
    {
        $this->canIng = $canIng;

        return $this;
    }

    /**
     * Get canIng
     *
     * @return string
     */
    public function getCanIng()
    {
        return $this->canIng;
    }

    /**
     * Set tiempoIng
     *
     * @param string $tiempoIng
     *
     * @return Economia
     */
    public function setTiempoIng($tiempoIng)
    {
        $this->tiempoIng = $tiempoIng;

        return $this;
    }

    /**
     * Get tiempoIng
     *
     * @return string
     */
    public function getTiempoIng()
    {
        return $this->tiempoIng;
    }

    /**
     * Set obser1
     *
     * @param string $obser1
     *
     * @return Economia
     */
    public function setObser1($obser1)
    {
        $this->obser1 = $obser1;

        return $this;
    }

    /**
     * Get obser1
     *
     * @return string
     */
    public function getObser1()
    {
        return $this->obser1;
    }

    /**
     * Set ayuda
     *
     * @param boolean $ayuda
     *
     * @return Economia
     */
    public function setAyuda($ayuda)
    {
        $this->ayuda = $ayuda;

        return $this;
    }

    /**
     * Get ayuda
     *
     * @return boolean
     */
    public function getAyuda()
    {
        return $this->ayuda;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Economia
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set canAyuda
     *
     * @param string $canAyuda
     *
     * @return Economia
     */
    public function setCanAyuda($canAyuda)
    {
        $this->canAyuda = $canAyuda;

        return $this;
    }

    /**
     * Get canAyuda
     *
     * @return string
     */
    public function getCanAyuda()
    {
        return $this->canAyuda;
    }

    /**
     * Set tiempoA
     *
     * @param string $tiempoA
     *
     * @return Economia
     */
    public function setTiempoA($tiempoA)
    {
        $this->tiempoA = $tiempoA;

        return $this;
    }

    /**
     * Get tiempoA
     *
     * @return string
     */
    public function getTiempoA()
    {
        return $this->tiempoA;
    }

    /**
     * Set obser2
     *
     * @param string $obser2
     *
     * @return Economia
     */
    public function setObser2($obser2)
    {
        $this->obser2 = $obser2;

        return $this;
    }

    /**
     * Get obser2
     *
     * @return string
     */
    public function getObser2()
    {
        return $this->obser2;
    }

    /**
     * Set obser3
     *
     * @param string $obser3
     *
     * @return Economia
     */
    public function setObser3($obser3)
    {
        $this->obser3 = $obser3;

        return $this;
    }

    /**
     * Get obser3
     *
     * @return string
     */
    public function getObser3()
    {
        return $this->obser3;
    }

    /**
     * Set beneficiario
     *
     * @param \Application\Entity\Beneficiario $beneficiario
     *
     * @return Economia
     */
    public function setBeneficiario(\Application\Entity\Beneficiario $beneficiario = null)
    {
        $this->beneficiario = $beneficiario;

        return $this;
    }

    /**
     * Get beneficiario
     *
     * @return \Application\Entity\Beneficiario
     */
    public function getBeneficiario()
    {
        return $this->beneficiario;
    }
}
