<?php

namespace Application\Admin\Form\FormProductoDeModulo;

use Zend\Form\Form;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Admin\Form\FormProductoDeModulo\ProductoDeModuloFieldset;

class ProductoDeModuloForm extends Form
{
	public function __construct(ObjectManager $em)
	{
                        parent::__construct('productodemodulo-form');

                        //el form es hidratado con la entidad
                        $this->setHydrator(new DoctrineHydrator($em));

                        $productoDeModuloFieldset = new ProductoDeModuloFieldset($em);
                        $productoDeModuloFieldset->setUseAsBaseFieldset(true);                        
                        $this->add($productoDeModuloFieldset);

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