<?php
require_once 'app/Controlador.php';

class IndexController extends Controlador
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
		$redirect = $this->redirect;
		
		$twig = $this->cargaTwig('templates/fijas');	
		echo $twig->render('pato-dos.html', array('redirect' => $redirect));
		
	}
	
	public function indexpolka()
	{
		$constante = $this->constantes->getOtraRuta();
		
		$twig = $this->cargaTwig('templates/fijas');	
		echo $twig->render('polka.html', array('constante' => $constante));
		
	}
}

?>
