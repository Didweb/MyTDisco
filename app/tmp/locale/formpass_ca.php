<?php

 class formpass 
 { 

 
 private $form_h1 = "Formulari d'accés";

 private $form_p = "Introdueix les teves dades d'accés.";

 private $form_user = "Usuari";

 private $form_boton = "Accedir";

 private $form_home = "Tornar a l'inici";

 private $menu_hola = "Hola";

 private $menu_salir = "Sortir de la sessió.";
 
 private $data = array (
  'Ca' => 
  array (
    'form_h1' => 'Formulari d\'accés',
    'form_p' => 'Introdueix les teves dades d\'accés.',
    'form_user' => 'Usuari',
    'form_boton' => 'Accedir',
    'form_home' => 'Tornar a l\'inici',
    'menu_hola' => 'Hola',
    'menu_salir' => 'Sortir de la sessió.',
  ),
); 

 	 public function getformpass() { 
 	 	 return $this->data; 
 	 	 } 

  
 
 	 public function getForm_h1() { 
 
 	 	 return $this->form_h1;  
  	 	 } 
  
 
 	 public function setForm_h1($valor) { 
 
 	 	  $this->form_h1 = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getForm_p() { 
 
 	 	 return $this->form_p;  
  	 	 } 
  
 
 	 public function setForm_p($valor) { 
 
 	 	  $this->form_p = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getForm_user() { 
 
 	 	 return $this->form_user;  
  	 	 } 
  
 
 	 public function setForm_user($valor) { 
 
 	 	  $this->form_user = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getForm_boton() { 
 
 	 	 return $this->form_boton;  
  	 	 } 
  
 
 	 public function setForm_boton($valor) { 
 
 	 	  $this->form_boton = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getForm_home() { 
 
 	 	 return $this->form_home;  
  	 	 } 
  
 
 	 public function setForm_home($valor) { 
 
 	 	  $this->form_home = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getMenu_hola() { 
 
 	 	 return $this->menu_hola;  
  	 	 } 
  
 
 	 public function setMenu_hola($valor) { 
 
 	 	  $this->menu_hola = $valor;  
 
 	 	 return $this;  
  	 	 } 
  
 
 	 public function getMenu_salir() { 
 
 	 	 return $this->menu_salir;  
  	 	 } 
  
 
 	 public function setMenu_salir($valor) { 
 
 	 	  $this->menu_salir = $valor;  
 
 	 	 return $this;  
  	 	 } 
   

} ?>