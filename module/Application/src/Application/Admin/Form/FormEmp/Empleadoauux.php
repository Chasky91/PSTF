<?php

namespace Application\Admin\Form\formemp;
use Zend\Form\Form;

class Empleado extends Form
{
    public function __construct() {
        parent::__construct('empleado');
                $this ->add([
                    'name' => 'dni',
                    'type' => 'Text',
                    'options' =>[
                        'label'=> 'DNI',
                    ],                    
                ]);
                
                $this -> add([
                    'name' => 'nombre',
                    'type' => 'Text',
                    'options' =>[
                        'label' => 'NombrE',
                    ],                    
                ]);
                
                $this -> add([
                    'name' => 'apellido',
                    'type' => 'Text',
                    'options' =>[
                        'label' => 'Apellido',
                    ],                    
                ]);
                
                $this -> add([
                    'name' => 'submit',
                    'type' => 'Submit',
                    'attributes' =>[
                        'value' => 'Guardar',
                        'id' => 'submit',
                    ],                    
                ]);
    }
}
