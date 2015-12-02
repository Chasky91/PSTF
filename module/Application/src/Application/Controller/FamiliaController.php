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


use DoctrineORMModule\Paginator\Adapter\DoctrinePaginator as DoctrineAdapter;
use Doctrine\ORM\Tools\Pagination\Paginator as OrmPaginator;
use Zend\Paginator\Paginator as ZfPaginator;

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

                //Si saco esto de id me salta otro error
                 $id=$this->params('id');      
                 $beneficiario=$em->find('Application\Entity\Beneficiario', $id);

        if ($this->request->isPost()) {
                    $form->setData($this->request->getPost());
                    if ($form->isValid()) {
                        // EntityManager guardame el apunte                      
                        $em->persist($familia);
                        // EntityManager aplicame todos los cambios!
                        $em->flush();

                        $this->flashMessenger()->addSuccessMessage('Nuevo Beneficiario registrado!');
                        return $this->redirect()->toRoute('verFam');
                    }
                }       
                return new ViewModel(array(
                    'form' => $form,
                ));
    

    }


    public function modificarAction()
    {
        return new ViewModel();
    }

    public function eliminarAction()
    {
        return new ViewModel();
    }

    public function verAction()
    {
               $em = $this->getEntityManager();
                $query = $em->createQueryBuilder()
                        ->select('b')
                        ->from('Application\Entity\Familia', 'b')
                        ->orderBy('b.nroF', 'DESC')
                        ->getQuery();

                $familias = $query->getResult(); //devuelve un arreglo con objetos beneficiario
                return new ViewModel([
                    'familias'=>$familias,
                ]);
    }


}

