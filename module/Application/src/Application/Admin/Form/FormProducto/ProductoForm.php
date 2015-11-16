<?php

namespace Application\Admin\Form\FormProducto;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormProducto\ProductoFieldset;

class ProductoForm extends Form
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('producto-form');

		//el form es hidratado con la entidad
		$this->setHydrator(new DoctrineHydrator($em));

		$productoFieldset = new ProductoFieldset($em);
		$productoFieldset->setUseAsBaseFieldset(true);
		$this->add($productoFieldset);

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

