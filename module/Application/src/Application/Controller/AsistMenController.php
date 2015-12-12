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

        if($this->request->isPost()) {
            $asisMenForm->setData($this->request->getPost());

            if($asisMenForm->isValid()) {

                $em->persist($asisMen);
                $em->flush();
                //obtenemos el ultimo registro en
                //la tabla AsistenciaMensual
                $query = $em->createQueryBuilder()
                    ->select('am')
                    ->from('Application\Entity\AsistenciaMensual', 'am')
                    ->orderBy('am.idRegistro', 'DESC')
                    ->setMaxResults('1')
                    ->getQuery();
                $ultimoRegistro = $query->getResult();
                $registro = $ultimoRegistro[0]->getIdRegistro();
                
                //codigo para hacer el insert en la tabla Planilla    
                $qb = $em->createQueryBuilder();
                $q = $qb->update('Application\Entity\Planilla', 'p')
                        ->set('p.idPlanilla', '?1')
                        ->set('p.registroId', '?2')
                        ->setParameter(1, $id)
                        ->setParameter(2, $registro)
                        ->getQuery();
                $p = $q->execute();
               

        

                $this->flashMessenger()->addSuccessMessage('Registro de asistencia guardado');
                return $this->redirect()->toRoute('index_asismen');
            }
        }


        return new ViewModel([
                'form' => $asisMenForm
            ]);
    }

    public function editarAction()
    {
        return new ViewModel();
    }


}