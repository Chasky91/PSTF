<?php

namespace Application\Admin\Form\FormAsistencia;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormAsistencia\RegistroDeModuloFieldset;

class RegistroDeEntregaForm extends Form 
{
    public function __construct(ObjectManager $em) {
        parent::__construct('registrodeentrega-form');
        
        $this->setHydrator(new DoctrineHydrator($em));
        
        $registroDeEntregaFieldset = new RegistroDeEntregaFieldset($em);
        $registroDeEntregaFieldset->setUseAsBaseFieldset(true);
        $this->add($registroDeEntregaFieldset);
        
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

