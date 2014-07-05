<?php

 class comun 
 { 

 
 private $saludo = "Bienvenidos a mi web.";

 private $despedida = "Adios hasta la próxima %1 .";

 private $texto1 = "el sisetma de textos es este.";
 
 private $data = array (
  'Es' => 
  array (
    'saludo' => 'Bienvenidos a mi web.',
    'despedida' => 'Adios hasta la próxima %1 .',
    'texto1' => 'el sisetma de textos es este.',
  ),
); 

 	 public function getcomun() { 
 	 	 return $this->data; 
 	 	 } 

  
 
 	 public function getSaludo() { 
 
 	 	 return $this->saludo;  
  	 	 } 
  
 
 	 public function setSaludo($valor) { 
 
 	 	  $this->saludo = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getDespedida() { 
 
 	 	 return $this->despedida;  
  	 	 } 
  
 
 	 public function setDespedida($valor) { 
 
 	 	  $this->despedida = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTexto1() { 
 
 	 	 return $this->texto1;  
  	 	 } 
  
 
 	 public function setTexto1($valor) { 
 
 	 	  $this->texto1 = $valor;  
 
 	 	 return $this;  
  	 	 } 
   

} ?>