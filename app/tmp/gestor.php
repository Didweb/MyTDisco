<?php

 class gestor 
 { 

 
 private $tablas = "productos,categorias";

 private $n_listados = "1";

 private $productos = "id,nombre";

 private $categorias = "id,nombre";
 
 private $data = array (
  'Gestor' => 
  array (
    'tablas' => 'productos,categorias',
    'n_listados' => 1,
  ),
  'Campos' => 
  array (
    'productos' => 'id,nombre',
    'categorias' => 'id,nombre',
  ),
); 

 	 public function getGestor() { 
 	 	 return $this->data; 
 	 	 }  

  
 
 	 public function getTablas() { 
 
 	 	 return $this->tablas;  
  	 	 } 
  
 
 	 public function setTablas($valor) { 
 
 	 	  $this->tablas = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getN_listados() { 
 
 	 	 return $this->n_listados;  
  	 	 } 
  
 
 	 public function setN_listados($valor) { 
 
 	 	  $this->n_listados = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getProductos() { 
 
 	 	 return $this->productos;  
  	 	 } 
  
 
 	 public function setProductos($valor) { 
 
 	 	  $this->productos = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getCategorias() { 
 
 	 	 return $this->categorias;  
  	 	 } 
  
 
 	 public function setCategorias($valor) { 
 
 	 	  $this->categorias = $valor;  
 
 	 	 return $this;  
  	 	 } 
  

} ?>