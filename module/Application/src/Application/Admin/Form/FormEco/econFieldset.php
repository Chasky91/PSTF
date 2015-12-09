<?php
/*este archivo es la creacion de los objetos de nuestro formulario y abtrae los datos del padre NUEVO
Asi que crearemos los obejtos de Nuevo beneficiario
Se debe hacer este archivo por cada formulario creado
*/
namespace Application\Admin\Form\FormEco;

use Application\Entity\Economia;
//use Application\Entity\Beneficiario;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Form\Form;


class econFieldset extends  Fieldset 
/*Osea se refiere a la clase de zend/form/form*/
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('economia');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Economia'))
             ->setObject(new Economia());

            //creacion de los elementos

            //Radio de si trabaja actualmente SI/NO
            $this->add(array(
                'name' => 'trabajo',
                'type' => 'Checkbox',            
                'options' => array(
                    'use_hidden_element' => true,
                    'checked_value' => '1',//Verdadero=1
                    'unchecked_value' => '0',//Falso=0
                )
            ));

            //Nombre del ultimo trabajo
            $this->add([
                'name' => 'nomTrab',
                'type' => 'Text',
            ]); 

            //Radio de Si recibe ingresos económicos
            $this->add(array(
                'name' => 'ingreso',
                'type' => 'Checkbox',            
                'options' => array(
                    'use_hidden_element' => true,
                    'checked_value' => '1',//Verdadero=1
                    'unchecked_value' => '0',//Falso=0
                )
            ));
            //Cantidad aproximada de ingresos
            $this->add([
                'name' => 'canIng',
                'type' => 'Text',
            ]); 
            //tiempo aproximado que recibe el ingreso
            $this->add([
                'name' => 'tiempoIng',
                'type' => 'Text',
            ]); 
            //Observaciones nro 1
            $this->add([
            'type' => 'TextArea',
            'name' => 'obser1',
             ]);
            //Radio de Si recibe ayuda economica
            $this->add(array(
                'name' => 'ayuda',
                'type' => 'Checkbox',            
                'options' => array(
                    'use_hidden_element' => true,
                    'checked_value' => '1',//Verdadero=1
                    'unchecked_value' => '0',//Falso=0
                )
            ));  
            //Nombre del tipo de ayuda
            $this->add([
                'name' => 'tipo',
                'type' => 'Text',
            ]); 
            //Cantidad economica de ayuda
            $this->add([
                'name' => 'canAyuda',
                'type' => 'Text',
            ]); 
            //tiempo aproximado que recibe ayuda
            $this->add([
                'name' => 'tiempoA',
                'type' => 'Text',
            ]); 

            //Observacion nro 2
            $this->add([
            'type' => 'TextArea',
            'name' => 'obser2',
             ]);
            //OBservacion nro 3
            $this->add([
            'type' => 'TextArea',
            'name' => 'obser3',
             ]);

    }       
}
