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
            'name' => 'id',
            'type' => 'Hidden',
        ]);

        $this->add([
            'name' => 'nombre',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);
        
        $this->add([
            'name' => 'cantidad',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);
        
        $this->add([
            'name' => 'tipo',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);
  
            
       
    }
}