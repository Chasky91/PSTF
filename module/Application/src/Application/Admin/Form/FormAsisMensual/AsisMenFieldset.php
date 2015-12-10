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
            'name' => 'idBenificiario',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required',
            ],
        ]);
        
        $this->add([
            'name' => 'detalleEntrega',
            'type' => 'Text',
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
            ],
            'attributes' => [
                  'required' => 'required',
             ],

        ]); 

        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'sector',
            'options' => [
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Producto',
                'property' => 'nombre',
            ],
            'attributes' => [
                  'required' => 'required',
             ],

        ]);

        $this->add([
            'name' => 'otro',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required',
            ],
        ]); 

 
    }

}
