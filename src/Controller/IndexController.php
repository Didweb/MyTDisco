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
		
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $sniper->clase->mapeatxt($ori,'-- TOMA DOBLE 111 --','-- TOMA DOBLE 222 --','-- TOMA DOBLE 333 --');
		
		$traducciones->setDespedida($ori);
		$t = $this->menus;
		
		$arraydecosas = array('cosa 1','cosa 2', 'cosa 3');
		$arraydecosas2 = array('key1' => 'cosa 1','key2' => 'cosa 2','key3' =>  'cosa 3');
		
		$arraydecosas3 = array('key1' => array('sub1'=>'cosa 1 sub1','sub2'=>'cosa 1 sub2'),'key2' => 'cosa 2','key3' =>  'cosa 3');
		
		$twig = $this->cargaTwig('src/templates/fijas');	
		echo $twig->render('pato-dos.html', array(
											'redirect' 		=> $this->redirect,
											'parametros'	=> $this->parametros_get,
											'idioma'		=> $this->idioma,
											'idiomassoportados'=> $this->constantes->getIdiomas(),
											'HOME'			=> $this->constantes->getHOME(),
											'trad'			=> $traducciones,
											'saludotomate'	=> $t,
											'cosas'			=> $arraydecosas,
											'cosas2'		=> $arraydecosas2,
											'cosas3'		=> $arraydecosas3
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
