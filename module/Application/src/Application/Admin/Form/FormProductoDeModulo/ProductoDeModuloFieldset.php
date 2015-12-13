<?php

namespace Application\Admin\Form\FormProductoDeModulo;

use Application\Entity\ProductosDeModulo;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;

class ProductoDeModuloFieldset extends Fieldset 
{
    public function __construct(ObjectManager $em) {
        parent::__construct('productodemodulo');
        
        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\ProductosDeModulo'))
                ->setObject(new ProductosDeModulo);
        
        
        $this->add([
            'name' => 'moduloId',
            'type' => 'Zend\Form\Element\Hidden',
        ]);
                
        $this->add([
            'name' => 'idProducto',
            'type' => 'Zend\Form\Element\Hidden',
        ]);
        
        $this->add([
            'name' => 'producto',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);      

        
        $this->add([
            'name' => 'cantidad',
            'type' => 'Text',
            'attributes' => [
                'required' => 'required'                
            ],            
        ]);
  
            
       
    }
}