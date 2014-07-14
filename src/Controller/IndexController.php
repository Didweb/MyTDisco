<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';
include 'menus.php';

class IndexController extends Controlador
{
	public $cons;
	public $trad_acceso;
	public $trad;
	
	
	public function __construct()
	{
		parent::__construct();
		
		$comun = $this->getLocaleTard();
		$this->trad  = $comun->trad('comun');
		$acceso 	= $this->getLocaleTard();
		$this->trad_acceso = $acceso->trad('formpass');
	}
	
	
	
	public function index2()
	{
		// Carga de traducciones
		$ori = $this->trad->getDespedida();
		
		// Carga de Sniper mapear texto y pasar parametros
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $sniper->clase->mapeatxt($ori,'-- TOMA DOBLE 111 --','-- TOMA DOBLE 222 --','-- TOMA DOBLE 333 --');
		$this->trad->setDespedida($ori);
		

		
		$home = $this->constantes->getHOME();
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/backend/pato-dos.html', array(
											'trad'			=> $this->trad,
											'trad_acceso' 	=> $this->trad_acceso,
											'cons'	=> $this->constantes,
											'parametros'	=> $this->parametros_get,
											'elhome'=> $home,
											'idioma'=> $this->packidiomas,
											));
		
	}
	
	
	public function index()
	{
		
		$ori = $this->trad->getDespedida();
		
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $sniper->clase->mapeatxt($ori,'-- TOMA DOBLE 111 --','-- TOMA DOBLE 222 --','-- TOMA DOBLE 333 --');
		
		$this->trad->setDespedida($ori);
		

		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/frontend/index.html', array(
											'redirect' 		=> $this->redirect,
											'parametros'	=> $this->parametros_get,
											'idiomassoportados'=> $this->constantes->getIdiomas(),
											'trad'			=> $this->trad,
											'trad_acceso' => $this->trad_acceso,
											'cons'	=> $this->constantes,
											'idioma'=> $this->packidiomas
											));
		
	}
	
	

	
	public function indexpolka()
	{
		$otraruta = $this->constantes->getOtraRuta();
		$losidiomas = explode(',',$this->constantes->getIdiomas());
		
		$this->cargarConexion();
		
		$productos =  ORM::for_table('productos')->find_many();
		
		foreach ($productos as $producto) {
			echo "Nombre: ".$producto->nombre."<br>";
			}
		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/frontend/polka.html', array(
										'trad_acceso' => $this->trad_acceso,
										'constante' => $otraruta,
										'cons'	=> $this->constantes,
										'idioma'=> $this->packidiomas
										));
		
	}
}

?>
