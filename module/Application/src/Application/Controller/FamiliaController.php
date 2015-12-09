<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Application\Entity\Familia;
use Application\Entity\Beneficiario;
use Application\Entity\EstadoCivil;
use Application\Entity\Educacion;
use Application\Entity\Profesion;
use Application\Entity\Relacion;
use Application\Admin\Form\FormFam\famForm;


use Zend\Mvc\MvcEvent;
use DateTime;






class FamiliaController extends AbstractActionController
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

    public function nuevoAction()
    {
       $em = $this->getEntityManager(); //obtengo mi EM             
                $form = new famForm($em); //creo el objeto  formulario  
                $familia = new Familia();      
                $form->bind($familia);

                //Asi capturo el ID de beneficiario y se carga en la base de datos
                 $id=$this->params('id');      
                 $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
                 $familia->setIdben($beneficiario);
                
        if ($this->request->isPost()) {
                    $form->setData($this->request->getPost());
                    if ($form->isValid()) {
                        // EntityManager guardame el apunte                      
                        $em->persist($familia);
                        // EntityManager aplicame todos los cambios!
                        $em->flush();

                        $this->flashMessenger()->addSuccessMessage('Familiar registrado!');
                        return $this->redirect()->toRoute('verFam');
                    }
                }       
                return new ViewModel(array(
                    'form' => $form,
                ));
    

    }


    public function modificarAction()
    {
         $id= $this->params('id');
                        $em = $this->getEntityManager();  
                        $familia = $em->find('Application\Entity\Familia', $id);        
                        $form = new famForm($em); 
                        $form->bind($familia);
                          if ($this->request->isPost()){
                            $form->setData($this->request->getPost());
                            
                            if($form->isValid()) {
                                
                                $em->persist($familia);
                                $em->flush();
                                
                                    $this->flashMessenger()->addSuccessMessage(
                                            sprintf('El Familiar fue actualizado correctamente', $familia->getNombre()));
                            
                                    return $this->redirect()->toRoute('verFam'); 
                                                }        
                                         }       


                return new ViewModel([
                    'famlia'=>$famlia,
                    'form'=>$form,            
                        ]);
    }

    public function eliminarAction()
    {
        $id=$this->params('id');      
        $em=$this->getEntityManager();
        $familia=$em->find('Application\Entity\Familia', $id);
        //Elimino a la entidad con entity
        $em->remove($familia);
        $em->flush();            
        
        $this->flashMessenger()->addSuccessMessage('El Familiar fue eliminado del sistema');            
        return $this->redirect()->toRoute('verFam');
        
    }

    public function verAction()
    {
               $em = $this->getEntityManager();
                $query = $em->createQueryBuilder()
                        ->select('b')
                        ->from('Application\Entity\Familia', 'b')
                        ->orderBy('b.nroF', 'DESC')
                        ->getQuery();

                $familias = $query->getResult(); 

                //devuelve un arreglo con objetos beneficiario
                return new ViewModel([
                    'familias'=>$familias,
                ]);
    }


}

