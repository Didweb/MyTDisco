<?php

 class formpass 
 { 

 
 private $form_h1 = "Formulario de acceso";

 private $form_p = "Introduce tus datos de acceso.";

 private $form_user = "Usuario";

 private $form_boton = "Acceder";

 private $form_home = "Volver al inicio";

 private $menu_hola = "Hola";

 private $menu_salir = "Salir de la sesión.";
 
 private $data = array (
  'Es' => 
  array (
    'form_h1' => 'Formulario de acceso',
    'form_p' => 'Introduce tus datos de acceso.',
    'form_user' => 'Usuario',
    'form_boton' => 'Acceder',
    'form_home' => 'Volver al inicio',
    'menu_hola' => 'Hola',
    'menu_salir' => 'Salir de la sesión.',
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