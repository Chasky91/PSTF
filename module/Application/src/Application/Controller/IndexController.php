<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DOMPDFModule\View\Model\PdfModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        return new ViewModel();
    }
    public function registroAction()
    {
        $pdf = new PdfModel();
        
        $this->layout(false);
                $pdf->setOption('filename', 'registro'); // Esta opcion fuerza la descarga del PDF.
                                                             // La extension ".pdf" se agrega automaticamente
                $pdf->setOption('paperOrintation', 'portrait'); //orientacion de la hoja
                $pdf->setOption('paperSize', 'a4'); // Tamaño del papel
         
                // Pasamos variables a la vista
                $pdf->setVariables(array(
                    'name'=>'Registro de Beneficiario'

                ));
         
                return $pdf;
    }


   /* //activamos las funcion de beneficiario y producto
    public function beneficiarioaction()
    {
    	return new ViewModel();
    	
    }
        public function productoaction()
    {
    	
    	return new ViewModel();
    }
    */
}
