<?php

 class config 
 { 

 
 private $TmpUrl = "app/tmp/rutas.php";

 private $ConfigUrl = "config/rutas.yml";

 private $OtraRuta = "pitosxxx";

 private $idiomas = "es,ca,en,fr,it";

 private $estilo = "iso";

 private $HOME_dev = "http://localhost/MyT/";

 private $HOME = "http://www.google.com/";

 private $Seguridad = "1";
 
 private $data = array (
  'Configuracion' => 
  array (
    'TmpUrl' => 'app/tmp/rutas.php',
    'ConfigUrl' => 'config/rutas.yml',
    'OtraRuta' => 'pitosxxx',
    'idiomas' => 'es,ca,en,fr,it',
    'estilo' => 'iso',
    'HOME_dev' => 'http://localhost/MyT/',
    'HOME' => 'http://www.google.com/',
    'Seguridad' => 1,
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
  
 
 	 public function getEstilo() { 
 
 	 	 return $this->estilo;  
  	 	 } 
  
 
 	 public function setEstilo($valor) { 
 
 	 	  $this->estilo = $valor;  
 
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
  
 
 	 public function getSeguridad() { 
 
 	 	 return $this->Seguridad;  
  	 	 } 
  
 
 	 public function setSeguridad($valor) { 
 
 	 	  $this->Seguridad = $valor;  
 
 	 	 return $this;  
  	 	 } 
  

} ?>