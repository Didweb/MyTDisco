<?php

 class gestor 
 { 

 
 private $tablas = "artista,puesto";

 private $n_listados = "1";

 private $artista = "id,nombreArtistaArtistico";

 private $puesto = "id,nombrePuesto";

 private $dependientes = "productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre@pedidosdetalle.idproducto:productos|id|nombre";

 private $slugs = "artista.slug:nombreArtistaArtistico";

 private $tab_pedidosdetalle = "id|oculto|int,idpedido|oculto|int,idproducto|depe|int,cantidad|normal|string";

 private $tab_pedidos = "id|oculto|int,creacion|fechac|fecha,ref|normal|string";

 private $tab_productos = "id|oculto|int,nombre|nomral|string,idcategorias|depe|int,des|area|string,opciones|select|string,activo|select|int,fecha|date|fecha,slug|oculto|string";

 private $tab_categorias = "id|oculto|int,nombre|nomral|string,idsubcategorias|depe|int";

 private $tab_subcategorias = "id|oculto|int,nombre|nomral|string";

 private $trad_productos = "nombre|normal|string,des|area|string,slug|slug|string";

 private $trad_categorias = "nombre|normal|string";

 private $trad_subcategorias = "nombre|normal|string";

 private $opciones = "productos.opciones*1|Opcion 1, 2|Opcion 2,3|Opcion 3@prductos.activo*1|Sí,0|No";

 private $IMGpatron = "p,75,50,50,0|m,100,200,100,0|g,100,125,200,1";

 private $IMGdir = "src/images/fotos";

 private $IMGdirMuestra = "src/images/fotos/m/m_";

 private $IMGtablas = "artistas";

 private $Ani_pedidos = "pedidosdetalle,idpedido|idproducto,cantidad";
 
 private $data = array (
  'Gestor' => 
  array (
    'tablas' => 'artista,puesto',
    'n_listados' => 1,
  ),
  'Campos' => 
  array (
    'artista' => 'id,nombreArtistaArtistico',
    'puesto' => 'id,nombrePuesto',
    'dependientes' => 'productos.idcategorias:categorias|id|nombre@categorias.idsubcategorias:subcategorias|id|nombre@pedidosdetalle.idproducto:productos|id|nombre',
    'slugs' => 'artista.slug:nombreArtistaArtistico',
    'tab_pedidosdetalle' => 'id|oculto|int,idpedido|oculto|int,idproducto|depe|int,cantidad|normal|string',
    'tab_pedidos' => 'id|oculto|int,creacion|fechac|fecha,ref|normal|string',
    'tab_productos' => 'id|oculto|int,nombre|nomral|string,idcategorias|depe|int,des|area|string,opciones|select|string,activo|select|int,fecha|date|fecha,slug|oculto|string',
    'tab_categorias' => 'id|oculto|int,nombre|nomral|string,idsubcategorias|depe|int',
    'tab_subcategorias' => 'id|oculto|int,nombre|nomral|string',
    'trad_productos' => 'nombre|normal|string,des|area|string,slug|slug|string',
    'trad_categorias' => 'nombre|normal|string',
    'trad_subcategorias' => 'nombre|normal|string',
  ),
  'Select' => 
  array (
    'opciones' => 'productos.opciones*1|Opcion 1, 2|Opcion 2,3|Opcion 3@prductos.activo*1|Sí,0|No',
  ),
  'IMG' => 
  array (
    'IMGpatron' => 'p,75,50,50,0|m,100,200,100,0|g,100,125,200,1',
    'IMGdir' => 'src/images/fotos',
    'IMGdirMuestra' => 'src/images/fotos/m/m_',
    'IMGtablas' => 'artistas',
  ),
  'Anidados' => 
  array (
    'Ani_pedidos' => 'pedidosdetalle,idpedido|idproducto,cantidad',
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
  
 
 	 public function getArtista() { 
 
 	 	 return $this->artista;  
  	 	 } 
  
 
 	 public function setArtista($valor) { 
 
 	 	  $this->artista = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getPuesto() { 
 
 	 	 return $this->puesto;  
  	 	 } 
  
 
 	 public function setPuesto($valor) { 
 
 	 	  $this->puesto = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getDependientes() { 
 
 	 	 return $this->dependientes;  
  	 	 } 
  
 
 	 public function setDependientes($valor) { 
 
 	 	  $this->dependientes = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getSlugs() { 
 
 	 	 return $this->slugs;  
  	 	 } 
  
 
 	 public function setSlugs($valor) { 
 
 	 	  $this->slugs = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTab_pedidosdetalle() { 
 
 	 	 return $this->tab_pedidosdetalle;  
  	 	 } 
  
 
 	 public function setTab_pedidosdetalle($valor) { 
 
 	 	  $this->tab_pedidosdetalle = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTab_pedidos() { 
 
 	 	 return $this->tab_pedidos;  
  	 	 } 
  
 
 	 public function setTab_pedidos($valor) { 
 
 	 	  $this->tab_pedidos = $valor;  
 
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
  
 
 	 public function getOpciones() { 
 
 	 	 return $this->opciones;  
  	 	 } 
  
 
 	 public function setOpciones($valor) { 
 
 	 	  $this->opciones = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getIMGpatron() { 
 
 	 	 return $this->IMGpatron;  
  	 	 } 
  
 
 	 public function setIMGpatron($valor) { 
 
 	 	  $this->IMGpatron = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getIMGdir() { 
 
 	 	 return $this->IMGdir;  
  	 	 } 
  
 
 	 public function setIMGdir($valor) { 
 
 	 	  $this->IMGdir = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getIMGdirMuestra() { 
 
 	 	 return $this->IMGdirMuestra;  
  	 	 } 
  
 
 	 public function setIMGdirMuestra($valor) { 
 
 	 	  $this->IMGdirMuestra = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getIMGtablas() { 
 
 	 	 return $this->IMGtablas;  
  	 	 } 
  
 
 	 public function setIMGtablas($valor) { 
 
 	 	  $this->IMGtablas = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getAni_pedidos() { 
 
 	 	 return $this->Ani_pedidos;  
  	 	 } 
  
 
 	 public function setAni_pedidos($valor) { 
 
 	 	  $this->Ani_pedidos = $valor;  
 
 	 	 return $this;  
  	 	 } 
  

} ?>