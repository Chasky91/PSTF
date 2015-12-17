<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Modulo
 *
 * @ORM\Table(name="Modulo")
 * @ORM\Entity
 */
class Modulo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idModulo", type="integer", precision=0, scale=0, nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idModulo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=140, precision=0, scale=0, nullable=false, unique=false)
     */
    private $nombre;


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
}

