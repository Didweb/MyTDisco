<?php
require_once 'app/Controlador.php';

class IndexController extends Controlador
{
	private $constantes;
	private $redirect;
	private $parametros_get;
	
	public function __construct($constantes,$redirect,$parametros_get=array())
	{
	$this->constantes 		= $constantes;
	$this->redirect  		= $redirect;
	$this->parametros_get 	= $parametros_get;
	
	}
	
	public function index2()
	{
		$redirect = $this->redirect;
		
		
		$twig = $this->cargaTwig('templates/fijas');	
		echo $twig->render('pato-dos.html', array('redirect' => $redirect,'parametros'=>$this->parametros_get));
		
	}
	
	public function indexpolka()
	{
		$constante = $this->constantes->getOtraRuta();
		
		$twig = $this->cargaTwig('templates/fijas');	
		echo $twig->render('polka.html', array('constante' => $constante));
		
	}
}

?>
