<?php

//clase creada por david
namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Empleado;
use Application\Entity\Admin;
use Application\Entity\MesaEntrada;
use Application\Entity\AsistenteSocial;
use Application\Entity\Director;
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
         $repositorioDirector  = $em->getRepository('Application\Entity\Director');

        $empleadoForm = new EmpleadoForm($em);      
        if(!$repositorioAdmin->existeAlgunAdmin()) {
            //el primer empledo registrado sera admin
           $empleado = new Admin();
        }
       
        if ($this->request->isPost()) {
            //recupero los datos del getPost objeto
            $data = $this->request->getPost();
            $arreglo = $data['empleado'];
            $idSector =$arreglo['sector'];
            //buscamos el sector
            $query1 = $em->createQueryBuilder()
                        ->select('s')
                        ->from('Application\Entity\Sector', 's')
                        ->where('s.id = ?1')
                        ->setParameter(1, $idSector)
                        ->getQuery();
            $arregloSector = $query1->getResult();
            $sector = $arregloSector[0]->getNombre();
                if($sector =='Mesa de Entrada') {
                    $empleado = new MesaEntrada();                        
                }elseif ($sector =='Asistente Social') {
                    $empleado = new AsistenteSocial();
                }elseif($sector =='Direccion'){
                    $empleado  = new Director();
                      //existe algun director              
                    if ($repositorioDirector->existeAlgunDirector()) {
                        $this->flashMessenger()->addErrorMessage('Ya existe el Director en la Plataforma');
                        return $this->redirect()->toRoute('index_empleado');
                    }
                }elseif($sector =='Admin'){
                                //existe algun admin
                    if($repositorioAdmin->existeAlgunAdmin()){
                        $this->flashMessenger()->addErrorMessage(
                            sprintf('Ya existe un Admin Plataforma de Política Sociales'));
                        return $this->redirect()->toRoute('index_empleado');
                    }
            }
            $empleadoForm->bind($empleado);
            $empleadoForm->setData($this->request->getPost());
            
            if ($empleadoForm->isValid()) {

                //recupero los datos del getPost objeto
                //////$data = $this->request->getPost();
                //obtengo el arreglo dentro del objeto
                //////$arreglo = $data['empleado'];
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
                    $this->flashMessenger()->addErrorMessage(
                        sprintf('Ya existe un empleado con el DNI "%s" en la Plataforma de Política Sociales', $dniNuevo));
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
                
                $adapter->setIdentityValue($data['email']);
                $adapter->setCredentialValue($data['password']);

                $authResult = $authService->authenticate();
                if ($authResult->isValid()) {
                    $this->redirect()->toRoute('home');
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

