<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Economia;
use Application\Admin\Form\FormEco\econForm;

class EconomiaController extends AbstractActionController
{
/*
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
*/
     protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        return new ViewModel();
    }

    public function nuevoEAction()
    {
        $em = $this->getEntityManager(); //obtengo mi EM             
        $form = new econForm($em); //creo el objeto  formulario  
        $economia = new Economia();      
        $form->bind($economia);                        
       
        //Asi capturo el ID de beneficiario y se carga en la base de datos
        $id=$this->params('id');      
        $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
        //var_dump($beneficiario); die;
        $economia->setBeneficiario($beneficiario); 
        //var_dump($sanidad); die;       

        if ($this->request->isPost()) {           
            $form->setData($this->request->getPost());
            //var_dump($form);die;
            if ($form->isValid()) {                
                // EntityManager guardame el apunte
                
                $em->persist($economia);
                // EntityManager aplicame todos los cambios!
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Registro de Situacion Económica cargado');
                return $this->redirect()->toRoute('verE');
            }
        }       
        return new ViewModel(array(
            'form' => $form,
        ));
    }

    public function verEAction()
    {
               $em = $this->getEntityManager();
                $query = $em->createQueryBuilder()
                        ->select('b')
                        ->from('Application\Entity\Economia', 'b')
                        ->orderBy('b.idEconomia', 'DESC')
                        ->getQuery();

                $economias = $query->getResult(); 

                //devuelve un arreglo con objetos beneficiario
                return new ViewModel([
                    'economias'=>$economias,
                ]);
    }

    public function modEAction()
    {
         $id= $this->params('id');
                        $em = $this->getEntityManager();  
                        $economia = $em->find('Application\Entity\Economia', $id);        
                        $form = new econForm($em); 
                        $form->bind($economia);
                          if ($this->request->isPost()){
                            $form->setData($this->request->getPost());
                            
                            if($form->isValid()) {
                                
                                $em->persist($economia);
                                $em->flush();
                                
                                    $this->flashMessenger()->addSuccessMessage(
                                            sprintf('El registro de Economia fue actualizado correctamente', $economia->getIdEconomia()));
                            
                                    return $this->redirect()->toRoute('verE'); 
                                                }        
                                         }       


                return new ViewModel([
                    'economia'=>$economia,
                    'form'=>$form,            
                        ]);
    }

    public function delEAction()
    {
        $id=$this->params('id');      
        $em=$this->getEntityManager();
        $economia=$em->find('Application\Entity\Economia', $id);
        //Elimino a la entidad con entity
        $em->remove($economia);
        $em->flush();            
        
        $this->flashMessenger()->addSuccessMessage('El registro de Situacion Económica fue eliminado del sistema');            
        return $this->redirect()->toRoute('verE');
    }


}

