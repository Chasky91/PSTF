<?php

namespace Application\Admin\Form\FormAsisMensual;

use Application\Entity\AsistenciaMensual;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class AsisMenFieldset extends Fieldset {

    public function __construct(ObjectManager $em) {
        parent::__construct('asistenciamensual');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\AsistenciaMensual'))
                ->setObject(new AsistenciaMensual());
        
        $this->add([
            'name' => 'idRegistro',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => [
                'required' => 'required',
            ],
        ]);

        $this->add([
            'name' => 'idPlanilla',
            'type' => 'Zend\Form\Element\Hidden',
            'attributes' => [
                'required' => 'required',
            ],
        ]);
        
        $this->add([
                    'type' => 'DoctrineModule\Form\Element\ObjectSelect',
                    'name' => 'modulo',
                    'options' => [
                        'object_manager' => $em,
                        'target_class' => 'Application\Entity\Modulo',
                        'property' => 'nombre',
                        'display_empty_item' => true,
                        'empty_item_label' => '---',
                    ],
                ]
        );
        
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

        $this->add([
            'name' => 'otro',
            'type' => 'Text',
        ]); 

 
    }

}
