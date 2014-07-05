<?php

 class comun 
 { 

 
 private $saludo = "INGBienvenidos a mi web.";

 private $despedida = "INGAdios hasta la próxima.";

 private $texto1 = "INGel sisetma de textos es este.";
 
 private $data = array (
  'Es' => 
  array (
    'saludo' => 'INGBienvenidos a mi web.',
    'despedida' => 'INGAdios hasta la próxima.',
    'texto1' => 'INGel sisetma de textos es este.',
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