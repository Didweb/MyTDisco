<?php

 class config 
 { 

 
 private $TmpUrl = "app/tmp/rutas.php";

 private $ConfigUrl = "config/rutas.yml";

 private $OtraRuta = "aluxxfzzzzztttttkkkkkk.php";
 
 private $data = array (
  'RutasConfig' => 
  array (
    'TmpUrl' => 'app/tmp/rutas.php',
    'ConfigUrl' => 'config/rutas.yml',
    'OtraRuta' => 'aluxxfzzzzztttttkkkkkk.php',
  ),
); 

 	 public function getConfig() { 
 	 	 return $this->data; 
 	 	 }  

  
 
 	 public function getTmpUrl() { 
 
 	 	 return $this->TmpUrl;  
  	 	 } 
  
 
 	 public function getConfigUrl() { 
 
 	 	 return $this->ConfigUrl;  
  	 	 } 
  
 
 	 public function getOtraRuta() { 
 
 	 	 return $this->OtraRuta;  
  	 	 } 
  

} ?>