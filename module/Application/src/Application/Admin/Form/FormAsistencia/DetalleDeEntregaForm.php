<?php

namespace Application\Admin\Form\FormAsistencia;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormAsistencia\DetalleDeEntregaFieldset;

class DetalleDeEntregaForm extends Form 
{
    public function __construct(ObjectManager $em) {
        parent::__construct('detalledeentrega-form');
        
        $this->setHydrator(new DoctrineHydrator($em));
        
        $detalleDeEntregaFieldset = new DetalleDeEntregaFieldset($em);
        $detalleDeEntregaFieldset->setUseAsBaseFieldset(true);
        $this->add($detalleDeEntregaFieldset);
        
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

