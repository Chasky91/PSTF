<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\RegistroDeEntrega;
use Application\Admin\Form\FormAsistencia\RegistroDeEntregaForm;
use DOMPDFModule\View\Model\PdfModel;
use Zend\Mvc\MvcEvent;

class AsistenciaController extends AbstractActionController
{
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
                ->from('Application\Entity\RegistroDeEntrega', 'de')
                ->where('de.beneficiarioId = ?1')
                ->orderBy('de.idRegistro', 'DESC')
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

        $registroDeEntregaForm = new RegistroDeEntregaForm($em);
        $registroDeEntrega = new RegistroDeEntrega();
        $registroDeEntregaForm->bind($registroDeEntrega);

        if ($this->request->isPost()) {
            $registroDeEntregaForm->setData($this->request->getPost());
            if ($registroDeEntregaForm->isValid()) {
                $em->persist($registroDeEntrega);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Nuevo Registro de Entrega Registrado!');
                return $this->redirect()->toRoute('index_asistencia',array('beneficiario'=>$idbeneficiario));
            }
        }

        return new ViewModel([
            'form' => $registroDeEntregaForm,
            'idbeneficiario' =>$idbeneficiario
        ]);
    }

    public function editarAction()
    {
        //id del detalle de entrega
        $id = $this->params('id');
        $idBeneficiario =$this->params('idBeneficiario');
        $em  =$this->getEntityManager();
         
        $registroDeEntrega = $em->find('Application\Entity\RegistroDeEntrega', $id);      
        $registroDeEntregaForm = new RegistroDeEntregaForm($em); 
        $registroDeEntregaForm->bind($registroDeEntrega);
          if ($this->request->isPost()){
            $registroDeEntregaForm->setData($this->request->getPost());
            
            if($registroDeEntregaForm->isValid()) {
                
                $em->persist($registroDeEntrega);
                $em->flush();
                
                    $this->flashMessenger()->addSuccessMessage(
                            sprintf('Detalle de entrega "%s" actualizado correctamente', $registroDeEntrega->getIdRegistro()));
                    return $this->redirect()->toRoute('index_asistencia',array('beneficiario'=>$idBeneficiario)); 
            }        
        }

        return new ViewModel([
            'registroDeEntrega'=>$registroDeEntrega,
            'form'=>$registroDeEntregaForm, 
            'idBeneficiario' =>$idBeneficiario
                ]);
    }

    public function pdfAction()
    {
       $em = $this->getEntityManager();
        $id = $this->params('id');
        
         //codigo para buscar al beneficiario
        $beneficiario = $em->find('Application\Entity\Beneficiario', $id);

        //query para la lista de entregas a un beneficiario
        $queryListaEntregas = $em->createQueryBuilder()
                ->select('de')
                ->from('Application\Entity\$registroDeEntrega', 'de')
                ->where('de.beneficiarioId = ?1')
                ->orderBy('de.idRegistro', 'DESC')
                ->setParameter(1,$id)
                ->getQuery();
        $entrega = $queryListaEntregas->getResult();

        
        $pdf = new PdfModel();

        $pdf->setOption('filename', 'documentoPdf');//SEta opcion fuerza la descarga pdf
                                                                        //La extension pdf se agrega automaticamente
        $pdf->setOption('paperSize', 'a4');
        $pdf->setOption('paperOrientation', 'lanscape');
        
        //pasamos las variables a la vista
        $pdf->setVariables(array(
            'beneficiario' =>$beneficiario,
            'entrega' =>$entrega
        ));
        
        return $pdf;
    }


}

