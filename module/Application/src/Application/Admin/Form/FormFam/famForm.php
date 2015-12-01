<?php

namespace Application\Admin\Form\FormFam;

use Zend\Form\Form;

//use Zend\InputFilter\InputFilter;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormFam\famFieldset;

class famForm extends Form // se refiere a la clase Zend\Form\Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('fam-form');
             
        $this->setHydrator(new DoctrineHydrator($em));

        $famFieldset = new famFieldset($em);
        $famFieldset->setUseAsBaseFieldset(true);
        $this->add($famFieldset);
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
