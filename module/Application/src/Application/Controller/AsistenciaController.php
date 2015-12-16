<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Registro;
use Application\Admin\Form\FormAsistencia\RegistroProductoForm;

class AsistenciaController extends AbstractActionController
{
    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        $id  = $this->params('planilla');
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('b')
                ->from('Application\Entity\Beneficiario', 'b')
                ->where('b.idBeneficiario = ?1')
                ->setParameter(1,$id)
                ->getQuery();
        $beneficiario = $query->getResult();
        //query para el innerjoin
        $query2 = $em->createQueryBuilder()
                               ->select('r,p.nombre')
                               ->from('Application\Entity\Registro', 'r')
                               ->innerJoin('Application\Entity\Producto','p', 'WITH', 'r.itemId =p.id_producto')
                               ->where('r.tipo = ?1')
                               ->setParameter(1,'producto')
                               ->getQuery();
        $registrosDeModulos = $query2->getResult();

        return new ViewModel([
            'beneficiario' =>$beneficiario,
            'registrosDeModulos' => $registrosDeModulos
        ]);
    }


    public function nuevoAction()
    {
        $id  = $this->params('id');
        $em = $this->getEntityManager();
        
        $registroProductoForm = new RegistroProductoForm($em);
        $registro = new Registro();
        $registroProductoForm->bind($registro);

        if($this->request->isPost()) {
            $registroProductoForm->setData($this->request->getPost());
            if($registroProductoForm->isValid()) {

                $em->persist($registro);
                $em->flush();

                                
                $this->flashMessenger()->addSuccessMessage('Nuevo producto registrado!');
                return $this->redirect()->toRoute('index_producto');
            }
        }
        return new ViewModel([
            'form'  => $registroProductoForm,
            'id' => $id
            
        ]);
    }


}

