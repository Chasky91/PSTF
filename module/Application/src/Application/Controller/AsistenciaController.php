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
        //id de beneficiario
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
                $data = $this->request->getPost();
                $arreglo = $data['registro-producto'];
                //cantidad ingresada al nuevo registro
                    
                //recupero cantidad del array
                $cant = $arreglo['cantidad'];
                $cantidad = (int)$cant;
                //recupero el itemId
                $item = $arreglo['itemId'];
                $itemAsis = (int)$item;
                //query para actualizar el Stock del producto
                $queryActulizarStock = $em->createQueryBuilder()
                        ->update('Application\Entity\Producto', 'p')
                        ->set('p.cantidad', 'p.cantidad - ?1')
                        ->where('p.id_producto = ?2')
                        ->setParameter(1, $cantidad)
                        ->setParameter(2, $itemAsis)
                        ->getQuery();
                $ejecutarDescuento = $queryActulizarStock->execute();

                                
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
               
        //seleccionamos los producto en modulo, solo los coincidentes con el id
        $selectPdeM = $em->createQueryBuilder()
                ->select('pdm')
                ->from('Application\Entity\ProductosDeModulo', 'pdm')
                ->where('pdm.moduloId = ?1')
                ->setParameter(1,$idm)
                ->getQuery();
        $listaDeProductos = $selectPdeM->getResult();
        
        
        
        //var_dump($listaDeProductos[0]->getIdProducto());die;
        //var_dump($listaDeProductos[0]->getIdProducto(),$producto->getCantidad());die;
        
        for($i = 0; $i < count($listaDeProductos);$i++){
            
            $cantidadEnModulo = $listaDeProductos[$i]->getCantidad();
            $producto  = $listaDeProductos[$i]->getIdProducto();
            $cantidadEnProducto  = $producto->getCantidad();
            if ( $cantidadEnProducto < $cantidadEnModulo ){
                $this->flashMessenger()->addErrorMessage('No se puede entregar el modulo por falta del producto ',$producto,'');
                return $this->redirect()->toRoute('index_asismen', array('planilla' => $id));
            }
        }
        
        for ($i = 0; $i < count($listaDeProductos); $i++) {
            $descontarProductos = $em->createQueryBuilder()
                    ->update('Application\Entity\Producto', 'p')
                    ->set('p.cantidad', 'p.cantidad - ?1')
                    ->where('p.id_producto = ?2')
                    ->setParameter(1, $listaDeProductos[$i]->getCantidad())
                    ->setParameter(2, $listaDeProductos[$i]->getIdProducto())
                    ->getQuery();
            $ejecutarActualizacion= $descontarProductos->execute();
        }
        
         //query para beneficiario
        $queryBeneficiario = $em->createQueryBuilder()
                ->select('b')
                ->from('Application\Entity\Beneficiario', 'b')
                ->where('b.idBeneficiario = ?1')
                ->setParameter(1,$id)
                ->getQuery();
        $beneficiario = $queryBeneficiario->getResult();

        //Renombramos la coincidencia encontrada por el select        
        $objectoBene = $beneficiario[0];
        
        //insertamos manualmenteel registro
        $nuevoRegistro = new Registro();
        $nuevoRegistro->setItemId($idModulo);
        $nuevoRegistro->setTipo('modulo');
        $nuevoRegistro->setCantidad(1);
        $nuevoRegistro->setBeneficiarioId($objectoBene);

        $em->persist($nuevoRegistro);
        $em->flush();
                
            $this->flashMessenger()->addSuccessMessage('Nuevo Modulo Registrado!');
            return $this->redirect()->toRoute('index_asismen',array( 'planilla' => $id));
        return new ViewModel();
    }


}

