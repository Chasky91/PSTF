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
use Application\Entity\Empleado;
use Application\Entity\Admin;
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
        
        $acl  = new Acl();
        
        $rolInvitado = new Role('invitado');
        $admin = new Admin();
        $rolAdmin = new Role($admin->getRol());
        
        $acl->addRole($rolInvitado);
        $acl->addRole($rolAdmin,$rolInvitado);//el admin hereda los permisos de invitado
        
        $acl->addResource('index_empleado');
        $acl->addResource('login');
        
        $acl->deny($rolInvitado,'index_empleado');
        $acl->allow($rolInvitado,'login');
        //$acl->allow($rolAdmin, 'login');
        $acl->allow($rolAdmin,'index_empleado');
        
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
