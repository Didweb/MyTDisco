<?php


class IndexController 
{
	private $constantes;
	private $redirect;
	
	public function __construct($constantes,$redirect)
	{
	$this->constantes = $constantes;
	$this->redirect  = $redirect;	
	}
	
	public function index2()
	{
		echo "<br /> <b>LA REDIRECCION: </b>".$this->redirect;
		echo "<br />Dentro del controlador de <b>Index</b> es esto <<<-----";
	}
	
	public function indexpolka()
	{
		echo "<br /> <b>CONSTANTE OtraRuta</b>: [en Controlador]".$this->constantes->getOtraRuta()."<br /><br />";
		echo "<br />En controlador Indesx dentro de <b>indexpolka</b> metodo <<<-----";
	}
}

?>
