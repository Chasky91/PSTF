<?php

namespace Application\Admin\Form\FormProducto;

//clases que usa el formulario
use Application\Entity\Producto;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class ProductoFieldset extends Fieldset
{
	public function __construct(ObjectManager $em) 
	{
		parent::__construct('producto');

		
		$this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Producto'))
			 ->setObject(new Producto());
		$this->add([
			'name' => 'id',
			'type' => 'hidden'
		]);

		$this->add([
			'name' => 'nombre',
			'type' => 'Text',
			'attributes' => [
				'required' => 'required',
			],
		]);

		$this->add([
			'name' => 'descripcion',
			'type' => 'Textarea',
			'attributes' => [
				'required' => 'required',
			],
		]);
		$this->add([
			'name' => 'cantidad',
			'type' => 'Text',
			'attributes' => [
				'required'=>'required',
			],
		]);

		$this->add([
			'name' => 'stockCritico',
			'type' => 'Text',
			'attributes' => [
				'required'=>'required',
			],
		]);
	}
} 