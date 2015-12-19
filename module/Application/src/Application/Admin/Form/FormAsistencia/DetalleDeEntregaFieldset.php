<?php

namespace Application\Admin\Form\FormAsistencia;

use Application\Entity\DetalleDeEntrega;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class DetalleDeEntregaFieldset extends Fieldset
{
    public function __construct(ObjectManager $em)
    {
        parent::__construct('detalleentrega-producto');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\DetalleDeEntrega'))
             ->setObject(new DetalleDeEntrega());  

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

