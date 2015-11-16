<?php

namespace Application\Admin\Form\FormEmp;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormEmp\EmpleadoFieldset;

class EmpleadoForm extends Form // se refiere a la clase Zend\Form\Form
{
    public function __construct(ObjectManager $em)
    {
        parent::__construct('empleado-form');
        
        $this->setHydrator(new DoctrineHydrator($em));

        $empleadoFieldset = new EmpleadoFieldset($em);
        $empleadoFieldset->setUseAsBaseFieldset(true);
        $this->add($empleadoFieldset);

        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'RegistraR',
                'id' => 'submit',
            ],
        ]);
    }
}