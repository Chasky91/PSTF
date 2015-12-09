<?php
/*este archivo es la creacion de los objetos de nuestro formulario y abtrae los datos del padre NUEVO
Asi que crearemos los obejtos de Nuevo beneficiario
Se debe hacer este archivo por cada formulario creado
*/
namespace Application\Admin\Form\FormViv;

//use Application\Entity\Estado_civil;
use Application\Entity\Vivienda;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Form\Form;


class vivFieldset extends  Fieldset 
/*Osea se refiere a la clase de zend/form/form*/
{
	public function __construct(ObjectManager $em)
	{
				parent::__construct('vivienda');

		        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Vivienda'))
		             ->setObject(new Vivienda());


					//creacion de los elementos

					//Recibe monto aproximado de alquiler
					 $this->add([
			            'name' => 'montAlq',
			            'type' => 'Text',            
			        ]);

					 //Nombre del propietario del Alquiler
			        $this->add([
			            'name' => 'propAlq',
			            'type' => 'Text',
			        ]);

			        //tiempo aproximado de Alquiler
			        $this->add([
			            'name' => 'tiemAlq',
			            'type' => 'Text',
			        ]);	
			        //Nombre de la persona quien cedio la vivienda
			        $this->add([
			            'name' => 'cedida',
			            'type' => 'Text',
			        ]);
		            //confirmacion de si/no del terreno de la vivienda
		            $this->add(array(
		                'name' => 'terrPropio',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));
		            //confirmacion de si/no el terreno estuviera pago
		            $this->add(array(
		                'name' => 'terrPago',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));
		            //confirmacion de si/no si el terreno de la vivienda se encuentra escriturado
		            $this->add(array(
		                'name' => 'escritura',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));            
		        	//Cuantas habitaciones para dormir tienen
			        $this->add([
			            'name' => 'habitacion',
			            'type' => 'Text',
			        ]);


		        	//Cuantas piezas existen en la casa, sin contar baño y cocina
		      	      $this->add([
			            'name' => 'pieza',
			            'type' => 'Text',
			        ]);
		            //confirmacion de si/no tienen baño
		            $this->add(array(
		                'name' => 'baño',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 
		            //confirmacion de si/no tienen boton el inodoro
		            $this->add(array(
		                'name' => 'boton',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));             
		            //Confirmacion de si/no el baño es de uso exclusivo
		            $this->add(array(
		                'name' => 'uso',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 	     
			        //Si la ubicación del baño es interno o externo
			        	$this->add([
			            'name' => 'ubicacion',
			            'type' => 'Text',
			        ]);  
			        //Si el estado del baño esta terminado, semi o no tiene
			        	$this->add([
			            'name' => 'estado',
			            'type' => 'Text',
			        ]);
		            //Confirmar si/no posee cama
		            $this->add(array(
		                'name' => 'cama',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));           
			        //Cuantas camas posee
			        	$this->add([
			            'name' => 'camcant',
			            'type' => 'Text',
			        ]); 
		            //Confirmar si/no Si posee mesas y sillas
		            $this->add(array(
		                'name' => 'mesa',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 
		            //Confirmar si/nosi posee cocina
		            $this->add(array(
		                'name' => 'cocina',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));   
		            //Confirmar si/no si tiene heladera
		            $this->add(array(
		                'name' => 'heladera',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 
		            //Observaciones Tanto de Muebleria y Construccion
		            $this->add([
			            'type' => 'TextArea',
			            'name' => 'obser1',
			             ]);  
		            //Confirmar si/no tiene luz
		            $this->add(array(
		                'name' => 'luz',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 
		            //Confirmar si/no si tiene agua
		            $this->add(array(
		                'name' => 'agua',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));   
		            //confirmar si/no tiene Gas
		            $this->add(array(
		                'name' => 'gas',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 
		            //Observaciones numero 2
		            $this->add([
			            'type' => 'TextArea',
			            'name' => 'obser2',
			             ]);  
		            //Confirmar si/no tiene auto
		            $this->add(array(
		                'name' => 'auto',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            ));             
					//Modelo del auto
					 $this->add([
			            'name' => 'modelo',
			            'type' => 'Text',            
			        ]);

					 //año del auto
			        $this->add([
			            'name' => 'año',
			            'type' => 'Text',
			        ]);
		            //Confirmar si/no posee otras propiedades
		            $this->add(array(
		                'name' => 'otraPropiedad',
		                'type' => 'Checkbox',            
		                'options' => array(
		                    'use_hidden_element' => true,
		                    'checked_value' => '1',//Verdadero=1
		                    'unchecked_value' => '0',//Falso=0
		                )
		            )); 	        
			        //Otros detalles de propiedades
		            $this->add([
			            'type' => 'TextArea',
			            'name' => 'detalleprop',
			             ]);  

		            //Selec que busca en Tenencia el tipo de Tenencia
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'tenencia',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Tenencia',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
		        	//Select que busca en Luz el medio en que lo recibe
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'medio',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Luz',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
		        	//Select que busca en Agua el medio en que lo recibe
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'obtenida',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Agua',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
		         	//Select que busca en AguaLug el medio del cual proviene     	
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'proveniente',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\AguaLug',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
					//Select que busca el tipo de gas que utiliza
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'utiliza',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Gas',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
		        	//Select que busca en Pared el tipo de pared
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'pared',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Pared',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
					//Select que busca en Suelo el tipo de suelo
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'piso',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Suelo',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
		        	//Select que busca en Techo el tipo de techo
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'techo',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Techo',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
		        	//Select que busca en CieloR el tipo de cielo razo
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'cielrazo',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\CieloR',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);
					//Select que busca en Desague el tipo de desague del baño
					$this->add([
		            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
		            //Este es el nombre que tendra la etiqueta de select
		            'name' => 'desagote',
		            'options' => [
		                'object_manager' => $em,
		                //Aqui lo dirigimos a la carpeta de la entidad
		                'target_class' => 'Application\Entity\Desague',
		                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
		                'property' => 'descripcion',
		                //'label' => 'Categoria:',
		            		],
		        	]);        	

	}		
}
