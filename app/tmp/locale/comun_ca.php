<?php

 class comun 
 { 

 
 private $saludo = "CATBienvenidos a mi web.";

 private $despedida = "CATAdios hasta la próxima.";

 private $texto1 = "CATel sisetma de textos es este.";
 
 private $data = array (
  'Ca' => 
  array (
    'saludo' => 'CATBienvenidos a mi web.',
    'despedida' => 'CATAdios hasta la próxima.',
    'texto1' => 'CATel sisetma de textos es este.',
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