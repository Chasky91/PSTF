<?php

namespace Application\Admin\Form\FormAsisMensual;

use Application\Entity\RegistroModulo;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class RegistroModuloFieldset extends Fieldset {

    public function __construct(ObjectManager $em) {
        parent::__construct('registromodulo');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\RegistroModulo'))
                ->setObject(new RegistroModulo());
        

        
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

    }

}
