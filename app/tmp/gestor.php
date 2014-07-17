<?php

 class gestor 
 { 

 
 private $tablas = "productos,categorias,subcategorias";

 private $n_listados = "1";

 private $productos = "id,nombre,idcategorias";

 private $categorias = "id,nombre,idsubcategorias";

 private $subcategorias = "id,nombre";

 private $dependientes = "productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre";
 
 private $data = array (
  'Gestor' => 
  array (
    'tablas' => 'productos,categorias,subcategorias',
    'n_listados' => 1,
  ),
  'Campos' => 
  array (
    'productos' => 'id,nombre,idcategorias',
    'categorias' => 'id,nombre,idsubcategorias',
    'subcategorias' => 'id,nombre',
    'dependientes' => 'productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre',
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
  
 
 	 public function getSubcategorias() { 
 
 	 	 return $this->subcategorias;  
  	 	 } 
  
 
 	 public function setSubcategorias($valor) { 
 
 	 	  $this->subcategorias = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getDependientes() { 
 
 	 	 return $this->dependientes;  
  	 	 } 
  
 
 	 public function setDependientes($valor) { 
 
 	 	  $this->dependientes = $valor;  
 
 	 	 return $this;  
  	 	 } 
  

} ?>