<?php

namespace Application\Admin\Form\FormAsistencia;

use Application\Entity\Registro;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class RegistroProductoFieldset extends Fieldset
{
    public function __construct(ObjectManager $em)
    {
        parent::__construct('registro-producto');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Registro'))
             ->setObject(new Registro());  

        $this->add([
            'name' => 'beneficiarioId',
            'type' => 'Hidden'
        ]);
        
        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'itemId',
            'options' => [
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Producto',
                'property' => 'nombre',
                'display_empty_item' => true,
                'empty_item_label' => '---',
            ],
        ]);

        $this->add([
            'name' => 'tipo',
            'type' => 'Zend\Form\Element\Hidden',
        ]);
        
        $this->add([
            'name' => 'cantidad',
            'type' => 'Text',
        ]);
        
    }
}

