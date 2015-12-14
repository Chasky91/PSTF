<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\RegistroProducto;
use Application\Admin\Form\FormAsistencia\RegistroProductoForm;

class AsistenciaController extends AbstractActionController
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
        $id  = $this->params('id');
        $em = $this->getEntityManager();
        
        $registroProductoForm = new RegistroProductoForm($em);
        $registroProducto = new RegistroProducto();
        $registroProductoForm->bind($registroProducto);

        if($this->request->isPost()) {
            $registroProductoForm->setData($this->request->getPost());
            if($registroProductoForm->isValid()) {
                
                $em->persist($registroProducto);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Nuevo producto registrado!');
                return $this->redirect()->toRoute('index_producto');
            }
        }
        return new ViewModel([
            'form'  => $registroProductoForm
            
        ]);
    }


}

