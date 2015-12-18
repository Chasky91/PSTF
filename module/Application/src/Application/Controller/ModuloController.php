<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Admin\Form\FormProductoDeModulo\ProductoDeModuloForm;
use Application\Admin\Form\FormModulo\ModuloForm;
use Application\Entity\Modulo;
use Application\Entity\Producto;
use Application\Entity\ProductosDeModulo;

class ModuloController extends AbstractActionController
{

    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
        $em = $this->getEntityManager();
        $query = $em->createQueryBuilder()
                ->select('lp')
                ->from('Application\Entity\ProductosDeModulo', 'lp')
                ->orderBy('lp.moduloId', 'DESC')
                ->getQuery();
        $lpenmodulos = $query->getResult();
        
        return new ViewModel([
            'lpenmodulos'=>$lpenmodulos,
        ]);

    }

    public function nuevoAction()
    {
        //llammos a la funcion entityManager
        $em = $this->getEntityManager();
        //creamos un nuevo formulario con un entity manager
        $moduloForm = new ModuloForm($em);

        $modulo = new Modulo();
        $moduloForm->bind($modulo);

        if($this->request->isPost()) {
            $moduloForm->setData($this->request->getPost());
            if($moduloForm->isValid()) {
                $em->persist($modulo);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Nuevo Modulo registrado!');
                return $this->redirect()->toRoute('index_producto_en_modulo');
            }
        }

        return new ViewModel([
            'form' => $moduloForm,
        ]);
    }

    public function cargarAction()
    {
        //ids recibidos desde lista de productos
        $id = $this->params('id'); 
        $idp = $this->params('idp');
                  
        $em = $this->getEntityManager();  
        $modulo = $em->find('Application\Entity\Modulo', $id);  
        $producto = $em->find('Application\Entity\Producto', $idp); 
        
        $productoDeModuloForm = new ProductoDeModuloForm ($em); 
        $productoDeModulo = new ProductosDeModulo();
        $productoDeModuloForm->bind($productoDeModulo);
        
          if ($this->request->isPost()){
            $productoDeModuloForm->setData($this->request->getPost());
            
            if($productoDeModuloForm->isValid()) {
                
                $em->persist($productoDeModulo);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage(
                            sprintf('Producto cargado correctamente'));
                    return $this->redirect()->toRoute('index_producto_en_modulo'); 
            }        
        }

        return new ViewModel([
            'modulo'=>$modulo,
            'producto'=>$producto,
            'form'=>$productoDeModuloForm,            
                ]);
    }


}

