<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Application\Entity\Sanidad;
use Application\Entity\Economia;
use Application\Entity\Vivienda;
use Application\Entity\Familia;
use Application\Entity\Beneficiario;
use Application\Entity\EstadoCivil;
use Application\Entity\Educacion;
use Application\Entity\Profesion;
use Application\Entity\Relacion;

use DOMPDFModule\View\Model\PdfModel;

use Application\Admin\Form\FormBen\nuevobForm;

class BeneficiarioController extends AbstractActionController
{

    protected function getEntityManager()
    {
        return $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
    }

    public function indexAction()
    {  
                  //para un beneficiario

                       $id  = $this->params('id');
                             $em = $this->getEntityManager();
                             $query3 = $em->createQueryBuilder()
                                ->select('b')
                                ->from('Application\Entity\Beneficiario', 'b')
                                ->where('b.idBeneficiario = ?1')
                                ->setParameter(1,$id)
                                ->getQuery();
                         $beneficiarioPrueba = $query3->getResult();                    
                         //var_dump($beneficiarioPrueba);die;

                            

                         $query4 = $em->createQueryBuilder()
                                ->select('f')
                                ->from('Application\Entity\Familia', 'f')
                                ->where('f.idben = ?1')
                                ->setParameter(1,$id)
                                ->getQuery();
                         $familias= $query4->getResult(); 
                         //var_dump(count($familias)); die();

                         $query5 = $em->createQueryBuilder()
                                ->select('e')
                                ->from('Application\Entity\Economia', 'e')
                                ->where('e.beneficiario = ?1')
                                ->setParameter(1,$id)
                                ->getQuery();
                         $economia= $query5->getResult(); 


                          $query6= $em->createQueryBuilder()
                                ->select('s')
                                ->from('Application\Entity\Sanidad', 's')
                                ->where('s.beneficiario = ?1')
                                ->setParameter(1,$id)
                                ->getQuery();
                         $sanidad= $query6->getResult(); 
                         
                          $query7= $em->createQueryBuilder()
                                ->select('v')
                                ->from('Application\Entity\Vivienda', 'v')
                                ->where('v.idben = ?1')
                                ->setParameter(1,$id)
                                ->getQuery();
                         $sanidad= $query7->getResult(); 

                         
           return new ViewModel([
                                    'beneficiarioPrueba'=>$beneficiarioPrueba,
                                    'familias'=>$familias,
                                    'economia'=>$economia,
                                    'sanidad'=>$sanidad,
                                    'vivienda'=>$vivienda,
                                ]);                  

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
    public function registroAction()
    {
        $pdf = new PdfModel();
        
        $this->layout(false);
                $pdf->setOption('filename', 'index'); // Esta opcion fuerza la descarga del PDF.
                                                             // La extension ".pdf" se agrega automaticamente
                $pdf->setOption('paperOrintation', 'portrait'); //orientacion de la hoja
                $pdf->setOption('paperSize', 'a4'); // Tamaño del papel
         
                // Pasamos variables a la vista
                $pdf->setVariables(array(
                    'name'=>'index'

                ));
         
                return $pdf;
    }





}

