<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sanidad
 *
 * @ORM\Table(name="Sanidad")
 * @ORM\Entity
 */
class Sanidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idSanidad", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSanidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cobertura", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cobertura;

    /**
     * @var string
     *
     * @ORM\Column(name="obraS", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $obraS;

    /**
     * @var string
     *
     * @ORM\Column(name="famOS", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $famOS;

    /**
     * @var boolean
     *
     * @ORM\Column(name="atenHC", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $atenHC;

    /**
     * @var boolean
     *
     * @ORM\Column(name="otroCS", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $otroCS;

    /**
     * @var string
     *
     * @ORM\Column(name="nomCS", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $nomCS;

    /**
     * @var boolean
     *
     * @ORM\Column(name="discapacidad", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $discapacidad;

    /**
     * @var string
     *
     * @ORM\Column(name="famDisc", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $famDisc;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $tipo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="certificado", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $certificado;

    /**
     * @var string
     *
     * @ORM\Column(name="detalles", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $detalles;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $observacion;

    /**
     * @var \Application\Entity\Beneficiario
     *
     * @ORM\OneToOne(targetEntity="Application\Entity\Beneficiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idben", referencedColumnName="idBeneficiario", unique=true, nullable=true)
     * })
     */
    private $beneficiario;


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
}

