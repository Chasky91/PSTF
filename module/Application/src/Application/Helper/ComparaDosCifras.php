<?php

namespace Application\Helper;

class ComparaDosCifras
{
    protected $num;
    
    //comparamos con el objeto
     public function comparar($cifraUno, $cifraDos)  {
            //$mensaje = 'Stock estable';
         if($cifraUno <= $cifraDos) {
             $mensaje = 'Stock critico';
         }else{
             $mensaje = 'Stock estable';
         }
        return $mensaje;
    }
    
}
