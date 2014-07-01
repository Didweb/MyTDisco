<?php

 class SeguridadConfig 
 { 

  
 private $data = array (
  'Seguridad' => 
  array (
    'zonas1' => 
    array (
      1 => '/getsor/',
    ),
    'usuarios' => 
    array (
      'edu' => 'pass3:1',
      'pepito' => 'pass2:1',
    ),
  ),
); 

 	 public function getSeguridadConfig() { 
 	 	 return $this->data; 
 	 	 }  

  

} ?>