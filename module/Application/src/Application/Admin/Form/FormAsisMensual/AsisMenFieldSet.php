<?php

namespace Aplication\Admin\Form\FormAsisMensual;

use Application\Entity\AsistenciaMensual;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\StdLib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class AsisMenFieldset extends FieldSet
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('asistenciamensual')

		$this->setHydrator(new DoctrineEntity($em, 'Application\Entity\AsistenciaMensual'))
			 ->setObject(new AsistenciaMensual());
		$this->add([
            'name' => 'idBenificiario',
            'type' => 'Text',
            'attributes' => [
                  'required' => 'required',
             ],
        ]);


	}
}