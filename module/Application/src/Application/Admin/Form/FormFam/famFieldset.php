<?php
/*este archivo es la creacion de los objetos de nuestro formulario y abtrae los datos del padre NUEVO
Asi que crearemos los obejtos de Nuevo beneficiario
Se debe hacer este archivo por cada formulario creado
*/
namespace Application\Admin\Form\FormFam;

//use Application\Entity\Estado_civil;
use Application\Entity\Familia;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineORMModule\Stdlib\Hydrator\DoctrineEntity;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;



class famFieldset extends  Fieldset 
/*Osea se refiere a la clase de zend/form/form*/
{
	public function __construct(ObjectManager $em)
	{
		parent::__construct('familia');

        $this->setHydrator(new DoctrineEntity($em, 'Application\Entity\Familia'))
             ->setObject(new Familia());


			//creacion de los elementos

			//DNI Familia
			 $this->add([
	            'name' => 'dni',
	            'type' => 'Text',            
	        ]);

			 //Nombre del Familia
	        $this->add([
	            'name' => 'nombre',
	            'type' => 'Text',
	        ]);

	        //Apellido del Familia
	        $this->add([
	            'name' => 'apellido',
	            'type' => 'Text',
	        ]);	
	        //Lugar de Nacimiento
	        $this->add([
	            'name' => 'lugnac',
	            'type' => 'Text',
	        ]);

	        //Fecha Nacimiento
	        $this->add([
	            'name' => 'fechanac',
	            'type' => 'Date',
	        ]);


	        //Seleccion de Estado Civil
	        $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            //Este es el nombre que tendra la etiqueta de select
            'name' => 'estadocivil',
            'options' => [
                'object_manager' => $em,
                //Aqui lo dirigimos a la carpeta de la entidad
                'target_class' => 'Application\Entity\EstadoCivil',
                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
                'property' => 'descripcion',
               // 'label' => 'Categoria:',
            		],
        	]); 
       

			$this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            //Este es el nombre que tendra la etiqueta de select
            'name' => 'educacion',
            'options' => [
                'object_manager' => $em,
                //Aqui lo dirigimos a la carpeta de la entidad
                'target_class' => 'Application\Entity\Educacion',
                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
                'property' => 'descripcion',
                //'label' => 'Categoria:',
            		],
        	]);

			$this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            //Este es el nombre que tendra la etiqueta de select
            'name' => 'profession',
            'options' => [
                'object_manager' => $em,
                //Aqui lo dirigimos a la carpeta de la entidad
                'target_class' => 'Application\Entity\Profesion',
                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
                'property' => 'descripcion',
                //'label' => 'Categoria:',
            		],
        	]);

            $this->add([
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            //Este es el nombre que tendra la etiqueta de select
            'name' => 'relacion',
            'options' => [
                'object_manager' => $em,
                //Aqui lo dirigimos a la carpeta de la entidad
                'target_class' => 'Application\Entity\Relacion',
                //Aqui debo poner el nombre de lo que voy a mostrar, en este caso la descirpcion
                'property' => 'descripcion',
                //'label' => 'Categoria:',
                    ],
            ]);



	}		
}
