<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Application\Entity\Beneficiario;
use Application\Entity\EstadoCivil;
use Application\Entity\Educacion;
use Application\Entity\Profesion;
use Application\Admin\Form\FormBen\nuevobForm;


use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as OrmPaginator;
use Zend\Paginator\Paginator as ZfPaginator;

use Zend\Mvc\MvcEvent;
use DateTime;

class BeneficiarioController extends AbstractActionController
{
    public function __construct()
    {
        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'checkLogin'));
    }

    public function checkLogin()
    {
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $empleado = $authService->getIdentity();        
        if (!$authService->getIdentity()) {
            return $this->redirect()->toRoute('login');
        }
    }

     protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function nuevoAction()
    {    
       
        $em = $this->getEntityManager(); //obtengo mi EM             
                $form = new nuevobForm($em); //creo el objeto  formulario  
                $beneficiario = new Beneficiario();      
                $form->bind($beneficiario);

        if ($this->request->isPost()) {
                    $form->setData($this->request->getPost());
                    if ($form->isValid()) {
                        // EntityManager guardame el apunte
                        $em->persist($beneficiario);
                        // EntityManager aplicame todos los cambios!
                        $em->flush();

                        $this->flashMessenger()->addSuccessMessage('Nuevo Beneficiario registrado!');
                        return $this->redirect()->toRoute('home');
                    }
                }       
                return new ViewModel(array(
                    'form' => $form,
                ));
    }

/*
       
        if ($this->request->isPost()){ //si hizo el submito en el formulario
            
            $form->setData($this->request->getPost());
            $data=$this->request->getPost(); //obtiene los datos del formulario
            //var_dump($data); die;
            //var_dump($data->beneficiario['dni']);die;           
            //var_dump($beneficiario); die;
            $beneficiario->setDni ($data->beneficiario['dni']);
            $beneficiario->setNombre ($data->beneficiario['nombre']);
            $beneficiario->setApellido ($data->beneficiario['apellido']);   
            $beneficiario->setLugnac ($data->beneficiario['lugnac']); 
            $beneficiario->setFechanac($data->beneficiario['fechanac']);
        
  
            $idEstado = ($data->beneficiario['estado_civil']); 
            //$idEstado = ($data->beneficiario->getEstadoCivil());
            //var_dump($idEstado); die;           
            $estado_civil= $em->find('Application\Entity\EstadoCivil', $idEstado); 
            $beneficiario->setEstadoCivil($estado_civil);
            //var_dump($estado_civil->getDescripcion()); die;



            $beneficiario->setdomben ($data->beneficiario['domben']);
            $beneficiario->setresben ($data->beneficiario['resben']);
            $beneficiario->settelfben ($data->beneficiario['telfben']);           
            
           

            $idEducacion = ($data->beneficiario['educacion']);            
            $educacion = $em->find('Application\Entity\Educacion', $idEducacion); 
            $beneficiario->setEducacion($educacion);
            //var_dump($educacion->getDescripcion()); die;


            $idProfesion = ($data->beneficiario['profession']);   
            //var_dump($idProfesion); die;         
            $profession = $em->find('Application\Entity\Profesion', $idProfesion);             
            $beneficiario->setProfession($profession);
          // var_dump($profession->getDescripcion());die;
           
            $em->persist($beneficiario); //persiste los datos
            $em->flush();

            return $this->redirect()->toRoute('ver-beneficiario');
        }

        return new ViewModel(array(            
            'form'=>$form,            
            ));
    }
    */

    public function verbenfAction()
    {
        return new ViewModel();
    }

    public function modificarAction()
    {
        return new ViewModel();
    }

    public function eliminarAction()
    {
        return new ViewModel();
    }


}

