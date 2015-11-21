<?php

namespace Application\Repository;

/**
 * Admin
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class Admin extends \Doctrine\ORM\EntityRepository
{
    public function getTotal()
    {
        $query = $this->_em->createQueryBuilder()
                ->select('count(a.id)')
                ->from('Application\Entity\Admin','a');
        $queryResult  = $query->getQuery();
    return (int) $queryResult->getSingleScalarResult();
    }
    
    public function existeAlgunAdmin()
    {
        $total = $this->getTotal();
        return $total > 0;
    }
}
