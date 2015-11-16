<?php

namespace Application\Admin\Form\FormSector;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormSector\SectorFieldset;

class SectorForm extends Form
{
    public function __construct(ObjectManager $em) 
    {
        parent::__construct('sector-form');
        
        $this->setHydrator(new DoctrineHydrator($em));
        
        $sectorFieldeset = new SectorFieldset($em);
        $sectorFieldeset->setUseAsBaseFieldset(true);
        $this->add($sectorFieldeset);
        
        $this->add([
            'name' =>'submit',
            'type' =>'Submit',
            'attributes' => [
                'value' => 'RegistraR',
                'id' => 'submit',
                ],
        ]);
    }
}

