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
                ->where('a.activo = 1')
                ->orderBy('a.id', 'DESC')
                ->getQuery();

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
                //recupero los datos del getPost objeto
                $data = $this->request->getPost();
                //obtengo el arreglo dentro del objeto
                $arreglo = $data['empleado'];
                //obtengo un item del arreglo
                $dni = $arreglo['dni'];
                //loconvierto a un dato tipo integer
                $dniNuevo = (int)$dni;
                //antes de ingresar los datos a nuevo empleado vemos si ya existe uno con el mismo dni
                $query = $em->createQueryBuilder()
                        ->select('e')
                        ->from('Application\Entity\Empleado', 'e')
                        ->where('e.dni = ?1')
                        ->setParameter(1, $dniNuevo)
                        ->getQuery();
                $dniEmpleado = $query->getResult();
                //si la consulta sql encuentra un registro el if para la ejecucion del codigo
                if (!empty($dniEmpleado)){
                    $this->flashMessenger()->addErrorMessage(sprintf('Ya existe un empleado con el DNI "%s" en la Plataforma de Política Sociales', $dniNuevo));
                    return $this->redirect()->toRoute('index_empleado');
                }
                
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
        $repositorio = $this->getEntityManager()->getRepository('Application\Entity\Empleado');
        $query = $repositorio->getQueryDarDeBaja($id);

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

