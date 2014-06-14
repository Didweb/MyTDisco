<?php


class ErrorController 
{

	public function __construct($constantes,$redirect)
	{
	$this->constantes = $constantes;
	$this->redirect  = $redirect;	
	}
	
	public function error404()
	{
		echo "<br /> <b>LA REDIRECCION: </b>".$this->redirect;
		echo "<br />ERROR  404 ";
	}
	

}

?>
