<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';
include 'menus.php';

class IndexController extends Controlador
{
	private $constantes;
	private $redirect;
	private $parametros_get;
	private $idioma;
	private $menus;
	
	
	public function __construct($constantes,$redirect,$parametros_get=array(),$idioma,$locale)
	{
	$this->constantes 		= $constantes;
	$this->redirect  		= $redirect;
	$this->parametros_get 	= $parametros_get;
	$this->idioma 			= $idioma;
	$this->locale 			= $locale;
	
	$this->menus = new menus();
	
	}
	

	public function index2()
	{
		
		$traducciones = $this->locale->trad('comun');
		$ori = $traducciones->getDespedida();
		
		$ori = preg_replace('#%1#','-- TOMA --',$ori);
		$traducciones->setDespedida($ori);
		$t = $this->menus;
		
		$twig = $this->cargaTwig('src/templates/fijas');	
		echo $twig->render('pato-dos.html', array(
											'redirect' 		=> $this->redirect,
											'parametros'	=> $this->parametros_get,
											'idioma'		=> $this->idioma,
											'idiomassoportados'=> $this->constantes->getIdiomas(),
											'HOME'			=> $this->constantes->getHOME(),
											'trad'			=> $traducciones,
											'saludotomate'	=> $t
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
