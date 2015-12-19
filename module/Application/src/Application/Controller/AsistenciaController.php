<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\DetalleDeEntrega;
use Application\Admin\Form\FormAsistencia\DetalleDeEntregaForm;

class AsistenciaController extends AbstractActionController
{

    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();


        $id = $this->params('beneficiario');
        //codigo para buscar al beneficiario
        $beneficiario = $em->find('Application\Entity\Beneficiario', $id);

        //query para la lista de entregas a un beneficiario
        $queryListaEntregas = $em->createQueryBuilder()
                ->select('de')
                ->from('Application\Entity\DetalleDeEntrega', 'de')
                ->where('de.beneficiarioId = ?1')
                ->orderBy('de.idDetalle', 'DESC')
                ->setParameter(1,$id)
                ->getQuery();
        $entrega = $queryListaEntregas->getResult();
        return new ViewModel([
            'beneficiario' => $beneficiario,
            'entrega' =>$entrega
        ]);
    }

    public function nuevoAction()
    {
        $idbeneficiario = $this->params('id');
        $em = $this->getEntityManager();

        $detalleEntregaForm = new DetalleDeEntregaForm($em);
        $detalleEntrega = new DetalleDeEntrega();
        $detalleEntregaForm->bind($detalleEntrega);

        if ($this->request->isPost()) {
            $detalleEntregaForm->setData($this->request->getPost());
            if ($detalleEntregaForm->isValid()) {
                $em->persist($detalleEntrega);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Nuevo Detalle de Entrega Registrado!');
                return $this->redirect()->toRoute('index_asistencia',array('beneficiario'=>$idbeneficiario));
            }
        }

        return new ViewModel([
            'form' => $detalleEntregaForm,
            'idbeneficiario' =>$idbeneficiario
        ]);
    }

    public function editarAction()
    {
        //id del detalle de entrega
        $id = $this->params('id');
        $idBeneficiario =$this->params('idBeneficiario');
        $em  =$this->getEntityManager();
 
        $detalleDeEntrega = $em->find('Application\Entity\DetalleDeEntrega', $id);      
        $detalleForm = new DetalleDeEntregaForm($em); 
        $detalleForm->bind($detalleDeEntrega);
          if ($this->request->isPost()){
            $detalleForm->setData($this->request->getPost());
            
            if($detalleForm->isValid()) {
                
                $em->persist($detalleDeEntrega);
                $em->flush();
                
                    $this->flashMessenger()->addSuccessMessage(
                            sprintf('Detalle de entrega "%s" actualizado correctamente', $detalleDeEntrega->getIdDetalle()));
                    return $this->redirect()->toRoute('index_asistencia',array('beneficiario'=>$idBeneficiario)); 
            }        
        }

        return new ViewModel([
            'detalleEntrega'=>$detalleDeEntrega,
            'form'=>$detalleForm, 
            'idBeneficiario' =>$idBeneficiario
                ]);
    }


}

