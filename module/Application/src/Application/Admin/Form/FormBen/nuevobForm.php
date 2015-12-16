<?php

namespace Application\Admin\Form\FormBen;

use Zend\Form\Form;

//use Zend\InputFilter\InputFilter;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormBen\nuevobFieldset;

class nuevobForm extends Form // se refiere a la clase Zend\Form\Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('nuevob-form');
             
        $this->setHydrator(new DoctrineHydrator($em));

        $nuevobFieldset = new nuevobFieldset($em);
        $nuevobFieldset->setUseAsBaseFieldset(true);
        $this->add($nuevobFieldset);
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
