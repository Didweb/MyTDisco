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
); 

 public function getRutas()
{ 
 return $this->data; 
} 

} 

?>