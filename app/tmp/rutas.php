<?php

 class rutas 
 { 

 private $data = array (
  'ruta_uno' => 
  array (
    'url' => 'pato/dos',
    'controller' => 'Index',
  ),
  'ruta_dos' => 
  array (
    'url' => 'POLKA',
    'controller' => 'MusicaPolka',
  ),
  'ruta_tres' => 
  array (
    'url' => 'pluma',
    'controller' => 'Pluma',
  ),
  'ruta_cuatro' => 
  array (
    'url' => 'pupa',
    'conroller' => 'Pupa',
  ),
); 

 public function getRutas()
{ 
 return $this->data; 
} 

} 

?>