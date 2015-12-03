<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\AsistenciaMenesual;
use Application\Admin\Form\FormAsisMensual\AsisMenForm;


class AsistMenController extends AbstractActionController
{

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

        $em = $this->getEntityManager();
        //var_dump($em);die;
        $asisMenForm = new AsisMenForm($em);

        $asisMen = new AsistenciaMenesual();
        $asisMenForm->bind($asisMen);

        if($this->request->isPost()) {
            $asisMenForm->setData($this->request->getPost());
            if($asisMenForm->isValid) {
                $em->persist($AsistenciaMenesual);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Registro de asistencia guardado');
                return $this->redirect()->toRoute();
            }
        }


        return new ViewModel();
    }

    public function editarAction()
    {
        return new ViewModel();
    }


}