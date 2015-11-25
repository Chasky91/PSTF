<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\Admin")
 */

class Admin extends Empleado
{
    public function getRol() 
    {
        return 'admin';
    }
    
}