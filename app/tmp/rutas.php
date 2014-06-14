<?php

 class rutas 
 { 

 private $data = array (
  'ruta_uno' => 
  array (
    'url' => 'pato/dos',
    'controller' => 'Index::index2',
  ),
  'ruta_dos' => 
  array (
    'url' => 'POLKAXY',
    'controller' => 'Index::indexpolka',
  ),
  'ruta_tres' => 
  array (
    'url' => 'pluma',
    'controller' => 'Pluma::po',
  ),
  'ruta_cuatro' => 
  array (
    'url' => 'pupa',
    'conroller' => 'Pupa::pa',
  ),
); 

 public function getRutas()
{ 
 return $this->data; 
} 

} 

?>