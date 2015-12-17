<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Vivienda;
use Application\Entity\Beneficiario;
use Application\Admin\Form\FormViv\vivForm;
class ViviendaController extends AbstractActionController
{
        /*public function __construct()
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
    }*/

     protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
    public function indexAction()
    {
        return new ViewModel();
    }

    public function nuevovivAction()
    {
        $em = $this->getEntityManager(); //obtengo mi EM             
        $form = new vivForm($em); //creo el objeto  formulario  
        $vivienda = new Vivienda();      
        $form->bind($vivienda);                        
       
        //Asi capturo el ID de beneficiario y se carga en la base de datos
        $id=$this->params('id');      
        $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
        //var_dump($beneficiario); die;
        $vivienda->setIdben($beneficiario); 
        //var_dump($vivienda); die;       

        if ($this->request->isPost()) {           
            $form->setData($this->request->getPost());
            //var_dump($form);die;
            if ($form->isValid()) {                
                // EntityManager guardame el apunte
                
                $em->persist($vivienda);
                // EntityManager aplicame todos los cambios!
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Registro de Situacion Habitacional cargado');
                return $this->redirect()->toRoute('verviv');
            }
        }       
        return new ViewModel(array(
            'form' => $form,
        ));
    }

    public function modvivAction()
    {
         $id= $this->params('id');
                        $em = $this->getEntityManager();  
                        $vivienda = $em->find('Application\Entity\Vivienda', $id);        
                        $form = new vivForm($em); 
                        $form->bind($vivienda);
                          if ($this->request->isPost()){
                            $form->setData($this->request->getPost());
                            
                            if($form->isValid()) {
                                
                                $em->persist($vivienda);
                                $em->flush();
                                
                                    $this->flashMessenger()->addSuccessMessage(
                                            sprintf('El registro de Siatuacion Habitacional fue actualizado correctamente', $sanidad->getIdSanidad()));
                            
                                    return $this->redirect()->toRoute('verviv'); 
                                                }        
                                         }       


                return new ViewModel([
                    'vivienda'=>$vivienda,
                    'form'=>$form,            
                        ]);
    }

    public function vervivAction()
    {
               $em = $this->getEntityManager();
                $query = $em->createQueryBuilder()
                        ->select('b')
                        ->from('Application\Entity\Vivienda', 'b')
                        ->orderBy('b.idVivienda', 'DESC')
                        ->getQuery();

                $viviendas = $query->getResult(); 

                //devuelve un arreglo con objetos beneficiario
                return new ViewModel([
                    'viviendas'=>$viviendas,
                ]);
    }

    public function delvivAction()
    
    {
        $id=$this->params('id');      
        $em=$this->getEntityManager();
        $vivienda=$em->find('Application\Entity\Vivienda', $id);
        //Elimino a la entidad con entity
        $em->remove($vivienda);
        $em->flush();            
        
        $this->flashMessenger()->addSuccessMessage('El registro de Situacion Habitacional fue eliminado del sistema');            
        return $this->redirect()->toRoute('verviv');
    }


}

