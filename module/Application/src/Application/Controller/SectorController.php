<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Sector;
use Application\Admin\Form\FormSector\SectorForm;

use Zend\Mvc\MvcEvent;


class SectorController extends AbstractActionController
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
    
    protected function getEntityManager() {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }
    
    public function indexAction()
    {
        $em = $this->getEntityManager();
        $query  =$em->createQueryBuilder()
                ->select('a')
                ->from('Application\Entity\Sector', 'a')
                ->orderBy('a.id','DESC')
                ->getQuery();   
        $sectores = $query->getResult();
        return new ViewModel([
            'sectores' => $sectores,
        ]);
    }

    public function nuevoAction()
    {
        $em = $this->getEntityManager();
        $sectorForm = new SectorForm($em);
        $sector = new Sector();
        $sectorForm->bind($sector);
        
        if($this->request->isPost()) {
                $sectorForm->setData($this->request->getPost());
                if($sectorForm->isValid()) {
                    $em->persist($sector);
                    $em->flush();
                    
                    $this->flashMessenger()->addSuccessMessage('Nuevo sector creado!');
                    return $this->redirect()->toRoute('index_sector');
                }
        }
        return new ViewModel([
            'form' => $sectorForm,
        ]);
    }

    public function editarAction()
    {
        $id  =$this->params('id');
        $em  = $this->getEntityManager();
        $sector = $em->find('Application\Entity\Sector', $id);
        $sectorForm = new SectorForm($em);
        $sectorForm->bind($sector);
        
        if($this->request->isPost()) {
            $sectorForm->setData($this->request->getPost());
            
            if($sectorForm->isValid()) {
                
                $em->persist($sector);
                $em->flush();
                
                $this->flashMessenger()->addSuccessMessage(
                        sprintf('Sector "%s" actualizado correctamente',$sector->getId()));
                
                return $this->redirect()->toRoute('index_sector');
            }
        }
        
        return new ViewModel([
            'sector' => $sector,
            'formSector' => $sectorForm,
        ]);
    }
        
    public function eliminarAction()
    {
        $id = $this->params('id');
        
        $em  = $this->getEntityManager();
        $sector  =$em->find('Application\Entity\Sector',$id);
        
        $em->remove($sector);
        $em->flush();
        
        $this->flashMessenger()->addSuccessMessage('Sector eliminado del sistema');
        return $this->redirect()->toRoute('index_sector');
    }
}
