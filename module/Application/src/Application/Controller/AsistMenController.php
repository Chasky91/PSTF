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
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('am')
                ->from('Application\Entity\AsistenciaMensual', 'am')
                ->orderBy('am.IdPlanilla', 'DESC')
                ->getQuery();
        $registros = $query->getResult();
        
        return new ViewModel([
            'registros'=>$registros,
        ]);
    }

    public function nuevoAction()
    {
        //hardcodeado
        $id = $this->params('id');
        $em = $this->getEntityManager();
        $beneficiario = $em->find('Application\Entity\Beneficiario', $id);  
        $asisMen = new AsistenciaMensual();
        $asisMenForm = new AsisMenForm($em);
        $asisMenForm->bind($asisMen);  

        $idRegistro = new \Application\Entity\Registro;
        //ingresamos un nuevo registro
        $em->persist($idRegistro);
        $em->flush();

        $query = $em->createQueryBuilder()
            ->select('r')
            ->from('Application\Entity\Registro', 'r')
            ->orderBy('r.idRegistro', 'DESC')
            ->setMaxResults('1')
            ->getQuery();
        $registro = $query->getResult();
   

        if($this->request->isPost()) {
            $asisMenForm->setData($this->request->getPost());

            if($asisMenForm->isValid()) {

                //$idR = $registro[0]->getidRegistro();
                //$asisMen->getRegistroId($idR); 
                var_dump($asisMen);die;
                $em->persist($asisMen);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Registro de asistencia guardado');
                return $this->redirect()->toRoute('index_asismen');
            }
        }


        return new ViewModel([
                'registro' => $registro,
                'beneficiario' => $beneficiario,
                'form' => $asisMenForm
            ]);
    }

    public function editarAction()
    {
        return new ViewModel();
    }


}