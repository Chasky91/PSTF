<?php

namespace Application\Admin\Form\FormAsistencia;

use Application\Entity\RegistroDeEntrega;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class RegistroDeEntregaFieldset extends Fieldset
{
    public function __construct(ObjectManager $em)
    {
        parent::__construct('registrodeentrega');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\RegistroDeEntrega'))
             ->setObject(new RegistroDeEntrega());  

        $this->add([
            'name' => 'beneficiarioId',
            'type' => 'Hidden'
        ]);
        
        $this->add([
            'name' => 'descripcion',
            'type' => 'TextArea'
        ]);

        
    }
}

