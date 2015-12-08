<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/** 
 * @ORM\Entity 
 */
class Modulo {
    
    /**
     * @ORM\Column(type="integer",  nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */

    protected $idModulo;
    /**
     * @ORM\Column(type="string", length=140,  nullable=false)
     */
    protected $nombre;
    /**
     * @ORM\Column(type="string", length=140,  nullable=false)
     */
    protected $tipo;


    /**
     * Get idModulo
     *
     * @return integer
     */
    public function getIdModulo()
    {
        return $this->idModulo;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Modulo
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
     * Set tipo
     *
     * @param string $tipo
     *
     * @return Modulo
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
}
