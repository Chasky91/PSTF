<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\Validator\AbstractValidator;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Role\GenericRole as Role;
use Application\Entity\Admin;
use Application\Entity\Director;
use Application\Entity\MesaEntrada;
use Application\Entity\AsistenteSocial;



class Module
{
    const HTTP_PERMANENT_REDIRECT = 302;
    
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $this->inyectarUsuarioEnLayout($e);
        $this->setupTraduccionesDelValidador($e);
        //codigo agregado por david
        $this->setupAcl($e);
        $e->getApplication()->getEventManager()->attach('route',array($this, 'chequearAcl'));
    }

    protected function inyectarUsuarioEnLayout(MvcEvent $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $autenticacion = $serviceManager->get('Zend\Authentication\AuthenticationService');
        $vista = $e->getApplication()->getMvcEvent()->getViewModel();
        $vista->empleado = $autenticacion->getIdentity();         
    }

    protected function setupTraduccionesDelValidador(MvcEvent $e)
    {
        $translator = $e->getApplication()->getServiceManager()->get('translator');
        $translator->addTranslationFile(
            'phpArray',
            'vendor/zendframework/zendframework/resources/languages/es/Zend_Validate.php',
            'default',
            'es_ES'
        );
        AbstractValidator::setDefaultTranslator($translator);        
    }
    
    //funcion agregada por david
    public function setupAcl(MvcEvent $e) {
        
        //controla los rles de usuario
        $acl  = new Acl();
        
        $rolInvitado = new Role('invitado');
        $admin = new Admin();
        $director = new Director();
        $asistenteSocial = new AsistenteSocial();
        $mesaEntrada = new MesaEntrada();
        //agregamos  las entidades con roles
        $rolAdmin = new Role($admin->getRol());
        $rolDirector =new Role($director->getRol());
        $rolAsitenteSocial = new Role($asistenteSocial->getRol());
        $rolMesaEntrada = new Role($mesaEntrada->getRol());
        
        //agrego, roles
        $acl->addRole($rolInvitado);
        $acl->addRole($rolMesaEntrada,$rolInvitado);
        $acl->addRole($rolAsitenteSocial,$rolMesaEntrada);
        $acl->addRole($rolDirector,$rolAsitenteSocial);
        $acl->addRole($rolAdmin,$rolInvitado);//el admin hereda los permisos de invitado
        
        //seccon de login
        $acl->addResource('login');
        //Seccion empleado
        $acl->addResource('index_empleado');
        $acl->addResource('nuevo_empleado');        
        $acl->addResource('editar_empleado');
        $acl->addResource('eliminar_empleado');
        
         //seccion Asistencia mensual
         $acl->addResource('index_asistencia');
         $acl->addResource('nuevo_asistencia');
         $acl->addResource('editar_asistencia'); 
         $acl->addResource('pdfAsistencia');
         
         //seccion sector
         $acl->addResource('index_sector');
         $acl->addResource('nuevo_sector');
         $acl->addResource('editar_sector');
        

        //seccion beneficiario
        //index
        $acl->addResource('beneficiario');
        $acl->addResource('nuevo-beneficiario');
        $acl->addResource('ver-beneficiario');
        $acl->addResource('modbeneficiario');
        $acl->addResource('aprobar');
        $acl->addResource('rechazar');
        $acl->addResource('del-beneficiario');
        //seccion famila
        //index
        $acl->addResource('familia');
        $acl->addResource('nuevoFam');
        $acl->addResource('verFam');
        $acl->addResource('modFam');
        $acl->addResource('delFam');
        //seccion sanidad
        //index
        $acl->addResource('sanidad');
        $acl->addResource('nuevo_S');
        $acl->addResource('ver_S');
        $acl->addResource('modS');
        $acl->addResource('delS');
        //secion situacion economica
        //index
        $acl->addResource('economia');
        $acl->addResource('nuevoE');
        $acl->addResource('verE');
        $acl->addResource('modE');
        $acl->addResource('delE');
        
        //seccion vivienda
        //index
        $acl->addResource('vivienda');
        $acl->addResource('nuevoviv');
        $acl->addResource('verviv');
        $acl->addResource('modviv');
        $acl->addResource('delviv');

        ////////////////////////////////////////////
        //denegar a invitado para invitado/////////////
        //Seccion empleado     
        $acl->deny($rolInvitado,'index_empleado');
        $acl->deny($rolInvitado,'nuevo_empleado');
        $acl->deny($rolInvitado,'editar_empleado');
        $acl->deny($rolInvitado,'eliminar_empleado');
        //sector
        $acl->deny($rolInvitado,'index_sector');
        $acl->deny($rolInvitado,'nuevo_sector');
        $acl->deny($rolInvitado,'editar_sector');
        //asistencia
        $acl->deny($rolInvitado,'index_asistencia');
        $acl->deny($rolInvitado,'nuevo_asistencia');
        $acl->deny($rolInvitado,'editar_asistencia');
        $acl->deny($rolInvitado,'pdfAsistencia');
        ///beneficiario
        $acl->deny($rolInvitado,'beneficiario');
        $acl->deny($rolInvitado,'nuevo-beneficiario');
        $acl->deny($rolInvitado,'ver-beneficiario');
        $acl->deny($rolInvitado,'modbeneficiario');
        $acl->deny($rolInvitado,'del-beneficiario');
        ///familia
        $acl->deny($rolInvitado,'familia');
        $acl->deny($rolInvitado,'nuevoFam');
        $acl->deny($rolInvitado,'verFam');
        $acl->deny($rolInvitado,'modFam');
        $acl->deny($rolInvitado,'delFam');
        //sanidad
        $acl->deny($rolInvitado,'sanidad');
        $acl->deny($rolInvitado,'nuevo_S');
        $acl->deny($rolInvitado,'ver_S');
        $acl->deny($rolInvitado,'modS');
        $acl->deny($rolInvitado,'delS');
        //economia
        $acl->deny($rolInvitado,'economia');
        $acl->deny($rolInvitado,'nuevoE');
        $acl->deny($rolInvitado,'verE');
        $acl->deny($rolInvitado,'modE');
        $acl->deny($rolInvitado,'delE');
        //economia
        $acl->deny($rolInvitado,'economia');
        $acl->deny($rolInvitado,'nuevoE');
        $acl->deny($rolInvitado,'verE');
        $acl->deny($rolInvitado,'modE');
        $acl->deny($rolInvitado,'delE');
        //seccion vivienda
        $acl->deny($rolInvitado,'vivienda');
        $acl->deny($rolInvitado,'nuevoviv');
        $acl->deny($rolInvitado,'verviv');
        $acl->deny($rolInvitado,'modviv');
        $acl->deny($rolInvitado,'delviv');
      
//////////////////////////////////////////////
        //permitir a inviatdo
        //////////////////////
        $acl->allow($rolInvitado,'login');
        //permitir a Mesa de entrada
        $acl->allow($rolMesaEntrada,'beneficiario');
        $acl->allow($rolMesaEntrada,'nuevo-beneficiario');
        $acl->allow($rolMesaEntrada,'ver-beneficiario');
        $acl->allow($rolMesaEntrada,'modbeneficiario');
        $acl->allow($rolMesaEntrada,'index_asistencia');
        $acl->allow($rolMesaEntrada,'nuevo_asistencia');
        $acl->allow($rolMesaEntrada,'editar_asistencia');
        $acl->allow($rolMesaEntrada,'pdfAsistencia');
        
  ///////////////////////////////////////////////////      
        /////////////////////////////
        //asistentente social permisos
        $acl->allow($rolAsitenteSocial,'modbeneficiario');
        $acl->allow($rolAsitenteSocial,'del-beneficiario');
        //familia permisos        
        $acl->allow($rolAsitenteSocial,'familia');
        $acl->allow($rolAsitenteSocial,'nuevoFam');
        $acl->allow($rolAsitenteSocial,'verFam');
        $acl->allow($rolAsitenteSocial,'modFam');
        $acl->allow($rolAsitenteSocial,'delFam');
        //sanidad permisos
        $acl->allow($rolAsitenteSocial,'sanidad');
        $acl->allow($rolAsitenteSocial,'nuevo_S');
        $acl->allow($rolAsitenteSocial,'ver_S');
        $acl->allow($rolAsitenteSocial,'modS');
        $acl->allow($rolAsitenteSocial,'delS');
        //economia
        $acl->allow($rolAsitenteSocial,'economia');
        $acl->allow($rolAsitenteSocial,'nuevoE');
        $acl->allow($rolAsitenteSocial,'ver_S');
        $acl->allow($rolAsitenteSocial,'verE');
        $acl->allow($rolAsitenteSocial,'delE');

        //vivienda permisos
        $acl->allow($rolAsitenteSocial,'vivienda');
        $acl->allow($rolAsitenteSocial,'nuevoviv');
        $acl->allow($rolAsitenteSocial,'verviv');
        $acl->allow($rolAsitenteSocial,'modviv');
        $acl->allow($rolAsitenteSocial,'delviv');

        ///////////////////////////////////////////
        //director
        $acl->allow($rolDirector,'index_sector');
        $acl->allow($rolDirector,'nuevo_sector');
        $acl->allow($rolDirector,'index_empleado');
        $acl->allow($rolDirector,'nuevo_sector');
        $acl->allow($rolDirector,'editar_sector');
        
        ////Admin
        $acl->allow($rolAdmin,'index_empleado');
        $acl->allow($rolAdmin,'nuevo_empleado');
        $acl->allow($rolAdmin,'editar_empleado');
        $acl->allow($rolAdmin,'eliminar_empleado');
        $acl->allow($rolAdmin,'index_sector');
        $acl->allow($rolAdmin,'nuevo_sector');
        $acl->allow($rolAdmin,'editar_sector');
      
        $vista = $e->getApplication()->getMvcEvent()->getViewModel();
        $vista->acl=$acl;
        $this->acl = $acl;
        
    }
    
    public function chequearAcl(MvcEvent $e) {
        $serviceManager  =$e->getApplication()->getServiceManager();
        $autentication  =  $serviceManager->get('Zend\Authentication\AuthenticationService');
        $rol  =($empleado = $autentication->getIdentity())?
                    $empleado->getRol():
                        'invitado';
        $ruta = $e->getRouteMatch()->getMatchedRouteName();
        try {
            //var_dump($this->acl->isAllowed($rol, $ruta));die;
                if (!$this->acl->isAllowed($rol, $ruta)) {
                    $url=$e ->getRouter()->assemble(array(), array('name' => 'login'));
                    $response =  $e->getResponse();
                    $response->getHeaders()->addHeaderLine('Location', $url);
                    $response->setStatusCode(static::HTTP_PERMANENT_REDIRECT);
                    $response->sendHeaders();
                
                }
            
        } catch (\Zend\Permissions\Acl\Exception\InvalidArgumentException $e) {
            //perimiso de una ruta que no definimos
        }
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'Zend\Authentication\AuthenticationService' => function ($serviceManager) {
                return $serviceManager->get('doctrine.authenticationservice.orm_default');
            }
            )
        );
    }

}
