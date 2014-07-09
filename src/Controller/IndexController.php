<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';
include 'menus.php';

class IndexController extends Controlador
{
	public $cons;

	
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	
	
	public function index2()
	{
		// Carga de traducciones
		$traducciones = $this->locale->trad('comun');
		$ori = $traducciones->getDespedida();
		
		// Carga de Sniper mapear texto y pasar parametros
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $sniper->clase->mapeatxt($ori,'-- TOMA DOBLE 111 --','-- TOMA DOBLE 222 --','-- TOMA DOBLE 333 --');
		$traducciones->setDespedida($ori);
		
		
		
		$home = $this->constantes->getHOME();
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/fijas/pato-dos.html', array(
											'trad'	=> $traducciones,
											'cons'	=> $this->constantes,
											'elhome'=> $home,
											'idioma'=> $this->packidiomas
											));
		
	}
	
	
	public function index()
	{
		
		$traducciones = $this->locale->trad('comun');
		$ori = $traducciones->getDespedida();
		
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $sniper->clase->mapeatxt($ori,'-- TOMA DOBLE 111 --','-- TOMA DOBLE 222 --','-- TOMA DOBLE 333 --');
		
		$traducciones->setDespedida($ori);
		
		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/fijas/index.html', array(
											'redirect' 		=> $this->redirect,
											'parametros'	=> $this->parametros_get,
											'idiomassoportados'=> $this->constantes->getIdiomas(),
											'trad'			=> $traducciones,
											'cons'	=> $this->constantes,
											'idioma'=> $this->packidiomas
											));
		
	}
	
	

	
	public function indexpolka()
	{
		$otraruta = $this->constantes->getOtraRuta();
		$losidiomas = explode(',',$this->constantes->getIdiomas());
		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/fijas/polka.html', array(
										'constante' => $otraruta,
										'cons'	=> $this->constantes,
										'idioma'=> $this->packidiomas
										));
		
	}
}

?>
