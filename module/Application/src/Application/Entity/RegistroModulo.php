<?php 
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 */
class RegistroModulo
{


    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected  $idRegistro;

    /**
     * @ORM\OneToOne(targetEntity="Modulo")
     * @ORM\JoinColumn(name="moduloId", referencedColumnName="idModulo", nullable=true, unique=true)
     */
    protected $moduloId;



    /**
     * Get idRegistro
     *
     * @return integer
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }

    /**
     * Set moduloId
     *
     * @param \Application\Entity\Modulo $moduloId
     *
     * @return RegistroModulo
     */
    public function setModuloId(\Application\Entity\Modulo $moduloId = null)
    {
        $this->moduloId = $moduloId;

        return $this;
    }

    /**
     * Get moduloId
     *
     * @return \Application\Entity\Modulo
     */
    public function getModuloId()
    {
        return $this->moduloId;
    }
}
