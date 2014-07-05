<?php

class menus 
{
	public $saludos;
	public $despide;
	
	public function saludo()
		{
		$this->saludos = "DALE Tomate";	
		return $this->saludos;	
		}
	
	public function despiden()
		{
		$this->despide = "ADIOS Tomate";	
		return $this->despide;	
		}
	
}
?>
