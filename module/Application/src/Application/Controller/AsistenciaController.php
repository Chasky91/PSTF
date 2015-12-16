<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Registro;
use Application\Entity\Beneficiario;
use Application\Admin\Form\FormAsistencia\RegistroProductoForm;

class AsistenciaController extends AbstractActionController
{

    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
         $em = $this->getEntityManager();

        
        $id  = $this->params('planilla');
        //query para buscar al beneficiario
        $query = $em->createQueryBuilder()
                ->select('b')
                ->from('Application\Entity\Beneficiario', 'b')
                ->where('b.idBeneficiario = ?1')
                ->setParameter(1,$id)
                ->getQuery();
        $beneficiario = $query->getResult();
        
        //query para seleccionar todos los modulos habidos
        $queryModulo = $em->createQueryBuilder()
                ->select('m')
                ->from('Application\Entity\Modulo', 'm')
                ->orderBy('m.nombre', 'DESC')
                ->getQuery();

        $modulos = $queryModulo->getResult();
        
        //query para el innerjoin con producto
        $query2 = $em->createQueryBuilder()
                               ->select('r,p.nombre')
                               ->from('Application\Entity\Registro', 'r')
                               ->innerJoin('Application\Entity\Producto','p', 'WITH', 'r.itemId =p.id_producto')
                               ->where('r.tipo = ?1')
                               ->andWhere('r.beneficiarioId = ?2')
                               ->setParameter(1,'producto')
                               ->setParameter(2,$id)
                               ->getQuery();
        $registrosDeProductos = $query2->getResult();

        //query para el innerjoin con modulo
        $query3 = $em->createQueryBuilder()
                               ->select('r,m.nombre')
                               ->from('Application\Entity\Registro', 'r')
                               ->innerJoin('Application\Entity\Modulo','m', 'WITH', 'r.itemId =m.idModulo')
                               ->where('r.tipo = ?1')
                               ->andWhere('r.beneficiarioId = ?2')
                               ->setParameter(1,'modulo')
                               ->setParameter(2,$id)
                               ->getQuery();
        $registrosDeModulos = $query3->getResult();

        return new ViewModel([
            'beneficiario' =>$beneficiario,
            'registrosDeModulos' => $registrosDeProductos,
            'registrosDeProductos' =>$registrosDeModulos,
            'modulos' => $modulos
        ]);
    }

    public function asistenciaConProductoAction()
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
                return $this->redirect()->toRoute('index_asismen',array( 'planilla' => $id));
            }
        }
        return new ViewModel([
            'form'  => $registroProductoForm,
            'id' => $id
            
        ]);
    }

    public function asistenciaConModuloAction()
    {
        $id = $this->params('id');
        $idm =$this->params('idm');
        $em = $this->getEntityManager();
        //query para buscar el modulo        
        $query = $em->createQueryBuilder()
                ->select('m')
                ->from('Application\Entity\Modulo', 'm')
                ->where('m.idModulo = ?1')
                ->setParameter(1,$idm)
                ->getQuery();
        $modulo = $query->getResult();
        //obtenemos el id del modulo encontrado por el select
        $idModulo = $modulo[0]->getidModulo();
        
        $queryBeneficiario = $em->createQueryBuilder()
                ->select('b')
                ->from('Application\Entity\Beneficiario', 'b')
                ->where('b.idBeneficiario = ?1')
                ->setParameter(1,$id)
                ->getQuery();
        $beneficiario = $queryBeneficiario->getResult();

        //Renombramos la coincidencia encontrada por el select        
        $objectoBene = $beneficiario[0];
        
        $nuevoRegistro = new Registro();
        $nuevoRegistro->setItemId($idModulo);
        $nuevoRegistro->setTipo('modulo');
        $nuevoRegistro->setCantidad(1);
        $nuevoRegistro->setBeneficiarioId($objectoBene);

        $em->persist($nuevoRegistro);
        $em->flush();
                
            $this->flashMessenger()->addSuccessMessage('Nuevo Modulo!');
            return $this->redirect()->toRoute('index_asismen',array( 'planilla' => $id));
        return new ViewModel();
    }


}

