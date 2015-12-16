<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Sanidad;
use Application\Entity\Familia;
use Application\Entity\Beneficiario;
use Application\Entity\EstadoCivil;
use Application\Entity\Educacion;
use Application\Entity\Profesion;
use Application\Entity\Relacion;

use Application\Admin\Form\FormBen\nuevobForm;

class BeneficiarioController extends AbstractActionController
{

    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {
                                      $id=$this->params('id');

                                        //var_dump($id); echo "tiene ID"; die();
                                        $em = $this->getEntityManager();
                                      $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
                                        //var_dump($em); echo "pertenece EM"; die();
                                        $query = $em->createQueryBuilder()
                                                ->select('b')
                                                ->from('Application\Entity\Beneficiario', 'b')
                                                ->where('b.idBeneficiario = b')
                                                //->setParameter(3, $id)    
                                                ->getQuery();
                                               $p = $query->execute(); 
                                        
                                      $beneficiario = $query->getResult(); //devuelve un arreglo con objetos beneficiario            
        return new ViewModel([
            'beneficiario'=>$beneficiario,
        ]);
//var_dump($beneficiario); die();

    }

    public function nuevoAction()
    {
        $em = $this->getEntityManager(); //obtengo mi EM             
                                $form = new nuevobForm($em); //creo el objeto  formulario  
                                $beneficiario = new Beneficiario();      
                                $form->bind($beneficiario);

                                if ($this->request->isPost()) {
                                    //var_dump("llego"); die;
                                    $form->setData($this->request->getPost());
                                    if ($form->isValid()) {
                                        // EntityManager guardame el apunte
                                        
                                        $em->persist($beneficiario);
                                        // EntityManager aplicame todos los cambios!
                                        $em->flush();

                                        $this->flashMessenger()->addSuccessMessage('Nuevo Beneficiario registrado!');
                                        return $this->redirect()->toRoute('ver-beneficiario');
                                    }
                                }       
                                return new ViewModel(array(
                                    'form' => $form,
                                ));
    }

    public function verbenfAction()
    {
        $em = $this->getEntityManager();
                                        $query = $em->createQueryBuilder()
                                                ->select('b')
                                                ->from('Application\Entity\Beneficiario', 'b')
                                                ->orderBy('b.idBeneficiario', 'DESC')
                                                ->getQuery();

                                        $beneficiarios = $query->getResult(); //devuelve un arreglo con objetos beneficiario
                                        return new ViewModel([
                                            'beneficiarios'=>$beneficiarios,
                                        ]);
    }

    public function modificarAction()
    {
        $id= $this->params('id');
                                        $em = $this->getEntityManager();  
                                        $beneficiario = $em->find('Application\Entity\Beneficiario', $id);        
                                        $form = new nuevobForm($em); 
                                        $form->bind($beneficiario);




                                          if ($this->request->isPost()){
                                            $form->setData($this->request->getPost());
                                            
                                            if($form->isValid()) {
                                                
                                                $em->persist($beneficiario);
                                                $em->flush();
                                                
                                                    $this->flashMessenger()->addSuccessMessage(
                                                            sprintf('El beneficiario  fue actualizado correctamente', $beneficiario->getNombre()));
                                            
                                                    return $this->redirect()->toRoute('ver-beneficiario'); 
                                                                }        
                                                         }       


                                return new ViewModel([
                                    'beneficiario'=>$beneficiario,
                                    'form'=>$form,            
                                        ]);
    }

    public function eliminarAction()
    {
        $id=$this->params('id');      
                                $em=$this->getEntityManager();
                                $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
                                //Elimino a la entidad con entity
                                $em->remove($beneficiario);
                                $em->flush();            
                                
                                $this->flashMessenger()->addSuccessMessage('Beneficiario eliminado del sistema');            
                                return $this->redirect()->toRoute('ver-beneficiario');
    }

    public function aprobarAction()
    {
        $id=$this->params('id'); 
        //var_dump($id); echo "Aqui esta el ID";     die();
             $em=$this->getEntityManager();
                //var_dump($em); echo "Aqui esta el entiti manager";     die();
            $beneficiario=$em->find('Application\Entity\Beneficiario', $id);
                //Elimino a la entidad con entity
                 // var_dump($beneficiario); echo "hasta aqui llega";     die();
                //query update
                $qb = $em->createQueryBuilder();
                  $query = $qb->update('Application\Entity\Beneficiario', 'b')
                  ->set('b.estado', '?1')
                  ->where('b.idBeneficiario = ?3')
                  ->setParameter(1, 'Aprobado')
                  ->setParameter(3, $id)
                  ->getQuery();
                  $p = $query->execute(); 


             $this->flashMessenger()->addSuccessMessage('Beneficiario Aprobado');            
            return $this->redirect()->toRoute('ver-beneficiario');

    }
    public function rechazarAction()
    {
        $id=$this->params('id'); 
        //var_dump($id); echo "Aqui esta el ID";     die();
             $em=$this->getEntityManager();
                //var_dump($em); echo "Aqui esta el entiti manager";     die();
            $beneficiario=$em->find('Application\Entity\Beneficiario', $id);

                //query update
                $qb = $em->createQueryBuilder();
                  $query = $qb->update('Application\Entity\Beneficiario', 'b')
                  ->set('b.estado', '?1')
                  ->where('b.idBeneficiario = ?3')
                  ->setParameter(1, 'Rechazado')
                  ->setParameter(3, $id)
                  ->getQuery();
                  $p = $query->execute(); 


             $this->flashMessenger()->addSuccessMessage('Beneficiario Rechazado');            
            return $this->redirect()->toRoute('ver-beneficiario');
    }


}

