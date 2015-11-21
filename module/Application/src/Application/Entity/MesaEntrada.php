<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\Admin")
 */

class MesaEntrada extends Empleado
{
    public function getRol() 
    {
        return 'mesaEntrada';
    }
    
}
