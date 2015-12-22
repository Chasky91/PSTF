<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\MesaEntrada")
 */

class MesaEntrada extends Empleado
{
    public function getRol() 
    {
        return 'mesa entrada';
    }
    
}
