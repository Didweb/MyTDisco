<?php

 class config 
 { 

 
 private $TmpUrl = "app/tmp/rutas.php";

 private $ConfigUrl = "config/rutas.yml";

 private $OtraRuta = "pitosxxx";

 private $versiongestor = "2.0.0";

 private $creado = "Did-web.com";

 private $licencia = "GPL3";

 private $cliente = "WebCliente.com";

 private $webcliente = "http://www.webcliente.com";

 private $webcmyt = "https://github.com/Didweb/MyT";

 private $webcreador = "http://www.did-web.com";

 private $idiomas = "es,ca,en";

 private $estilo = "img";

 private $HOME_dev = "http://localhost/MyT/";

 private $HOME = "http://www.google.com/";

 private $Seguridad = "1";
 
 private $data = array (
  'Configuracion' => 
  array (
    'TmpUrl' => 'app/tmp/rutas.php',
    'ConfigUrl' => 'config/rutas.yml',
    'OtraRuta' => 'pitosxxx',
    'versiongestor' => '2.0.0',
    'creado' => 'Did-web.com',
    'licencia' => 'GPL3',
    'cliente' => 'WebCliente.com',
    'webcliente' => 'http://www.webcliente.com',
    'webcmyt' => 'https://github.com/Didweb/MyT',
    'webcreador' => 'http://www.did-web.com',
    'idiomas' => 'es,ca,en',
    'estilo' => 'img',
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
  
 
 	 public function getVersiongestor() { 
 
 	 	 return $this->versiongestor;  
  	 	 } 
  
 
 	 public function setVersiongestor($valor) { 
 
 	 	  $this->versiongestor = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getCreado() { 
 
 	 	 return $this->creado;  
  	 	 } 
  
 
 	 public function setCreado($valor) { 
 
 	 	  $this->creado = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getLicencia() { 
 
 	 	 return $this->licencia;  
  	 	 } 
  
 
 	 public function setLicencia($valor) { 
 
 	 	  $this->licencia = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getCliente() { 
 
 	 	 return $this->cliente;  
  	 	 } 
  
 
 	 public function setCliente($valor) { 
 
 	 	  $this->cliente = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getWebcliente() { 
 
 	 	 return $this->webcliente;  
  	 	 } 
  
 
 	 public function setWebcliente($valor) { 
 
 	 	  $this->webcliente = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getWebcmyt() { 
 
 	 	 return $this->webcmyt;  
  	 	 } 
  
 
 	 public function setWebcmyt($valor) { 
 
 	 	  $this->webcmyt = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getWebcreador() { 
 
 	 	 return $this->webcreador;  
  	 	 } 
  
 
 	 public function setWebcreador($valor) { 
 
 	 	  $this->webcreador = $valor;  
 
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