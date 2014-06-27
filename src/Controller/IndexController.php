<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';

class IndexController extends Controlador
{
	private $constantes;
	private $redirect;
	private $parametros_get;
	private $idioma;
	
	
	public function __construct($constantes,$redirect,$parametros_get=array(),$idioma)
	{
	$this->constantes 		= $constantes;
	$this->redirect  		= $redirect;
	$this->parametros_get 	= $parametros_get;
	$this->idioma 			= $idioma;
	
	}
	
	public function index2()
	{
		
		$twig = $this->cargaTwig('src/templates/fijas');	
		echo $twig->render('pato-dos.html', array(
											'redirect' 		=> $this->redirect,
											'parametros'	=> $this->parametros_get,
											'idioma'		=> $this->idioma,
											'idiomassoportados'=> $this->constantes->getIdiomas(),
											'HOME'			=> $this->constantes->getHOME()
											));
		
	}
	
	public function indexpolka()
	{
		$constante = $this->constantes->getOtraRuta();
		
		$twig = $this->cargaTwig('src/templates/fijas');	
		echo $twig->render('polka.html', array(
										'constante' => $constante,
										'idioma'	=> $this->idioma,
										'HOME'		=> $this->constantes->getHOME()));
		
	}
}

?>
