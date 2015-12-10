<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;


use Application\Entity\Sanidad;
use Application\Entity\Familia;
use Application\Entity\Beneficiario;
use Application\Entity\EstadoCivil;
use Application\Entity\Educacion;
use Application\Entity\Profesion;
use Application\Entity\Relacion;
use Application\Admin\Form\FormSan\sanForm;

class SanidadController extends AbstractActionController
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
        $form = new sanForm($em); //creo el objeto  formulario  
        $sanidad = new Sanidad();      
        $form->bind($sanidad);                        
       
        //Asi capturo el ID de beneficiario y se carga en la base de datos
        $id=$this->params('id');      
        $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
        //var_dump($beneficiario); die;
        $sanidad->setBeneficiario($beneficiario); 
        //var_dump($sanidad); die;       

        if ($this->request->isPost()) {           
            $form->setData($this->request->getPost());
            //var_dump($form);die;
            if ($form->isValid()) {                
                // EntityManager guardame el apunte
                
                $em->persist($sanidad);
                // EntityManager aplicame todos los cambios!
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Registro de Sanidad cargado');
                return $this->redirect()->toRoute('ver_S');
            }
        }       
        return new ViewModel(array(
            'form' => $form,
        ));
    }

    public function versAction()
    {
               $em = $this->getEntityManager();
                $query = $em->createQueryBuilder()
                        ->select('b')
                        ->from('Application\Entity\Sanidad', 'b')
                        ->orderBy('b.idSanidad', 'DESC')
                        ->getQuery();

                $sanidades = $query->getResult(); 

                //devuelve un arreglo con objetos beneficiario
                return new ViewModel([
                    'sanidades'=>$sanidades,
                ]);
    }

    public function modsAction()
    {
         $id= $this->params('id');
                        $em = $this->getEntityManager();  
                        $sanidad = $em->find('Application\Entity\Sanidad', $id);        
                        $form = new sanForm($em); 
                        $form->bind($sanidad);
                          if ($this->request->isPost()){
                            $form->setData($this->request->getPost());
                            
                            if($form->isValid()) {
                                
                                $em->persist($sanidad);
                                $em->flush();
                                
                                    $this->flashMessenger()->addSuccessMessage(
                                            sprintf('El registro de Sanidad fue actualizado correctamente', $sanidad->getIdSanidad()));
                            
                                    return $this->redirect()->toRoute('verFam'); 
                                                }        
                                         }       


                return new ViewModel([
                    'sanidad'=>$sanidad,
                    'form'=>$form,            
                        ]);
    }

    public function delsAction()
    {
        $id=$this->params('id');      
        $em=$this->getEntityManager();
        $sanidad=$em->find('Application\Entity\Sanidad', $id);
        //Elimino a la entidad con entity
        $em->remove($sanidad);
        $em->flush();            
        
        $this->flashMessenger()->addSuccessMessage('El Familiar fue eliminado del sistema');            
        return $this->redirect()->toRoute('ver_S');
    }


}

