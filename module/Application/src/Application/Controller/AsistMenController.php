<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\AsistenciaMensual;
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
        //hardcodeado
        $id = $this->params('1');
        $em = $this->getEntityManager();
        //hardcodeado
        $asisMen=$em->find('Application\Entity\Beneficiario','1');
        $asisMenForm = new AsisMenForm($em);
        $asisMenForm->bind($beneficiario);
        

        $asisMen = new AsistenciaMensual();
        $asisMenForm->bind($asisMen);

        if($this->request->isPost()) {
            $asisMenForm->setData($this->request->getPost());
            if($asisMenForm->isValid) {
                $em->persist($asisMen);
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