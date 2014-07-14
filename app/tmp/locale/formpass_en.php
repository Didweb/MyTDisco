<?php

 class formpass 
 { 

 
 private $form_h1 = "Login Form";

 private $form_p = "Enter your login details.";

 private $form_user = "User";
 
 private $data = array (
  'En' => 
  array (
    'form_h1' => 'Login Form',
    'form_p' => 'Enter your login details.',
    'form_user' => 'User',
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
   

} ?>