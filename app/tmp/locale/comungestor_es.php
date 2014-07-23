<?php

 class comungestor 
 { 

 
 private $footer_webde = "Web de";

 private $footer_para = "Para";

 private $footer_creadopor = "Creado por";

 private $menu_inicio = "Inicio";

 private $menu_volver = "Volver al";

 private $listado_de = "Listado de";

 private $next = "próximo";

 private $last = "último";

 private $first = "primero";

 private $previous = "anterior";

 private $listado_p = "Listado de registros de la tabla";

 private $getsorindex = "Gestor de contenidos";

 private $gestorindexp = "Página principal del Gestor de Contenidos.";

 private $buscar = "Buscar";

 private $res_bus = "Resultado Búsqueda";

 private $aviso_busqueda = "Este listado esta filtrado por la búsqueda <b>%1</b>";

 private $eliminar_filtro = "<a href='%1' title='volver al listado original de %2'>Eliminar filtro de búsqueda</a>";

 private $title_ir_editar = "Editar Registro";

 private $h1_editar = "Editar registro";

 private $dela = "de la tabla";

 private $modificar = "Editar";

 private $title_idio = "Editar este registro en otro idioma";

 private $vovler_listado = "Volver al listado de";

 private $vovler_listado2 = "Listado";

 private $nuevoreg = "Crear nuevo registro";

 private $h1_crear = "Crear registro en la tabla";

 private $crearboton = "Crear";

 private $eliminarreg = "Eliminar Registro";

 private $h1_eliminar = "Eliminar";

 private $h2elimina = "Proceso de eliminación de registro";

 private $pelimina = "El registro con id <b>%1</b>, esta apunto de ser eliminado.<br>  En el caso de que decidas eliminarlo no se podrá recuperar.<br>   Esta acción también eliminara sus datos relacionados como por ejemplo, imágenes, el regsitro en los distintos idiomas etc.<br> <br> ¿Quieres eliminar este registro?";

 private $subirimg = "Subir imágenes";

 private $imagen = "Imagen";

 private $nombrearchivo = "Nombre del archivo";

 private $alt = "Texto Alt.";

 private $listadoimagenes = "Listado de imágenes";

 private $sinimagenes = "Este registro no dispone de imágenes.";

 private $subiimg = "Subir  imagen";

 private $actualizar = "Actualizar";

 private $txtalt = "Texto Alt";

 private $selecionaopcion = "Selecciona una opción";
 
 private $data = array (
  'Es' => 
  array (
    'footer_webde' => 'Web de',
    'footer_para' => 'Para',
    'footer_creadopor' => 'Creado por',
    'menu_inicio' => 'Inicio',
    'menu_volver' => 'Volver al',
    'listado_de' => 'Listado de',
    'next' => 'próximo',
    'last' => 'último',
    'first' => 'primero',
    'previous' => 'anterior',
    'listado_p' => 'Listado de registros de la tabla',
    'getsorindex' => 'Gestor de contenidos',
    'gestorindexp' => 'Página principal del Gestor de Contenidos.',
    'buscar' => 'Buscar',
    'res_bus' => 'Resultado Búsqueda',
    'aviso_busqueda' => 'Este listado esta filtrado por la búsqueda <b>%1</b>',
    'eliminar_filtro' => '<a href=\'%1\' title=\'volver al listado original de %2\'>Eliminar filtro de búsqueda</a>',
    'title_ir_editar' => 'Editar Registro',
    'h1_editar' => 'Editar registro',
    'dela' => 'de la tabla',
    'modificar' => 'Editar',
    'title_idio' => 'Editar este registro en otro idioma',
    'vovler_listado' => 'Volver al listado de',
    'vovler_listado2' => 'Listado',
    'nuevoreg' => 'Crear nuevo registro',
    'h1_crear' => 'Crear registro en la tabla',
    'crearboton' => 'Crear',
    'eliminarreg' => 'Eliminar Registro',
    'h1_eliminar' => 'Eliminar',
    'h2elimina' => 'Proceso de eliminación de registro',
    'pelimina' => 'El registro con id <b>%1</b>, esta apunto de ser eliminado.<br>  En el caso de que decidas eliminarlo no se podrá recuperar.<br>   Esta acción también eliminara sus datos relacionados como por ejemplo, imágenes, el regsitro en los distintos idiomas etc.<br> <br> ¿Quieres eliminar este registro?',
    'subirimg' => 'Subir imágenes',
    'imagen' => 'Imagen',
    'nombrearchivo' => 'Nombre del archivo',
    'alt' => 'Texto Alt.',
    'listadoimagenes' => 'Listado de imágenes',
    'sinimagenes' => 'Este registro no dispone de imágenes.',
    'subiimg' => 'Subir  imagen',
    'actualizar' => 'Actualizar',
    'txtalt' => 'Texto Alt',
    'selecionaopcion' => 'Selecciona una opción',
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