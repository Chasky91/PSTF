<?php 
namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * @ORM\Entity
 */
class RegistroOtro
{


    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected  $idRegistro;

    /**
     * @ORM\Column( type="string", length=140,  nullable=true)
     */
    protected $otro;



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
     * Set otro
     *
     * @param string $otro
     *
     * @return RegistroOtro
     */
    public function setOtro($otro)
    {
        $this->otro = $otro;

        return $this;
    }

    /**
     * Get otro
     *
     * @return string
     */
    public function getOtro()
    {
        return $this->otro;
    }
}
