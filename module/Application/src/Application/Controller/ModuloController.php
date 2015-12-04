<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Modulo;
use Application\Admin\Form\FormModulo\ModuloForm;

class ModuloController extends AbstractActionController
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
        //llammos a la funcion entityManager
        $em = $this->getEntityManager();
        //creamos un nuevo formulario con un entity manager
        $moduloForm = new ModuloForm($em);

        $modulo = new Modulo();
        $moduloForm->bind($modulo);

        if($this->request->isPost()) {
            $moduloForm->setData($this->request->getPost());
            if($moduloForm->isValid()) {
                var_dump($modulo);die;

                $this->flashMessenger()->addSuccessMessage('Nuevo Modulo registrado!');
                return $this->redirect()->toRoute('index_producto');
            }
        }

        return new ViewModel([
            'form' => $moduloForm,
        ]);
        return new ViewModel();
    }


}

