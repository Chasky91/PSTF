<?php

namespace Application\Admin\Form\FormAsisMensual;

use Application\Entity\RegistroProducto;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class RegistroProductoFieldset extends Fieldset {

    public function __construct(ObjectManager $em) {
        parent::__construct('registroproducto');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\RegistroProducto'))
                ->setObject(new RegistroProducto());
        

        
        $this->add([
                    'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                    'name' => 'producto',
                    'options' => [
                        'object_manager' => $em,
                        'target_class' => 'Application\Entity\Producto',
                        'property' => 'nombre',
                        'display_empty_item' => true,
                        'empty_item_label' => '---',
                    ],
                ]
        );

    }

}