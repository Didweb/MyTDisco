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
      'edu' => 'e3f96800b051602e7ac5542e01747eb09147a54b:1',
      'pepito' => '5d212bd2fed57636c27d15965598817b1e45d3ca:1',
    ),
  ),
); 

 	 public function getSeguridadConfig() { 
 	 	 return $this->data; 
 	 	 }  

  

} ?>