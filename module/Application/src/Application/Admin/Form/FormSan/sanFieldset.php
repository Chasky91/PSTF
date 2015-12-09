<?php
/*este archivo es la creacion de los objetos de nuestro formulario y abtrae los datos del padre NUEVO
Asi que crearemos los obejtos de Nuevo beneficiario
Se debe hacer este archivo por cada formulario creado
*/
namespace Application\Admin\Form\FormSan;

//use Application\Entity\Estado_civil;
use Application\Entity\Sanidad;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Form\Form;



class sanFieldset extends  Fieldset 
/*Osea se refiere a la clase de zend/form/form*/
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('sanidad');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Sanidad'))
             ->setObject(new Sanidad());


			//creacion de los elementos

            //Radio de Cobertura Social SI/NO
            $this->add(array(
                'name' => 'cobertura',
                'type' => 'Checkbox',            
                'options' => array(
                    'use_hidden_element' => true,
                    'checked_value' => '1',//Verdadero=1
                    'unchecked_value' => '0',//Falso=0
                )
            ));

            //Nombre de Obra Social
            $this->add([
                'name' => 'obraS',
                'type' => 'Text',
            ]); 
            //Nombre de la Persona que tiene la Obra Social
            $this->add([
                'name' => 'famOS',
                'type' => 'Text',
            ]); 
            //Radio de Si se atiende en el Hospital
            $this->add(array(
                'name' => 'atenHC',
                'type' => 'Checkbox',            
                'options' => array(
                    'use_hidden_element' => true,
                    'checked_value' => '1',//Verdadero=1
                    'unchecked_value' => '0',//Falso=0
                )
            ));
            //Radio de Si se atiende en otro Centro de Salud
            $this->add(array(
                'name' => 'otroCS',
                'type' => 'Checkbox',            
                'options' => array(
                    'use_hidden_element' => true,
                    'checked_value' => '1',//Verdadero=1
                    'unchecked_value' => '0',//Falso=0
                )
            ));  
            //Nombre del Otro centro de Salud
            $this->add([
                'name' => 'nomCS',
                'type' => 'Text',
            ]); 
            //Radio de si hay o no discapacidad
            $this->add(array(
                        'name' => 'discapacidad',
                        'type' => 'Checkbox',            
                        'options' => array(
                            'use_hidden_element' => true,
                            'checked_value' => '1',//Verdadero=1
                            'unchecked_value' => '0',//Falso=0
                        )
                    ));
            //Familiar Con discapacidad nombre
            $this->add([
                'name' => 'famDisc',
                'type' => 'Text',
            ]); 
            //tipo de discapacidad
            $this->add([
                'name' => 'tipo',
                'type' => 'Text',
            ]); 
            //Radio de si posee certificado de discapacidad
            $this->add(array(
                        'name' => 'certificado',
                        'type' => 'Checkbox',            
                        'options' => array(
                            'use_hidden_element' => true,
                            'checked_value' => '1',//Verdadero=1
                            'unchecked_value' => '0',//Falso=0
                        )
                    ));

            //Detalle de enfermedad 
	        $this->add([
            'type' => 'TextArea',
            'name' => 'detalles',
             ]);
            //Otros detalles
            $this->add([
            'type' => 'TextArea',
            'name' => 'observacion',
             ]);

	}		
}
