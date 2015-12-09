<?php

namespace Application\Admin\Form\FormViv;

use Zend\Form\Form;

//use Zend\InputFilter\InputFilter;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormViv\vivFieldset;

class vivForm extends Form // se refiere a la clase Zend\Form\Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('viv-form');
             
        $this->setHydrator(new DoctrineHydrator($em));

        $vivFieldset = new vivFieldset($em);
        $vivFieldset->setUseAsBaseFieldset(true);
        $this->add($vivFieldset);
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