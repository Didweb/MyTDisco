<?php

 class comungestor 
 { 

 
 private $footer_webde = "Web de";

 private $footer_para = "Per";

 private $footer_creadopor = "Creat per";

 private $menu_inicio = "Inici";

 private $menu_volver = "Tornar al";

 private $listado_de = "Llistat";

 private $next = "proxim";

 private $last = "ultim";

 private $first = "primer";

 private $previous = "anterior";

 private $listado_p = "Llistat de registres de la taula";

 private $getsorindex = "Gestor de continguts";

 private $gestorindexp = "Pàgina principal del Gestor de Continguts.";

 private $buscar = "Cercar";

 private $res_bus = "Resultat Cerca";

 private $aviso_busqueda = "Aquest llistat aquesta filtrat per la recerca <b>%1</b>";

 private $eliminar_filtro = "<a href='%1' title='return to the original list of %2'>Eliminar filtre de cerca</a>";

 private $title_ir_editar = "Edita Registre";

 private $h1_editar = "Modifica el registre";

 private $dela = "de la taula";

 private $modificar = "Modificar";

 private $title_idio = "Edita aquest registre en un altre idioma";

 private $vovler_listado = "Tornar al llistat de";

 private $vovler_listado2 = "Llistat";

 private $nuevoreg = "Crear nou registre";

 private $h1_crear = "Crear registre a la taula";

 private $crearboton = "Crear";

 private $eliminarreg = "Eliminar Registre";

 private $h1_eliminar = "Eliminar";

 private $h2elimina = "Procés d'eliminació de registre";

 private $pelimina = "El registre amb id <b>%1</b>, aquesta a punt de ser eliminat. <br> En el cas que decideixis eliminar no es podrà recuperar. <br> Aquesta acció també eliminés les seves dades relacionades com ara... imatges, el registre en els diferents idiomes etc. qual Vols eliminar aquest registre?";

 private $subirimg = "Pujar imatges";

 private $imagen = "Imatge";

 private $nombrearchivo = "Nom del fitxer";

 private $alt = "Text Alt.";

 private $listadoimagenes = "Llistat d'imatges";

 private $sinimagenes = "Aquest registre no disposa d'imatges.";

 private $subiimg = "Pujar imatge";

 private $actualizar = "Actualitzar";

 private $txtalt = "Text Alt";

 private $selecionaopcion = "Selecciona una opció";

 private $notrad = "Sense camps per traduir";

 private $notradp = "Aquest registre no conté camps per traduir. <br><br><br> <a href='%1' class='reg_sub_tra'>Tornar al Idioma principal d'aquest registre</a>";

 private $insertar = "Insereix";

 private $ins_nuevo_ani = "Insereix nou detall";

 private $detalle = "Detall";
 
 private $data = array (
  'Ca' => 
  array (
    'footer_webde' => 'Web de',
    'footer_para' => 'Per',
    'footer_creadopor' => 'Creat per',
    'menu_inicio' => 'Inici',
    'menu_volver' => 'Tornar al',
    'listado_de' => 'Llistat',
    'next' => 'proxim',
    'last' => 'ultim',
    'first' => 'primer',
    'previous' => 'anterior',
    'listado_p' => 'Llistat de registres de la taula',
    'getsorindex' => 'Gestor de continguts',
    'gestorindexp' => 'Pàgina principal del Gestor de Continguts.',
    'buscar' => 'Cercar',
    'res_bus' => 'Resultat Cerca',
    'aviso_busqueda' => 'Aquest llistat aquesta filtrat per la recerca <b>%1</b>',
    'eliminar_filtro' => '<a href=\'%1\' title=\'return to the original list of %2\'>Eliminar filtre de cerca</a>',
    'title_ir_editar' => 'Edita Registre',
    'h1_editar' => 'Modifica el registre',
    'dela' => 'de la taula',
    'modificar' => 'Modificar',
    'title_idio' => 'Edita aquest registre en un altre idioma',
    'vovler_listado' => 'Tornar al llistat de',
    'vovler_listado2' => 'Llistat',
    'nuevoreg' => 'Crear nou registre',
    'h1_crear' => 'Crear registre a la taula',
    'crearboton' => 'Crear',
    'eliminarreg' => 'Eliminar Registre',
    'h1_eliminar' => 'Eliminar',
    'h2elimina' => 'Procés d\'eliminació de registre',
    'pelimina' => 'El registre amb id <b>%1</b>, aquesta a punt de ser eliminat. <br> En el cas que decideixis eliminar no es podrà recuperar. <br> Aquesta acció també eliminés les seves dades relacionades com ara... imatges, el registre en els diferents idiomes etc. qual Vols eliminar aquest registre?',
    'subirimg' => 'Pujar imatges',
    'imagen' => 'Imatge',
    'nombrearchivo' => 'Nom del fitxer',
    'alt' => 'Text Alt.',
    'listadoimagenes' => 'Llistat d\'imatges',
    'sinimagenes' => 'Aquest registre no disposa d\'imatges.',
    'subiimg' => 'Pujar imatge',
    'actualizar' => 'Actualitzar',
    'txtalt' => 'Text Alt',
    'selecionaopcion' => 'Selecciona una opció',
    'notrad' => 'Sense camps per traduir',
    'notradp' => 'Aquest registre no conté camps per traduir. <br><br><br> <a href=\'%1\' class=\'reg_sub_tra\'>Tornar al Idioma principal d\'aquest registre</a>',
    'insertar' => 'Insereix',
    'ins_nuevo_ani' => 'Insereix nou detall',
    'detalle' => 'Detall',
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
  
 
 	 public function getNotrad() { 
 
 	 	 return $this->notrad;  
  	 	 } 
  
 
 	 public function setNotrad($valor) { 
 
 	 	  $this->notrad = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getNotradp() { 
 
 	 	 return $this->notradp;  
  	 	 } 
  
 
 	 public function setNotradp($valor) { 
 
 	 	  $this->notradp = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getInsertar() { 
 
 	 	 return $this->insertar;  
  	 	 } 
  
 
 	 public function setInsertar($valor) { 
 
 	 	  $this->insertar = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getIns_nuevo_ani() { 
 
 	 	 return $this->ins_nuevo_ani;  
  	 	 } 
  
 
 	 public function setIns_nuevo_ani($valor) { 
 
 	 	  $this->ins_nuevo_ani = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getDetalle() { 
 
 	 	 return $this->detalle;  
  	 	 } 
  
 
 	 public function setDetalle($valor) { 
 
 	 	  $this->detalle = $valor;  
 
 	 	 return $this;  
  	 	 } 
   

} ?>