<?php

//clase creada por david
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Empleado;
use Application\Entity\Admin;
use Application\Admin\Form\FormEmp\EmpleadoForm;
use Application\Admin\Form\FormEmp\LoginForm;


class EmpleadoController extends AbstractActionController
{

    
    
    protected function getEntityManager() 
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
    
    public function indexAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('a')
                ->from('Application\Entity\Empleado', 'a')
                ->orderBy('a.id', 'DESC')
                ->getQuery();
                
        /*$query = $em->createQueryBuilder()
                ->select('e,s.nombre as nombreSector')
                ->from('Application\Entity\Empleado','e')
                ->join('e.sector','s')
                ->orderBy('e.id','DESC')
                ->getQuery();*/
        $empleados = $query->getResult();
        return new ViewModel([
            'empleados'=>$empleados,
        ]);
    }

    public function editarAction()
    {
        $id = $this->params('id');
        $em = $this->getEntityManager();  
        $empleado = $em->find('Application\Entity\Empleado', $id);        
        $empleadoForm = new EmpleadoForm($em); 
        $empleadoForm->bind($empleado);
          if ($this->request->isPost()){
            $empleadoForm->setData($this->request->getPost());
            
            if($empleadoForm->isValid()) {
                
                $em->persist($empleado);
                $em->flush();
                
                    $this->flashMessenger()->addSuccessMessage(
                            sprintf('Empleado "%s" actualizado correctamente', $empleado->getNombre()));
                    return $this->redirect()->toRoute('index_empleado'); 
            }        
        }

        return new ViewModel([
            'empleado'=>$empleado,
            'form'=>$empleadoForm,            
                ]);
    }

        public function nuevoAction()   {
        $em = $this->getEntityManager();      
        $repositorioAdmin  = $em->getRepository('Application\Entity\Admin');
        $empleadoForm = new EmpleadoForm($em);                
        if($repositorioAdmin->existeAlgunAdmin()) {
            $empleado = new Empleado();
        }else{
            $empleado = new Admin();
        }
        $empleadoForm->bind($empleado);
        if ($this->request->isPost()) {
            $empleadoForm->setData($this->request->getPost());
            
            if ($empleadoForm->isValid()) {
                
                $password = $empleado->getContrasena();                
                $password = $empleado->hashPassword($password);
                $empleado->setContrasena($password);   
               
                $em->persist($empleado);               
                $em->flush();
                $this->flashMessenger()->addSuccessMessage('Empleado nuevo registrado!');
                return $this->redirect()->toRoute('index_empleado');
            }
        }       
        return new ViewModel(array(
            'form' => $empleadoForm,
        ));
    }
    public function eliminarAction()
    {
        
        $id=$this->params('id');        
        $em=$this->getEntityManager();
        $empleado=$em->find('Application\Entity\Empleado', $id);
     
        //Elimino a la entidad con entity
        $em->remove($empleado);
        $em->flush();            
        
        $this->flashMessenger()->addSuccessMessage('Empleado eliminado del sistema');            
        return $this->redirect()->toRoute('index_empleado');
        
         
        
    }
public function loginAction()
    {
        $form = new LoginForm();
        $vista = new ViewModel([
            'form' => $form,
            'mensaje' => false,
        ]);     

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
                $data = $this->getRequest()->getPost();
                $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
                $adapter = $authService->getAdapter();
               // var_dump($data['password']); die;
                $adapter->setIdentityValue($data['email']);
                $adapter->setCredentialValue($data['password']);
                $authResult = $authService->authenticate();
                //var_dump($authResult->isValid()); die;             
                if ($authResult->isValid()) {
                    //var_dump("usuario autenticado"); die;
                    $this->redirect()->toRoute('index_producto');
                } else {
                    //var_dump("no se autentico"); die;
                    $vista->mensaje = 'Usuario y/o contraseña incorrectos';
                }
            }
        }       
        return $vista;
    }
    
    public function logoutAction() {
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $authService->clearIdentity();
        $this->redirect()->toRoute('home');

    }


}

