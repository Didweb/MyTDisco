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
   

} ?>