<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vivienda
 *
 * @ORM\Table(name="Vivienda")
 * @ORM\Entity
 */
class Vivienda
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idVivienda", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVivienda;

    /**
     * @var string
     *
     * @ORM\Column(name="montAlq", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $montAlq;

    /**
     * @var string
     *
     * @ORM\Column(name="propAlq", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $propAlq;

    /**
     * @var string
     *
     * @ORM\Column(name="tiemAlq", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $tiemAlq;

    /**
     * @var string
     *
     * @ORM\Column(name="cedida", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cedida;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terrPropio", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $terrPropio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terrPago", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $terrPago;

    /**
     * @var boolean
     *
     * @ORM\Column(name="escritura", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $escritura;

    /**
     * @var string
     *
     * @ORM\Column(name="habitacion", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $habitacion;

    /**
     * @var string
     *
     * @ORM\Column(name="pieza", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $pieza;

    /**
     * @var boolean
     *
     * @ORM\Column(name="baño", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $baño;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dasague", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $dasague;

    /**
     * @var boolean
     *
     * @ORM\Column(name="boton", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $boton;

    /**
     * @var boolean
     *
     * @ORM\Column(name="uso", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $uso;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicacion", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $estado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cama", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cama;

    /**
     * @var string
     *
     * @ORM\Column(name="camcant", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $camcant;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mesa", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $mesa;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cocina", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $cocina;

    /**
     * @var boolean
     *
     * @ORM\Column(name="heladera", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $heladera;

    /**
     * @var string
     *
     * @ORM\Column(name="obser1", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $obser1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="luz", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $luz;

    /**
     * @var boolean
     *
     * @ORM\Column(name="agua", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $agua;

    /**
     * @var boolean
     *
     * @ORM\Column(name="gas", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $gas;

    /**
     * @var string
     *
     * @ORM\Column(name="obser2", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $obser2;

    /**
     * @var boolean
     *
     * @ORM\Column(name="auto", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $auto;

    /**
     * @var string
     *
     * @ORM\Column(name="modelo", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $modelo;

    /**
     * @var string
     *
     * @ORM\Column(name="año", type="string", precision=0, scale=0, nullable=true, unique=false)
     */
    private $año;

    /**
     * @var boolean
     *
     * @ORM\Column(name="otraPropiedad", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $otraPropiedad;

    /**
     * @var string
     *
     * @ORM\Column(name="detalleprop", type="text", precision=0, scale=0, nullable=true, unique=false)
     */
    private $detalleprop;

    /**
     * @var \Application\Entity\Beneficiario
     *
     * @ORM\OneToOne(targetEntity="Application\Entity\Beneficiario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idben", referencedColumnName="idBeneficiario", unique=true, nullable=true)
     * })
     */
    private $idben;

    /**
     * @var \Application\Entity\Tenencia
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Tenencia", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTen", referencedColumnName="idTenencia", nullable=true)
     * })
     */
    private $tenencia;

    /**
     * @var \Application\Entity\Desague
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Desague", inversedBy="idViv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDes", referencedColumnName="idDesague", nullable=true)
     * })
     */
    private $desagote;

    /**
     * @var \Application\Entity\Luz
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Luz", inversedBy="idViv")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idLuz", referencedColumnName="idLuz", nullable=true)
     * })
     */
    private $medio;

    /**
     * @var \Application\Entity\Agua
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Agua", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAg", referencedColumnName="idAgua", nullable=true)
     * })
     */
    private $obtenida;

    /**
     * @var \Application\Entity\AguaLug
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\AguaLug", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idAglg", referencedColumnName="idAguaLug", nullable=true)
     * })
     */
    private $proveniente;

    /**
     * @var \Application\Entity\Gas
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Gas", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idG", referencedColumnName="idGas", nullable=true)
     * })
     */
    private $utiliza;

    /**
     * @var \Application\Entity\Pared
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Pared", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idMuro", referencedColumnName="idPared", nullable=true)
     * })
     */
    private $pared;

    /**
     * @var \Application\Entity\Suelo
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Suelo", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idS", referencedColumnName="idSuelo", nullable=true)
     * })
     */
    private $piso;

    /**
     * @var \Application\Entity\Techo
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Techo", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idTec", referencedColumnName="idTecho", nullable=true)
     * })
     */
    private $techo;

    /**
     * @var \Application\Entity\CieloR
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\CieloR", inversedBy="idV")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idciel", referencedColumnName="idCieloR", nullable=true)
     * })
     */
    private $cielrazo;


    /**
     * Get idVivienda
     *
     * @return integer
     */
    public function getIdVivienda()
    {
        return $this->idVivienda;
    }

    /**
     * Set montAlq
     *
     * @param string $montAlq
     *
     * @return Vivienda
     */
    public function setMontAlq($montAlq)
    {
        $this->montAlq = $montAlq;

        return $this;
    }

    /**
     * Get montAlq
     *
     * @return string
     */
    public function getMontAlq()
    {
        return $this->montAlq;
    }

    /**
     * Set propAlq
     *
     * @param string $propAlq
     *
     * @return Vivienda
     */
    public function setPropAlq($propAlq)
    {
        $this->propAlq = $propAlq;

        return $this;
    }

    /**
     * Get propAlq
     *
     * @return string
     */
    public function getPropAlq()
    {
        return $this->propAlq;
    }

    /**
     * Set tiemAlq
     *
     * @param string $tiemAlq
     *
     * @return Vivienda
     */
    public function setTiemAlq($tiemAlq)
    {
        $this->tiemAlq = $tiemAlq;

        return $this;
    }

    /**
     * Get tiemAlq
     *
     * @return string
     */
    public function getTiemAlq()
    {
        return $this->tiemAlq;
    }

    /**
     * Set cedida
     *
     * @param string $cedida
     *
     * @return Vivienda
     */
    public function setCedida($cedida)
    {
        $this->cedida = $cedida;

        return $this;
    }

    /**
     * Get cedida
     *
     * @return string
     */
    public function getCedida()
    {
        return $this->cedida;
    }

    /**
     * Set terrPropio
     *
     * @param boolean $terrPropio
     *
     * @return Vivienda
     */
    public function setTerrPropio($terrPropio)
    {
        $this->terrPropio = $terrPropio;

        return $this;
    }

    /**
     * Get terrPropio
     *
     * @return boolean
     */
    public function getTerrPropio()
    {
        return $this->terrPropio;
    }

    /**
     * Set terrPago
     *
     * @param boolean $terrPago
     *
     * @return Vivienda
     */
    public function setTerrPago($terrPago)
    {
        $this->terrPago = $terrPago;

        return $this;
    }

    /**
     * Get terrPago
     *
     * @return boolean
     */
    public function getTerrPago()
    {
        return $this->terrPago;
    }

    /**
     * Set escritura
     *
     * @param boolean $escritura
     *
     * @return Vivienda
     */
    public function setEscritura($escritura)
    {
        $this->escritura = $escritura;

        return $this;
    }

    /**
     * Get escritura
     *
     * @return boolean
     */
    public function getEscritura()
    {
        return $this->escritura;
    }

    /**
     * Set habitacion
     *
     * @param string $habitacion
     *
     * @return Vivienda
     */
    public function setHabitacion($habitacion)
    {
        $this->habitacion = $habitacion;

        return $this;
    }

    /**
     * Get habitacion
     *
     * @return string
     */
    public function getHabitacion()
    {
        return $this->habitacion;
    }

    /**
     * Set pieza
     *
     * @param string $pieza
     *
     * @return Vivienda
     */
    public function setPieza($pieza)
    {
        $this->pieza = $pieza;

        return $this;
    }

    /**
     * Get pieza
     *
     * @return string
     */
    public function getPieza()
    {
        return $this->pieza;
    }

    /**
     * Set baño
     *
     * @param boolean $baño
     *
     * @return Vivienda
     */
    public function setBaño($baño)
    {
        $this->baño = $baño;

        return $this;
    }

    /**
     * Get baño
     *
     * @return boolean
     */
    public function getBaño()
    {
        return $this->baño;
    }

    /**
     * Set dasague
     *
     * @param boolean $dasague
     *
     * @return Vivienda
     */
    public function setDasague($dasague)
    {
        $this->dasague = $dasague;

        return $this;
    }

    /**
     * Get dasague
     *
     * @return boolean
     */
    public function getDasague()
    {
        return $this->dasague;
    }

    /**
     * Set boton
     *
     * @param boolean $boton
     *
     * @return Vivienda
     */
    public function setBoton($boton)
    {
        $this->boton = $boton;

        return $this;
    }

    /**
     * Get boton
     *
     * @return boolean
     */
    public function getBoton()
    {
        return $this->boton;
    }

    /**
     * Set uso
     *
     * @param boolean $uso
     *
     * @return Vivienda
     */
    public function setUso($uso)
    {
        $this->uso = $uso;

        return $this;
    }

    /**
     * Get uso
     *
     * @return boolean
     */
    public function getUso()
    {
        return $this->uso;
    }

    /**
     * Set ubicacion
     *
     * @param string $ubicacion
     *
     * @return Vivienda
     */
    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;

        return $this;
    }

    /**
     * Get ubicacion
     *
     * @return string
     */
    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    /**
     * Set estado
     *
     * @param string $estado
     *
     * @return Vivienda
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return string
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set cama
     *
     * @param boolean $cama
     *
     * @return Vivienda
     */
    public function setCama($cama)
    {
        $this->cama = $cama;

        return $this;
    }

    /**
     * Get cama
     *
     * @return boolean
     */
    public function getCama()
    {
        return $this->cama;
    }

    /**
     * Set camcant
     *
     * @param string $camcant
     *
     * @return Vivienda
     */
    public function setCamcant($camcant)
    {
        $this->camcant = $camcant;

        return $this;
    }

    /**
     * Get camcant
     *
     * @return string
     */
    public function getCamcant()
    {
        return $this->camcant;
    }

    /**
     * Set mesa
     *
     * @param boolean $mesa
     *
     * @return Vivienda
     */
    public function setMesa($mesa)
    {
        $this->mesa = $mesa;

        return $this;
    }

    /**
     * Get mesa
     *
     * @return boolean
     */
    public function getMesa()
    {
        return $this->mesa;
    }

    /**
     * Set cocina
     *
     * @param boolean $cocina
     *
     * @return Vivienda
     */
    public function setCocina($cocina)
    {
        $this->cocina = $cocina;

        return $this;
    }

    /**
     * Get cocina
     *
     * @return boolean
     */
    public function getCocina()
    {
        return $this->cocina;
    }

    /**
     * Set heladera
     *
     * @param boolean $heladera
     *
     * @return Vivienda
     */
    public function setHeladera($heladera)
    {
        $this->heladera = $heladera;

        return $this;
    }

    /**
     * Get heladera
     *
     * @return boolean
     */
    public function getHeladera()
    {
        return $this->heladera;
    }

    /**
     * Set obser1
     *
     * @param string $obser1
     *
     * @return Vivienda
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
     * Set luz
     *
     * @param boolean $luz
     *
     * @return Vivienda
     */
    public function setLuz($luz)
    {
        $this->luz = $luz;

        return $this;
    }

    /**
     * Get luz
     *
     * @return boolean
     */
    public function getLuz()
    {
        return $this->luz;
    }

    /**
     * Set agua
     *
     * @param boolean $agua
     *
     * @return Vivienda
     */
    public function setAgua($agua)
    {
        $this->agua = $agua;

        return $this;
    }

    /**
     * Get agua
     *
     * @return boolean
     */
    public function getAgua()
    {
        return $this->agua;
    }

    /**
     * Set gas
     *
     * @param boolean $gas
     *
     * @return Vivienda
     */
    public function setGas($gas)
    {
        $this->gas = $gas;

        return $this;
    }

    /**
     * Get gas
     *
     * @return boolean
     */
    public function getGas()
    {
        return $this->gas;
    }

    /**
     * Set obser2
     *
     * @param string $obser2
     *
     * @return Vivienda
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
     * Set auto
     *
     * @param boolean $auto
     *
     * @return Vivienda
     */
    public function setAuto($auto)
    {
        $this->auto = $auto;

        return $this;
    }

    /**
     * Get auto
     *
     * @return boolean
     */
    public function getAuto()
    {
        return $this->auto;
    }

    /**
     * Set modelo
     *
     * @param string $modelo
     *
     * @return Vivienda
     */
    public function setModelo($modelo)
    {
        $this->modelo = $modelo;

        return $this;
    }

    /**
     * Get modelo
     *
     * @return string
     */
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set año
     *
     * @param string $año
     *
     * @return Vivienda
     */
    public function setAño($año)
    {
        $this->año = $año;

        return $this;
    }

    /**
     * Get año
     *
     * @return string
     */
    public function getAño()
    {
        return $this->año;
    }

    /**
     * Set otraPropiedad
     *
     * @param boolean $otraPropiedad
     *
     * @return Vivienda
     */
    public function setOtraPropiedad($otraPropiedad)
    {
        $this->otraPropiedad = $otraPropiedad;

        return $this;
    }

    /**
     * Get otraPropiedad
     *
     * @return boolean
     */
    public function getOtraPropiedad()
    {
        return $this->otraPropiedad;
    }

    /**
     * Set detalleprop
     *
     * @param string $detalleprop
     *
     * @return Vivienda
     */
    public function setDetalleprop($detalleprop)
    {
        $this->detalleprop = $detalleprop;

        return $this;
    }

    /**
     * Get detalleprop
     *
     * @return string
     */
    public function getDetalleprop()
    {
        return $this->detalleprop;
    }

    /**
     * Set idben
     *
     * @param \Application\Entity\Beneficiario $idben
     *
     * @return Vivienda
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

    /**
     * Set tenencia
     *
     * @param \Application\Entity\Tenencia $tenencia
     *
     * @return Vivienda
     */
    public function setTenencia(\Application\Entity\Tenencia $tenencia = null)
    {
        $this->tenencia = $tenencia;

        return $this;
    }

    /**
     * Get tenencia
     *
     * @return \Application\Entity\Tenencia
     */
    public function getTenencia()
    {
        return $this->tenencia;
    }

    /**
     * Set desagote
     *
     * @param \Application\Entity\Desague $desagote
     *
     * @return Vivienda
     */
    public function setDesagote(\Application\Entity\Desague $desagote = null)
    {
        $this->desagote = $desagote;

        return $this;
    }

    /**
     * Get desagote
     *
     * @return \Application\Entity\Desague
     */
    public function getDesagote()
    {
        return $this->desagote;
    }

    /**
     * Set medio
     *
     * @param \Application\Entity\Luz $medio
     *
     * @return Vivienda
     */
    public function setMedio(\Application\Entity\Luz $medio = null)
    {
        $this->medio = $medio;

        return $this;
    }

    /**
     * Get medio
     *
     * @return \Application\Entity\Luz
     */
    public function getMedio()
    {
        return $this->medio;
    }

    /**
     * Set obtenida
     *
     * @param \Application\Entity\Agua $obtenida
     *
     * @return Vivienda
     */
    public function setObtenida(\Application\Entity\Agua $obtenida = null)
    {
        $this->obtenida = $obtenida;

        return $this;
    }

    /**
     * Get obtenida
     *
     * @return \Application\Entity\Agua
     */
    public function getObtenida()
    {
        return $this->obtenida;
    }

    /**
     * Set proveniente
     *
     * @param \Application\Entity\AguaLug $proveniente
     *
     * @return Vivienda
     */
    public function setProveniente(\Application\Entity\AguaLug $proveniente = null)
    {
        $this->proveniente = $proveniente;

        return $this;
    }

    /**
     * Get proveniente
     *
     * @return \Application\Entity\AguaLug
     */
    public function getProveniente()
    {
        return $this->proveniente;
    }

    /**
     * Set utiliza
     *
     * @param \Application\Entity\Gas $utiliza
     *
     * @return Vivienda
     */
    public function setUtiliza(\Application\Entity\Gas $utiliza = null)
    {
        $this->utiliza = $utiliza;

        return $this;
    }

    /**
     * Get utiliza
     *
     * @return \Application\Entity\Gas
     */
    public function getUtiliza()
    {
        return $this->utiliza;
    }

    /**
     * Set pared
     *
     * @param \Application\Entity\Pared $pared
     *
     * @return Vivienda
     */
    public function setPared(\Application\Entity\Pared $pared = null)
    {
        $this->pared = $pared;

        return $this;
    }

    /**
     * Get pared
     *
     * @return \Application\Entity\Pared
     */
    public function getPared()
    {
        return $this->pared;
    }

    /**
     * Set piso
     *
     * @param \Application\Entity\Suelo $piso
     *
     * @return Vivienda
     */
    public function setPiso(\Application\Entity\Suelo $piso = null)
    {
        $this->piso = $piso;

        return $this;
    }

    /**
     * Get piso
     *
     * @return \Application\Entity\Suelo
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * Set techo
     *
     * @param \Application\Entity\Techo $techo
     *
     * @return Vivienda
     */
    public function setTecho(\Application\Entity\Techo $techo = null)
    {
        $this->techo = $techo;

        return $this;
    }

    /**
     * Get techo
     *
     * @return \Application\Entity\Techo
     */
    public function getTecho()
    {
        return $this->techo;
    }

    /**
     * Set cielrazo
     *
     * @param \Application\Entity\CieloR $cielrazo
     *
     * @return Vivienda
     */
    public function setCielrazo(\Application\Entity\CieloR $cielrazo = null)
    {
        $this->cielrazo = $cielrazo;

        return $this;
    }

    /**
     * Get cielrazo
     *
     * @return \Application\Entity\CieloR
     */
    public function getCielrazo()
    {
        return $this->cielrazo;
    }
}

