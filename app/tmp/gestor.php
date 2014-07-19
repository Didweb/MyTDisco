<?php

 class gestor 
 { 

 
 private $tablas = "productos,categorias,subcategorias";

 private $n_listados = "1";

 private $productos = "id,nombre,idcategorias";

 private $categorias = "id,nombre,idsubcategorias";

 private $subcategorias = "id,nombre";

 private $dependientes = "productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre";

 private $tab_productos = "id|oculto|int,nombre|nomral|string,idcategorias|depe|int,des|normal|string";

 private $tab_categorias = "id|oculto|int,nombre|nomral|string,idsubcategorias|depe|int";

 private $tab_subcategorias = "id|oculto|int,nombre|nomral|string";

 private $trad_productos = "nombre,des";

 private $trad_categorias = "nombre";

 private $trad_subcategorias = "nombre";
 
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
    'tab_productos' => 'id|oculto|int,nombre|nomral|string,idcategorias|depe|int,des|normal|string',
    'tab_categorias' => 'id|oculto|int,nombre|nomral|string,idsubcategorias|depe|int',
    'tab_subcategorias' => 'id|oculto|int,nombre|nomral|string',
    'trad_productos' => 'nombre,des',
    'trad_categorias' => 'nombre',
    'trad_subcategorias' => 'nombre',
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
  
 
 	 public function getTab_productos() { 
 
 	 	 return $this->tab_productos;  
  	 	 } 
  
 
 	 public function setTab_productos($valor) { 
 
 	 	  $this->tab_productos = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTab_categorias() { 
 
 	 	 return $this->tab_categorias;  
  	 	 } 
  
 
 	 public function setTab_categorias($valor) { 
 
 	 	  $this->tab_categorias = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTab_subcategorias() { 
 
 	 	 return $this->tab_subcategorias;  
  	 	 } 
  
 
 	 public function setTab_subcategorias($valor) { 
 
 	 	  $this->tab_subcategorias = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTrad_productos() { 
 
 	 	 return $this->trad_productos;  
  	 	 } 
  
 
 	 public function setTrad_productos($valor) { 
 
 	 	  $this->trad_productos = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTrad_categorias() { 
 
 	 	 return $this->trad_categorias;  
  	 	 } 
  
 
 	 public function setTrad_categorias($valor) { 
 
 	 	  $this->trad_categorias = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTrad_subcategorias() { 
 
 	 	 return $this->trad_subcategorias;  
  	 	 } 
  
 
 	 public function setTrad_subcategorias($valor) { 
 
 	 	  $this->trad_subcategorias = $valor;  
 
 	 	 return $this;  
  	 	 } 
  

} ?>