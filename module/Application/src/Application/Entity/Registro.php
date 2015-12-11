<?php

	namespace Application\Entity;

	use Doctrine\ORM\Mapping as ORM;
	use DateTime;
	/**
	 * @oRM\Entity
	 */
	class Registro {

    /**
     * @ORM\Column(type="integer",nullable=false, unique=true)
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    protected  $idRegistro;


	
	
    /**
     * Get idRegistro
     *
     * @return integer
     */
    public function getIdRegistro()
    {
        return $this->idRegistro;
    }
}
