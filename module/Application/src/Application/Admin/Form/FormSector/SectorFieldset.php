<?php

namespace Application\Admin\Form\FormSector;

use Application\Entity\Sector;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class SectorFieldset extends Fieldset 
{
    public function __construct(ObjectManager $em) {
        parent::__construct('sector');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Sector'))
                ->setObject(new Sector);
        
        $this->add([
            'name' => 'nombre',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);
    }
}