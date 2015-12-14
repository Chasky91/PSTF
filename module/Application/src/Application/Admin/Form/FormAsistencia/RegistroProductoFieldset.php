<?php

namespace Application\Admin\Form\FormAsistencia;

use Application\Entity\RegistroProducto;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;

class RegistroProductoFieldset extends Fieldset
{
    public function __construct(ObjectManager $em)
    {
        parent::__construct('registro-producto');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\RegistroProducto'))
             ->setObject(new RegistroProducto());  

        
        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'productoId',
            'options' => [
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Producto',
                'property' => 'nombre',
                'display_empty_item' => true,
                'empty_item_label' => '---',
            ],
        ]);
        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'moduloId',
            'options' => [
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Modulo',
                'property' => 'nombre',
                'display_empty_item' => true,
                'empty_item_label' => '---',
            ],
        ]);

        $this->add([
            'name' => 'otro',
            'type' => 'Text',
        ]);
        
    }
}

