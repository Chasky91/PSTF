<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Index',
                        'action'     => 'index',
                    ),
                ),
            ),
/*

    // This should be an array of module namespaces used in the application.
    'modules' => array(
        'Application',
        'DOMPDFModule',
        ),

        */
//Esto corresponde al modulo de beneficiarios
            //aqui entramos a la vista o index de la vista de Beneficiario
            'beneficiario'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/beneficiario/:id',                  
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo beneficiario
            'nuevo-beneficiario'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/nuevo-beneficiario',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'nuevo',
                                    ),
                                ),
                            ),
            //Aqui a la vista de ver beneficiario
            'ver-beneficiario'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/ver-beneficiario',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'verbenf',
                                    ),
                                ),
                            ),
            //Aqui a la vista de modificar beneficiario
            'modbeneficiario'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/mod-beneficiario/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'modificar',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Aprobar beneficiario
            'aprobar'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/aprobar-beneficiario/:id/',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'aprobar',

                                    ),
                                ),
                            ),   
             //Aqui a la vista de Aprobar beneficiario
            'rechazar'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/rechazar-beneficiario/:id/',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'rechazar',

                                    ),
                                ),
                            ),                                     
            //Aqui a la vista de Eliminar beneficiario
            'del-beneficiario'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/del-beneficiario/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Beneficiario',
                        'action'=>'eliminar',
                                    ),
                                ),
                            ),
//Esto corresponde al modulo de Famila
            //aqui entramos a la vista o index de la vista de Familia
            'familia'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/familia',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Familia',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Familia
            'nuevoFam'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                    'options'=> array(
                    'route' => '/nuevo-familiar/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Familia',
                        'action'=>'nuevo',
                                    ),
                                ),
                            ),
            'verFam'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/ver-familias',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Familia',
                        'action'=>'ver',
                                    ),
                                ),
                            ),
            //Aqui a la vista de modificar Familia
            'modFam'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/mod-Familiar/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Familia',
                        'action'=>'modificar',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Familia
            'delFam'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/del-Familiar/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Familia',
                        'action'=>'eliminar',
                                    ),
                                ),
                            ),

//Esto corresponde a Vivienda(situacion habitacional)
            'vivienda'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/SituacionHabitacional',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Vivienda
            'nuevo'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/Ingresar-SituacionHabitacional',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'nuevoviv',
                                    ),
                                ),
                            ),
            //Aqui a la vista de ver Vivienda
            'ver'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                        'route' => '/ver-SituacionHabitacional/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'verviv',
                                    ),
                                ),
                            ),
            //Aqui a la vista de modificar Vivienda
            'mod'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/mod-SituacionHabitacional/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'modviv',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Vivienda
            'del'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/del-SituacionHabitacional/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'eliminarviv',
                                    ),
                                ),
                            ), 
//Esto corresponde a Economia (situacion economica)      
            'economia'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/SituacionEconomica',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Econimia
            'nuevo'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/Ingresar-SituacionEconomica',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'nuevo',
                                    ),
                                ),
                            ),
            //Aqui a la vista de ver Economia
            'ver'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                        'route' => '/ver-SituacionEconomica/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'vereco',
                                    ),
                                ),
                            ),
            //Aqui a la vista de modificar Economia
            'mod'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/mod-SituacionEconomica/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'modeco',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Economia
            'del'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/del-SituacionEconomica/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'eliminareco',
                                    ),
                                ),
                            ),  
//Esto corresponde a Sanidad (Situacion Sanitaria)
             'sanidad'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/beneficiario',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Sanidad
            'nuevo'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/Ingresar-SituacionSanitaria',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'nuevosan',
                                    ),
                                ),
                            ),
            //Aqui a la vista de ver Sanidad
            'ver'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/ver-SituacionSanitaria',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'versan',
                                    ),
                                ),
                            ),
            //Aqui a la vista de modificar Sanidad
            'mod'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/mod-SituacionSanitaria/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'modsan',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Sanidad
            'del'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/del-SituacionSanitaria/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'delsan',
                                    ),
                                ),
                            ),                           

            ///////////////////////
            //Asistencia mensual//
            /////////////////////

//Esto corresponde al modulo de Asistencia mensual
            //aqui entramos a la vista o index de la vista de Asistencia Mensual
            'index_asistencia' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment', 
                'options' => array(
                    'route' => '/index-asistencia/:beneficiario',
                    'constraints' => array(
                        'beneficiario' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Asistencia',
                        'action' => 'index',
                    ),
                ),
            ),

//Aqui a la vista de index Asistencia Mensual
            'nuevo_asistencia'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/nuevo-asistencia/:id',
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Asistencia',
                        'action'=>'nuevo',
                        ),
                    ),
                ),
      //Aqui a la vista de editar Asistencia Mensual
            'editar_asistencia'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/editar-asistencia/:id/:idBeneficiario',
                    'constraints' => array(
                        'id' => '[0-9]+',
                        'idBeneficiario' => '[0-9]+',
                    ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Asistencia',
                        'action'=>'editar',
                        ),
                    ),
                ),
        //Aqui a la vista de editar Asistencia Mensual
            'pdfAsistencia'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/asistencia-pdf/:id',
                         'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Asistencia',
                        'action'=>'pdf',
                        ),
                    ),
                ),



//Esto corresponde a todo lo referido a los empleados
                        //index empleados
            'index_empleado' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/lista-empleado[/:pagina]',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Empleado',
                        'action' => 'index',
                        'pagina'=>1,
                    ),
                ),
            ),
            //listar empelados index fin
            //secion nuevo empleado
            'nuevo_empleado' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/nuevo-empleado',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Empleado',
                        'action' => 'nuevo',
                    ),
                ),
            ),
            //Seccion editar empelado
            'editar_empleado' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/editar-empleado/:id',                    
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Empleado',
                        'action' => 'editar',
                    ),
                ),
            ),
            //Eliminar empleado
            'eliminar_empleado'=>array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=>array(
                    'route'=>'/eliminar-empleado/:id',
                    'defaults'=>array(
                         'controller'=>'Application\Controller\Empleado',
                         'action'=>'eliminar',
                    ),
                 ),
            ),
            //Termina eliminar empleado
            
            //Comienza sector
            //index sector
             'index_sector' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/lista-sector',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Sector',
                        'action' => 'index',
                    ),
                ),
            ),
            //seccion nuevo sector
            'nuevo_sector' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/nuevo-sector',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Sector',
                        'action' => 'nuevo',
                    ),
                ),
            ),
            //Seccion editar sector
            'editar_sector' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/editar-sector/:id',                    
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Sector',
                        'action' => 'editar',
                    ),
                ),
            ),
            //Eliminar sector
            'eliminar_sector'=>array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=>array(
                    'route'=>'/eliminar-sector/:id',
                    'defaults'=>array(
                         'controller'=>'Application\Controller\Sector',
                         'action'=>'eliminar',
                    ),
                 ),
            ),
            //Termina eliminar sector
            
            ////Comienza Producto
            //index Producto
             'index_producto' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/lista-producto',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Producto',
                        'action' => 'index',
                    ),
                ),
            ),
            //seccion nuevo Producto
            'nuevo_producto' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/nuevo-producto',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Producto',
                        'action' => 'nuevo',
                    ),
                ),
            ),
            //Seccion editar Producto
            'editar_producto' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/editar-producto/:id',                    
                    'constraints' => array(
                        'id' => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Application\Controller\Producto',
                        'action' => 'editar',
                    ),
                ),
            ),
            //Eliminar Producto
            'eliminar_producto'=>array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=>array(
                    'route'=>'/eliminar-producto/:id',
                    'defaults'=>array(
                         'controller'=>'Application\Controller\Producto',
                         'action'=>'eliminar',
                    ),
                 ),
            ),
            //Termina eliminar sector
            
           
            

//Esto pertenece al Loguin y Logout
            'login' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/iniciar-sesion',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Empleado',
                        'action' => 'login',
                    ),
                ),
            ),
            
            'logout' => array(
                'type' => 'literal', // 'Zend\Mvc\Router\Http\Literal'
                'options' => array(
                    'route' => '/cerrar-sesion',
                    'defaults' => array(
                        'controller' => 'Application\Controller\Empleado',
                        'action' => 'logout',
                    ),
                ),
            ),
//Esto corresponde a Sanidad (Situacion Sanitaria)
             'sanidad'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/sanidad',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Sanidad
            'nuevo_S'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/ingresar-situacionsanitaria/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'nuevo',
                                    ),
                                ),
                            ),

            //Aqui a la vista de ver Sanidad
            'ver_S'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/ver-situacionsanitaria',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'vers',
                                    ),
                                ),
                            ),
                            
            //Aqui a la vista de modificar Sanidad
            'modS'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/mod-situacionsanitaria/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'mods',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Sanidad
            'delS'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/del-situacionSanitaria/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Sanidad',
                        'action'=>'dels',
                                    ),
                                ),
                            ),                           
//Esto corresponde a Economia (Situacion Economia)
             'economia'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/economia',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Economia
            'nuevoE'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/nuevoE/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'nuevoE',
                                    ),
                                ),
                            ),

            //Aqui a la vista de ver Economia
            'verE'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/verE',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'verE',
                                    ),
                                ),
                            ),
                            
 //Aqui a la vista de modificar Economia
            'modE'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/modE/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'modE',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Economia
            'delE'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/delE/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Economia',
                        'action'=>'delE',
                                    ),
                                ),
                            ),
//Esto corresponde a Vivienda (Situacion Vivienda)
             'vivienda'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/vivienda',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'index',
                                    ),
                                ),
                            ),
            //Aqui a la vista de nuevo Vivienda
            'nuevoviv'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/nuevoviv/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'nuevoviv',
                                    ),
                                ),
                            ),

            //Aqui a la vista de ver Vivienda
            'verviv'=> array(
                'type'=>'Zend\Mvc\Router\Http\Literal',
                'options'=> array(
                    'route' => '/verviv',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'verviv',
                                    ),
                                ),
                            ),
                            
 //Aqui a la vista de modificar Vivienda
            'modviv'=> array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                        'route' => '/modviv/:id',
                         'constraints' => array(
                            'id' => '[0-9]+',
                                ),
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'modviv',

                                    ),
                                ),
                            ),
            //Aqui a la vista de Eliminar Vivienda
            'delviv'=> array(
                'type'=>'Zend\Mvc\Router\Http\Segment',
                'options'=> array(
                    'route' => '/delviv/:id',
                    'defaults'=>array(
                        'controller'=>'Application\Controller\Vivienda',
                        'action'=>'delviv',
                                    ),
                                ),
                            ),




            // The following is a route to simplify getting started creating
            // new controllers and actions without needing to create a new
            // module. Simply drop new controllers in, and you can access them
            // using the path /application/:controller/:action
            'application' => array(
                'type'    => 'Literal',
                'options' => array(
                    'route'    => '/application',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Application\Controller',
                        'controller'    => 'Index',
                        'action'        => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'default' => array(
                        'type'    => 'Segment',
                        'options' => array(
                            'route'    => '/[:controller[/:action]]',
                            'constraints' => array(
                                'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                            ),
                            'defaults' => array(
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'Application\Controller\Index' => 'Application\Controller\IndexController',
            'Application\Controller\Beneficiario' => 'Application\Controller\BeneficiarioController',
            'Application\Controller\Producto' => 'Application\Controller\ProductoController',  
            'Application\Controller\Stock' => 'Application\Controller\StockController',
            'Application\Controller\Asistencia' => 'Application\Controller\AsistenciaController',
            'Application\Controller\Empleado' => 'Application\Controller\EmpleadoController',
            'Application\Controller\Familia' => 'Application\Controller\FamiliaController',
            'Application\Controller\Vivienda' => 'Application\Controller\ViviendaController',
            'Application\Controller\Economia'=> 'Application\Controller\EconomiaController',
            'Application\Controller\Sanidad'=> 'Application\Controller\SanidadController',
            'Application\Controller\Modulo'=> 'Application\Controller\ModuloController'


        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),

        'strategies' => array(
            'ViewJsonStrategy',
        ),        
    ),
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    
    'doctrine' => array(
        'driver' => array(
            // Definimos como y donde Doctrine va a parsear las configuracion de las entidades 
            'annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/Application/Entity',
                ),
            ),
            // Para la conexión que llamamos orm_default (la configuramos en doctrine.local.php)
            // declaramos los namespaces que vamos a usar y con que driver esta configurado.
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'annotation_driver'
                ),
            ),
        ),

        'authentication' => array(
            'orm_default' => array(
                'object_manager' => 'Doctrine\ORM\EntityManager',
                'identity_class' => 'Application\Entity\Empleado',
                'identity_property' => 'email',
                'credential_property' => 'contrasena',
                'credential_callable' => function(Application\Entity\Empleado $empleado, $password) {
                    return $empleado->hashPassword($password);
                }
            ),
        ),        
    ),    

    'view_helper_config' => array(
        'flashmessenger' => array(
            'message_open_format'      => '<div%s><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><ul><li>',
            'message_close_string'     => '</li></ul></div>',
            'message_separator_string' => '</li><li>'
        )
    ),    
);
