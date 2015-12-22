<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\Director")
 */

class Director extends Empleado
{
    public function getRol() 
    {
        return 'director';
    }
    
}
