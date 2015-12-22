<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Application\Repository\AsistenteSocial")
 */

class AsistenteSocial extends Empleado
{
    public function getRol() 
    {
        return 'asistente social';
    }
    
}
