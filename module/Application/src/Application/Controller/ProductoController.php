<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Producto;
use Application\Admin\Form\FormProducto\ProductoForm;
use Application\Helper\ComparaDosCifras;
//moulo para utenticcion
use Zend\Mvc\MvcEvent;

class ProductoController extends AbstractActionController
{

    public function __construct()
    {
        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'checkLogin'));
    }

    public function checkLogin()
    {   
        $authService = $this->getServiceLocator()->get('Zend\Authentication\AuthenticationService');
        $empleado = $authService->getIdentity();
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
        $query  = $em->createQueryBuilder()
                ->select('a')
                ->from('Application\Entity\Producto', 'a')
                ->where('a.activo = 1')
                ->orderBy('a.id_producto','DESC')
                ->getQuery();
        $productos  = $query->getResult();


        $comparar = new ComparaDosCifras();
        return new ViewModel([
            'productos'=>$productos,
            'comparar' => $comparar
        ]);
    }

    public function nuevoAction()
    {
        //llammos a la funcion entityManager
        $em = $this->getEntityManager();
        //creamos un nuevo formulario con un entity manager
        $productoForm = new ProductoForm($em);
        $producto = new Producto();
        $productoForm->bind($producto);

        if($this->request->isPost()) {
            $productoForm->setData($this->request->getPost());
            if($productoForm->isValid()) {
                $em->persist($producto);
                $em->flush();

                $this->flashMessenger()->addSuccessMessage('Nuevo producto registrado!');
                return $this->redirect()->toRoute('index_producto');
            }
        }

        return new ViewModel([
            'form' => $productoForm,
        ]);
    }

    public function editarAction()
    {
        $id = $this->params('id');
        $em = $this->getEntityManager();
        $producto = $em->find('Application\Entity\Producto', $id);
        $productoForm = new ProductoForm($em);
        $productoForm->bind($producto);
        if($this->request->isPost()) {
            
            $productoForm->setData($this->request->getPost());
            
            if($productoForm->isValid()) {
                
                $em->persist($producto);
                $em->flush();
                
                $this->flashMessenger()->addSuccessMessage(
                        sprintf('Producto "%s" actualizado correctamente',$producto->getIdProducto()));
                
                return $this->redirect()->toRoute('index_producto');
            }   
        }
        return new ViewModel([
            'producto'=>$producto,
            'form'=>$productoForm,
        ]);
    }

    public function eliminarAction()
    {
        $id = $this->params('id');
        $repositorio = $this->getEntityManager()->getRepository('Application\Entity\Producto');
        $query = $repositorio->getQueryDarDeBaja($id);        
        $this->flashMessenger()->addSuccessMessage('Producto eliminado del sistema');
        return $this->redirect()->toRoute('index_producto');
    }


}

