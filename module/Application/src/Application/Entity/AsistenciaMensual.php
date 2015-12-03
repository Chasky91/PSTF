<?php 
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 */
class AsistenciaMensual
{
	/** @ORM\Column(type="integer", nullable=false)
	 *  @ORM\Id
	 */
	protected $idBenificiario;
	/** @ORM\Column(type="text", nullable=false) */
	protected $idModulo;
	/** @ORM\Column (type="datetime") */
	protected $fechDeEntrega;


    /**
     * Set idBenificiario
     *
     * @param integer $idBenificiario
     *
     * @return AsistenciaMensual
     */
    public function setIdBenificiario($idBenificiario)
    {
        $this->idBenificiario = $idBenificiario;

        return $this;
    }

    /**
     * Get idBenificiario
     *
     * @return integer
     */
    public function getIdBenificiario()
    {
        return $this->idBenificiario;
    }

    /**
     * Set idModulo
     *
     * @param \Text $idModulo
     *
     * @return AsistenciaMensual
     */
    public function setIdModulo(\Text $idModulo)
    {
        $this->idModulo = $idModulo;

        return $this;
    }

    /**
     * Get idModulo
     *
     * @return \Text
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * Set fechDeEntrega
     *
     * @param \Datetime $fechDeEntrega
     *
     * @return AsistenciaMensual
     */
    public function setFechDeEntrega(\Datetime $fechDeEntrega)
    {
        $this->fechDeEntrega = $fechDeEntrega;

        return $this;
    }

    /**
     * Get fechDeEntrega
     *
     * @return \Datetime
     */
    public function getFechDeEntrega()
    {
        return $this->fechDeEntrega;
    }
}
