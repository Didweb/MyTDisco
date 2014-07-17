<?php

 class formpass 
 { 

 
 private $form_h1 = "Login Form";

 private $form_p = "Enter your login details.";

 private $form_user = "User";

 private $form_boton = "Log in";

 private $form_home = "Back to home";

 private $menu_hola = "Hello";

 private $menu_salir = "Log out.";
 
 private $data = array (
  'En' => 
  array (
    'form_h1' => 'Login Form',
    'form_p' => 'Enter your login details.',
    'form_user' => 'User',
    'form_boton' => 'Log in',
    'form_home' => 'Back to home',
    'menu_hola' => 'Hello',
    'menu_salir' => 'Log out.',
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