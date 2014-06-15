<?php

 class config 
 { 

 
 private $TmpUrl = "app/tmp/rutas.php";

 private $ConfigUrl = "config/rutas.yml";

 private $OtraRuta = "pitos";
 
 private $data = array (
  'RutasConfig' => 
  array (
    'TmpUrl' => 'app/tmp/rutas.php',
    'ConfigUrl' => 'config/rutas.yml',
    'OtraRuta' => 'pitos',
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