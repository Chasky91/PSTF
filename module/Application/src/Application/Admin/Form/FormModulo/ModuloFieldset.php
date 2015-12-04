<?php

namespace Application\Admin\Form\FormModulo;

use Application\Entity\Modulo;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class ModuloFieldset extends Fieldset 
{
    public function __construct(ObjectManager $em) {
        parent::__construct('modulo');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Modulo'))
                ->setObject(new Modulo);
        
        $this->add([
            'name' => 'tipo',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);
        
        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'producto',
            'options' => [               
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Producto',
                'property' => 'nombre',
            ],
            'attributes' => [
                  'required' => 'required',
             ],

        ]);  
            
       
    }
}