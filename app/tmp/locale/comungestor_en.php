<?php

 class comungestor 
 { 

 
 private $footer_webde = "Website off";

 private $footer_para = "For";

 private $footer_creadopor = "Created by";

 private $menu_inicio = "Home";

 private $menu_volver = "Back to";

 private $listado_de = "Listing";

 private $next = "next";

 private $last = "last";

 private $first = "first";

 private $previous = "previous";

 private $listado_p = "List of table records";

 private $getsorindex = "Content Management System";

 private $gestorindexp = "Home Content Manager.";

 private $buscar = "Search";

 private $res_bus = "Search Result";

 private $aviso_busqueda = "This listing is filtered by the search <b>%1</b>";

 private $eliminar_filtro = "<a href='%1' title='return to the original list of %2'>Remove search filter</a>";

 private $title_ir_editar = "Edit Record";

 private $h1_editar = "Edit registry";

 private $dela = "table";

 private $modificar = "Edit";

 private $title_idio = "Edit this entry in another language";

 private $vovler_listado = "Back to list";

 private $vovler_listado2 = "List";

 private $nuevoreg = "Create new account";

 private $h1_crear = "Create record in table";

 private $crearboton = "Create";

 private $eliminarreg = "Delete Record";

 private $h1_eliminar = "Delete";

 private $h2elimina = "Registration process of elimination";

 private $pelimina = "The record with id <b>%1</b> , is about to be removed <br> If you decide to delete can not be recovered <br> This will also eliminate its related data such as images, the register-etc in different languages​​. <br> <br> Want to delete this record?";

 private $subirimg = "Upload images";

 private $imagen = "Image";

 private $nombrearchivo = "File name";

 private $alt = "Text Alt.";

 private $listadoimagenes = "List of images";

 private $sinimagenes = "This record has no images.";

 private $subiimg = "Upload Image";

 private $actualizar = "Update";

 private $txtalt = "Text Alt";

 private $selecionaopcion = "Select an option";
 
 private $data = array (
  'En' => 
  array (
    'footer_webde' => 'Website off',
    'footer_para' => 'For',
    'footer_creadopor' => 'Created by',
    'menu_inicio' => 'Home',
    'menu_volver' => 'Back to',
    'listado_de' => 'Listing',
    'next' => 'next',
    'last' => 'last',
    'first' => 'first',
    'previous' => 'previous',
    'listado_p' => 'List of table records',
    'getsorindex' => 'Content Management System',
    'gestorindexp' => 'Home Content Manager.',
    'buscar' => 'Search',
    'res_bus' => 'Search Result',
    'aviso_busqueda' => 'This listing is filtered by the search <b>%1</b>',
    'eliminar_filtro' => '<a href=\'%1\' title=\'return to the original list of %2\'>Remove search filter</a>',
    'title_ir_editar' => 'Edit Record',
    'h1_editar' => 'Edit registry',
    'dela' => 'table',
    'modificar' => 'Edit',
    'title_idio' => 'Edit this entry in another language',
    'vovler_listado' => 'Back to list',
    'vovler_listado2' => 'List',
    'nuevoreg' => 'Create new account',
    'h1_crear' => 'Create record in table',
    'crearboton' => 'Create',
    'eliminarreg' => 'Delete Record',
    'h1_eliminar' => 'Delete',
    'h2elimina' => 'Registration process of elimination',
    'pelimina' => 'The record with id <b>%1</b> , is about to be removed <br> If you decide to delete can not be recovered <br> This will also eliminate its related data such as images, the register-etc in different languages​​. <br> <br> Want to delete this record?',
    'subirimg' => 'Upload images',
    'imagen' => 'Image',
    'nombrearchivo' => 'File name',
    'alt' => 'Text Alt.',
    'listadoimagenes' => 'List of images',
    'sinimagenes' => 'This record has no images.',
    'subiimg' => 'Upload Image',
    'actualizar' => 'Update',
    'txtalt' => 'Text Alt',
    'selecionaopcion' => 'Select an option',
  ),
); 

 	 public function getcomungestor() { 
 	 	 return $this->data; 
 	 	 } 

  
 
 	 public function getFooter_webde() { 
 
 	 	 return $this->footer_webde;  
  	 	 } 
  
 
 	 public function setFooter_webde($valor) { 
 
 	 	  $this->footer_webde = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getFooter_para() { 
 
 	 	 return $this->footer_para;  
  	 	 } 
  
 
 	 public function setFooter_para($valor) { 
 
 	 	  $this->footer_para = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getFooter_creadopor() { 
 
 	 	 return $this->footer_creadopor;  
  	 	 } 
  
 
 	 public function setFooter_creadopor($valor) { 
 
 	 	  $this->footer_creadopor = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getMenu_inicio() { 
 
 	 	 return $this->menu_inicio;  
  	 	 } 
  
 
 	 public function setMenu_inicio($valor) { 
 
 	 	  $this->menu_inicio = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getMenu_volver() { 
 
 	 	 return $this->menu_volver;  
  	 	 } 
  
 
 	 public function setMenu_volver($valor) { 
 
 	 	  $this->menu_volver = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getListado_de() { 
 
 	 	 return $this->listado_de;  
  	 	 } 
  
 
 	 public function setListado_de($valor) { 
 
 	 	  $this->listado_de = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getNext() { 
 
 	 	 return $this->next;  
  	 	 } 
  
 
 	 public function setNext($valor) { 
 
 	 	  $this->next = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getLast() { 
 
 	 	 return $this->last;  
  	 	 } 
  
 
 	 public function setLast($valor) { 
 
 	 	  $this->last = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getFirst() { 
 
 	 	 return $this->first;  
  	 	 } 
  
 
 	 public function setFirst($valor) { 
 
 	 	  $this->first = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getPrevious() { 
 
 	 	 return $this->previous;  
  	 	 } 
  
 
 	 public function setPrevious($valor) { 
 
 	 	  $this->previous = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getListado_p() { 
 
 	 	 return $this->listado_p;  
  	 	 } 
  
 
 	 public function setListado_p($valor) { 
 
 	 	  $this->listado_p = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getGetsorindex() { 
 
 	 	 return $this->getsorindex;  
  	 	 } 
  
 
 	 public function setGetsorindex($valor) { 
 
 	 	  $this->getsorindex = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getGestorindexp() { 
 
 	 	 return $this->gestorindexp;  
  	 	 } 
  
 
 	 public function setGestorindexp($valor) { 
 
 	 	  $this->gestorindexp = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getBuscar() { 
 
 	 	 return $this->buscar;  
  	 	 } 
  
 
 	 public function setBuscar($valor) { 
 
 	 	  $this->buscar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getRes_bus() { 
 
 	 	 return $this->res_bus;  
  	 	 } 
  
 
 	 public function setRes_bus($valor) { 
 
 	 	  $this->res_bus = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getAviso_busqueda() { 
 
 	 	 return $this->aviso_busqueda;  
  	 	 } 
  
 
 	 public function setAviso_busqueda($valor) { 
 
 	 	  $this->aviso_busqueda = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getEliminar_filtro() { 
 
 	 	 return $this->eliminar_filtro;  
  	 	 } 
  
 
 	 public function setEliminar_filtro($valor) { 
 
 	 	  $this->eliminar_filtro = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTitle_ir_editar() { 
 
 	 	 return $this->title_ir_editar;  
  	 	 } 
  
 
 	 public function setTitle_ir_editar($valor) { 
 
 	 	  $this->title_ir_editar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getH1_editar() { 
 
 	 	 return $this->h1_editar;  
  	 	 } 
  
 
 	 public function setH1_editar($valor) { 
 
 	 	  $this->h1_editar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getDela() { 
 
 	 	 return $this->dela;  
  	 	 } 
  
 
 	 public function setDela($valor) { 
 
 	 	  $this->dela = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getModificar() { 
 
 	 	 return $this->modificar;  
  	 	 } 
  
 
 	 public function setModificar($valor) { 
 
 	 	  $this->modificar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTitle_idio() { 
 
 	 	 return $this->title_idio;  
  	 	 } 
  
 
 	 public function setTitle_idio($valor) { 
 
 	 	  $this->title_idio = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getVovler_listado() { 
 
 	 	 return $this->vovler_listado;  
  	 	 } 
  
 
 	 public function setVovler_listado($valor) { 
 
 	 	  $this->vovler_listado = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getVovler_listado2() { 
 
 	 	 return $this->vovler_listado2;  
  	 	 } 
  
 
 	 public function setVovler_listado2($valor) { 
 
 	 	  $this->vovler_listado2 = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getNuevoreg() { 
 
 	 	 return $this->nuevoreg;  
  	 	 } 
  
 
 	 public function setNuevoreg($valor) { 
 
 	 	  $this->nuevoreg = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getH1_crear() { 
 
 	 	 return $this->h1_crear;  
  	 	 } 
  
 
 	 public function setH1_crear($valor) { 
 
 	 	  $this->h1_crear = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getCrearboton() { 
 
 	 	 return $this->crearboton;  
  	 	 } 
  
 
 	 public function setCrearboton($valor) { 
 
 	 	  $this->crearboton = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getEliminarreg() { 
 
 	 	 return $this->eliminarreg;  
  	 	 } 
  
 
 	 public function setEliminarreg($valor) { 
 
 	 	  $this->eliminarreg = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getH1_eliminar() { 
 
 	 	 return $this->h1_eliminar;  
  	 	 } 
  
 
 	 public function setH1_eliminar($valor) { 
 
 	 	  $this->h1_eliminar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getH2elimina() { 
 
 	 	 return $this->h2elimina;  
  	 	 } 
  
 
 	 public function setH2elimina($valor) { 
 
 	 	  $this->h2elimina = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getPelimina() { 
 
 	 	 return $this->pelimina;  
  	 	 } 
  
 
 	 public function setPelimina($valor) { 
 
 	 	  $this->pelimina = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getSubirimg() { 
 
 	 	 return $this->subirimg;  
  	 	 } 
  
 
 	 public function setSubirimg($valor) { 
 
 	 	  $this->subirimg = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getImagen() { 
 
 	 	 return $this->imagen;  
  	 	 } 
  
 
 	 public function setImagen($valor) { 
 
 	 	  $this->imagen = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getNombrearchivo() { 
 
 	 	 return $this->nombrearchivo;  
  	 	 } 
  
 
 	 public function setNombrearchivo($valor) { 
 
 	 	  $this->nombrearchivo = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getAlt() { 
 
 	 	 return $this->alt;  
  	 	 } 
  
 
 	 public function setAlt($valor) { 
 
 	 	  $this->alt = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getListadoimagenes() { 
 
 	 	 return $this->listadoimagenes;  
  	 	 } 
  
 
 	 public function setListadoimagenes($valor) { 
 
 	 	  $this->listadoimagenes = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getSinimagenes() { 
 
 	 	 return $this->sinimagenes;  
  	 	 } 
  
 
 	 public function setSinimagenes($valor) { 
 
 	 	  $this->sinimagenes = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getSubiimg() { 
 
 	 	 return $this->subiimg;  
  	 	 } 
  
 
 	 public function setSubiimg($valor) { 
 
 	 	  $this->subiimg = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getActualizar() { 
 
 	 	 return $this->actualizar;  
  	 	 } 
  
 
 	 public function setActualizar($valor) { 
 
 	 	  $this->actualizar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getTxtalt() { 
 
 	 	 return $this->txtalt;  
  	 	 } 
  
 
 	 public function setTxtalt($valor) { 
 
 	 	  $this->txtalt = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getSelecionaopcion() { 
 
 	 	 return $this->selecionaopcion;  
  	 	 } 
  
 
 	 public function setSelecionaopcion($valor) { 
 
 	 	  $this->selecionaopcion = $valor;  
 
 	 	 return $this;  
  	 	 } 
   

} ?>