<?php

namespace Application\Admin\Form\FormAsistencia;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormAsistencia\RegistroProductoFieldset;

class RegistroProductoForm extends Form 
{
    public function __construct(ObjectManager $em) {
        parent::__construct('registroproducto-form');
        
        $this->setHydrator(new DoctrineHydrator($em));
        
        $registroProFieldset = new RegistroProductoFieldset($em);
        $registroProFieldset->setUseAsBaseFieldset(true);
        $this->add($registroProFieldset);
        
        $this->add([
               'name' => 'type',
               'type' =>'Submit',
               'attributes' => [
                   'value' => 'Guardar',
                   'id' => 'Submit',
               ],
        ]);
        
    }
}

