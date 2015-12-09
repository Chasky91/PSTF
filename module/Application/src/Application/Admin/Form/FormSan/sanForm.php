<?php

namespace Application\Admin\Form\FormSan;

use Zend\Form\Form;

//use Zend\InputFilter\InputFilter;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormSan\sanFieldset;

class sanForm extends Form // se refiere a la clase Zend\Form\Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('san-form');
             
        $this->setHydrator(new DoctrineHydrator($em));

        $sanFieldset = new sanFieldset($em);
        $sanFieldset->setUseAsBaseFieldset(true);
        $this->add($sanFieldset);
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
