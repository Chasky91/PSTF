<?php

namespace Application\Admin\Form\FormModulo;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormModulo\ModuloFieldset;

class ModuloForm extends Form
{
	public function __construct(ObjectManager $em)
	{
                        parent::__construct('modulo-form');

                        //el form es hidratado con la entidad
                        $this->setHydrator(new DoctrineHydrator($em));

                        $moduloFieldset = new ModuloFieldset($em);
                        $moduloFieldset->setUseAsBaseFieldset(true);                        
                        $this->add($moduloFieldset);

                         $this->add([
                                'name' => 'submmit',
                                'type' => 'Submit',
                                'attributes' => [
                                        'value' =>'Cargar',
                                        'id' => 'submit'
                                ],
                        ]);

	}
}