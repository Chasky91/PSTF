<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM; 
use DateTime;

/** @ORM\Entity */
class Sanidad
{

	/**
    * @ORM\Column(type="integer")
    * @ORM\GeneratedValue
    * @ORM\Id
    */  
    protected $idSanidad; 
   

	/**
    * @ORM\OneToOne(targetEntity="Beneficiario")
    * @ORM\JoinColumn(name="idben", referencedColumnName="idBeneficiario")
    */
     private $beneficiario;   

   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $cobertura;

    /** @ORM\Column(type="string", nullable=true)**/
    protected $obraS;

    /** @ORM\Column(type="string", nullable=true)**/
    protected $famOS;
   
   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $atenHC;

   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $otroCS;

    /** @ORM\Column(type="string", nullable=true)**/
    protected $nomCS;
    
   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $discapacidad;
    /** @ORM\Column(type="string", nullable=true)**/
    protected $famDisc;
    /** @ORM\Column(type="string", nullable=true)**/
    protected $tipo;

   /**   
   * @ORM\Column(type="boolean", nullable=true)   
   */ 
    protected $certificado;

    /** @ORM\Column(type="text", nullable=true)**/
    protected $detalles;
    /** @ORM\Column(type="text", nullable=true)**/
    protected $observacion;




   

    /**
     * Get idSanidad
     *
     * @return integer
     */
    public function getIdSanidad()
    {
        return $this->idSanidad;
    }

    /**
     * Set obraS
     *
     * @param string $obraS
     *
     * @return Sanidad
     */
    public function setObraS($obraS)
    {
        $this->obraS = $obraS;

        return $this;
    }

    /**
     * Get obraS
     *
     * @return string
     */
    public function getObraS()
    {
        return $this->obraS;
    }

    /**
     * Set famOS
     *
     * @param string $famOS
     *
     * @return Sanidad
     */
    public function setFamOS($famOS)
    {
        $this->famOS = $famOS;

        return $this;
    }

    /**
     * Get famOS
     *
     * @return string
     */
    public function getFamOS()
    {
        return $this->famOS;
    }

    /**
     * Set nomCS
     *
     * @param string $nomCS
     *
     * @return Sanidad
     */
    public function setNomCS($nomCS)
    {
        $this->nomCS = $nomCS;

        return $this;
    }

    /**
     * Get nomCS
     *
     * @return string
     */
    public function getNomCS()
    {
        return $this->nomCS;
    }

    /**
     * Set famDisc
     *
     * @param string $famDisc
     *
     * @return Sanidad
     */
    public function setFamDisc($famDisc)
    {
        $this->famDisc = $famDisc;

        return $this;
    }

    /**
     * Get famDisc
     *
     * @return string
     */
    public function getFamDisc()
    {
        return $this->famDisc;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Sanidad
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
     * Set detalles
     *
     * @param string $detalles
     *
     * @return Sanidad
     */
    public function setDetalles($detalles)
    {
        $this->detalles = $detalles;

        return $this;
    }

    /**
     * Get detalles
     *
     * @return string
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     *
     * @return Sanidad
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set beneficiario
     *
     * @param \Application\Entity\Beneficiario $beneficiario
     *
     * @return Sanidad
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

    /**
     * Set cobertura
     *
     * @param boolean $cobertura
     *
     * @return Sanidad
     */
    public function setCobertura($cobertura)
    {
        $this->cobertura = $cobertura;

        return $this;
    }

    /**
     * Get cobertura
     *
     * @return boolean
     */
    public function getCobertura()
    {
        return $this->cobertura;
    }

    /**
     * Set atenHC
     *
     * @param boolean $atenHC
     *
     * @return Sanidad
     */
    public function setAtenHC($atenHC)
    {
        $this->atenHC = $atenHC;

        return $this;
    }

    /**
     * Get atenHC
     *
     * @return boolean
     */
    public function getAtenHC()
    {
        return $this->atenHC;
    }

    /**
     * Set otroCS
     *
     * @param boolean $otroCS
     *
     * @return Sanidad
     */
    public function setOtroCS($otroCS)
    {
        $this->otroCS = $otroCS;

        return $this;
    }

    /**
     * Get otroCS
     *
     * @return boolean
     */
    public function getOtroCS()
    {
        return $this->otroCS;
    }

    /**
     * Set discapacidad
     *
     * @param boolean $discapacidad
     *
     * @return Sanidad
     */
    public function setDiscapacidad($discapacidad)
    {
        $this->discapacidad = $discapacidad;

        return $this;
    }

    /**
     * Get discapacidad
     *
     * @return boolean
     */
    public function getDiscapacidad()
    {
        return $this->discapacidad;
    }

    /**
     * Set certificado
     *
     * @param boolean $certificado
     *
     * @return Sanidad
     */
    public function setCertificado($certificado)
    {
        $this->certificado = $certificado;

        return $this;
    }

    /**
     * Get certificado
     *
     * @return boolean
     */
    public function getCertificado()
    {
        return $this->certificado;
    }
}
