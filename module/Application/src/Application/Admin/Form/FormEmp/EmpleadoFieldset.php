<?php

namespace Application\Admin\Form\FormEmp;

use Application\Entity\Empleado;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
//use Zend\InputFilter\InputFilterProviderInterface;

class EmpleadoFieldset extends Fieldset
{
    public function __construct(ObjectManager $em)
    {
        parent::__construct('empleado');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Empleado'))
             ->setObject(new Empleado());        
        $this->add([
            'name' => 'id',
            'type' => 'Hidden',
        ]);
        $this->add([
            'name' => 'dni',
            'type' => 'Text',
            'attributes' => [
                  'required' => 'required',
             ],
        ]);
        $this->add([
            'name' => 'nombre',
            'type' => 'Text',
            'attributes' => [
                  'required' => 'required',
             ],
        ]);
        $this->add([
            'name' => 'apellido',
            'type' => 'Text',
            'attributes' => [
                  'required' => 'required',
            ],
        ]);

        $this->add([
            'name' => 'email',
            'type' => 'Email',            
        ]);

        //para ingresar o cambiar la contraseña 
        $this->add([
            'name' => 'contrasena',
            'type' => 'Password',            
        ]);

        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'sector',
            'options' => [
                'object_manager' => $em,
                'target_class' => 'Application\Entity\Sector',
                'property' => 'nombre',
            ],
            'attributes' => [
                  'required' => 'required',
             ],

        ]);        
                

    }
    

    public function getInputFilterSpecification()
    {
        return [
            'email' => [
                'required' => false,
            ],
            'contrasena' => [
                'required' => false,
            ],
        ];
    }
}