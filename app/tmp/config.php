<?php

 class config 
 { 

 
 private $TmpUrl = "app/tmp/rutas.php";

 private $ConfigUrl = "config/rutas.yml";

 private $OtraRuta = "pitos";

 private $idiomas = "es,ca,en,fr,it";

 private $HOME_dev = "http://localhost/MyT/";

 private $HOME = "http://www.google.com/";

 private $zona1 = "/oficina/*,/getsor/";

 private $edu = "pass3:1";
 
 private $data = array (
  'RutasConfig' => 
  array (
    'TmpUrl' => 'app/tmp/rutas.php',
    'ConfigUrl' => 'config/rutas.yml',
    'OtraRuta' => 'pitos',
    'idiomas' => 'es,ca,en,fr,it',
    'HOME_dev' => 'http://localhost/MyT/',
    'HOME' => 'http://www.google.com/',
  ),
  'Seguridad' => 
  array (
    'zona1' => '/oficina/*,/getsor/',
    'edu' => 'pass3:1',
  ),
); 

 	 public function getConfig() { 
 	 	 return $this->data; 
 	 	 }  

  
 
 	 public function getTmpUrl() { 
 
 	 	 return $this->TmpUrl;  
  	 	 } 
  
 
 	 public function setTmpUrl($valor) { 
 
 	 	  $this->TmpUrl = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getConfigUrl() { 
 
 	 	 return $this->ConfigUrl;  
  	 	 } 
  
 
 	 public function setConfigUrl($valor) { 
 
 	 	  $this->ConfigUrl = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getOtraRuta() { 
 
 	 	 return $this->OtraRuta;  
  	 	 } 
  
 
 	 public function setOtraRuta($valor) { 
 
 	 	  $this->OtraRuta = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getIdiomas() { 
 
 	 	 return $this->idiomas;  
  	 	 } 
  
 
 	 public function setIdiomas($valor) { 
 
 	 	  $this->idiomas = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getHOME_dev() { 
 
 	 	 return $this->HOME_dev;  
  	 	 } 
  
 
 	 public function setHOME_dev($valor) { 
 
 	 	  $this->HOME_dev = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getHOME() { 
 
 	 	 return $this->HOME;  
  	 	 } 
  
 
 	 public function setHOME($valor) { 
 
 	 	  $this->HOME = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getZona1() { 
 
 	 	 return $this->zona1;  
  	 	 } 
  
 
 	 public function setZona1($valor) { 
 
 	 	  $this->zona1 = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getEdu() { 
 
 	 	 return $this->edu;  
  	 	 } 
  
 
 	 public function setEdu($valor) { 
 
 	 	  $this->edu = $valor;  
 
 	 	 return $this;  
  	 	 } 
  

} ?>