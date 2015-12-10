<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Application\Entity\Beneficiario;
use Application\Entity\Sanidad;
use Application\Entity\EstadoCivil;
use Application\Entity\Educacion;
use Application\Entity\Profesion;
use Application\Entity\Familia;
use Application\Entity\Relacion;
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
            //var_dump("llego"); die;
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
                // EntityManager guardame el apunte
                
                $em->persist($beneficiario);
                // EntityManager aplicame todos los cambios!
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Nuevo Beneficiario registrado!');
                return $this->redirect()->toRoute('ver-beneficiario');
            }
        }       
        return new ViewModel(array(
            'form' => $form,
        ));
    }

    public function verbenfAction()
    {
       $em = $this->getEntityManager();
                $query = $em->createQueryBuilder()
                        ->select('b')
                        ->from('Application\Entity\Beneficiario', 'b')
                        ->orderBy('b.idBeneficiario', 'DESC')
                        ->getQuery();

                $beneficiarios = $query->getResult(); //devuelve un arreglo con objetos beneficiario
                return new ViewModel([
                    'beneficiarios'=>$beneficiarios,
                ]);
    }

    public function modificarAction()
    {
              $id= $this->params('id');
                $em = $this->getEntityManager();  
                $beneficiario = $em->find('Application\Entity\Beneficiario', $id);        
                $form = new nuevobForm($em); 
                $form->bind($beneficiario);
                  if ($this->request->isPost()){
                    $form->setData($this->request->getPost());
                    
                    if($form->isValid()) {
                        
                        $em->persist($beneficiario);
                        $em->flush();
                        
                            $this->flashMessenger()->addSuccessMessage(
                                    sprintf('El beneficiario  fue actualizado correctamente', $beneficiario->getNombre()));
                    
                            return $this->redirect()->toRoute('ver-beneficiario'); 
                                        }        
                                 }       


        return new ViewModel([
            'beneficiario'=>$beneficiario,
            'form'=>$form,            
                ]);
    }

    public function eliminarAction()
    {
        
        $id=$this->params('id');      
        $em=$this->getEntityManager();
        $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
        //Elimino a la entidad con entity
        $em->remove($beneficiario);
        $em->flush();            
        
        $this->flashMessenger()->addSuccessMessage('Beneficiario eliminado del sistema');            
        return $this->redirect()->toRoute('ver-beneficiario');
        
         
        
    }


}

