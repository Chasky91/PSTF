<?php

namespace Application\Admin\Form\FormEco;

use Zend\Form\Form;

//use Zend\InputFilter\InputFilter;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormEco\econFieldset;

class econForm extends Form // se refiere a la clase Zend\Form\Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('econ-form');
             
        $this->setHydrator(new DoctrineHydrator($em));

        $econFieldset = new econFieldset($em);
        $econFieldset->setUseAsBaseFieldset(true);
        $this->add($econFieldset);
        $this->add([
            'name' => 'submit',
            'type' => 'Submit',
            'attributes' => [
                'value' => 'Guardar',
                'id' => 'submit',
            ],
        ]);
    }

}