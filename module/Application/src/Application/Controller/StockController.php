<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class StockController extends AbstractActionController
{

    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $query  =$em->createQueryBuilder()
                    ->select('s')
                    ->from('Application\Entity\Stock','s')
                    ->orderBy('s.idStock','DESC')
                    ->getQuery();
        $stocks=$query->getResult();
        return new ViewModel([
            'stocks'=>$stocks,
        ]);
    }


}

