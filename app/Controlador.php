<?php
require_once 'vendor/autoload.php';
require_once 'vendor/didweb/myt-sniper/src/mySniper.php';
require_once 'app/Request.php';

class Controlador extends Request
{
	protected $encontrada;
	protected $twig;
	public $sniper;
	public $menuIdioma;
	public $estilo;
	
	public $locale;

	public $redirect;
	public $parametros_get;
	public $idioma;
	public $menus;
	
	public $constantes;
	
	public function __construct()
	{

		// Cargamos las constantes y las ponemos disponibles.
		$this->setConstantes();
		$constantes = $this->getConstantes();
		
		// Preparamos el HOME
		if ( $_SERVER['HTTP_HOST'] == 'localhost' ){
			$constantes->setHOME($constantes->getHOME_dev());
			}
		
		
		
		// Definimos el idioma del usuario.
		if(isset($constantes->parametros_get['lang'])) {
			$parametro_get_lang = $constantes->parametros_get['lang']; 
			} else {
			$parametro_get_lang = '';	
			}
		$idioma = $this->getIdiomaLang($parametro_get_lang, $constantes->getIdiomas(),$constantes->getEstilo());
		// Preparamos las traducciones.
		$this->locale = new AppLocale($idioma);	
		$this->idioma = $idioma;
		

		
	}


	
	public function cargaTwig($path)
	{
		if($_SERVER['HTTP_HOST']=='localhost'){
			$loader = new Twig_Loader_Filesystem($path);
			$twig = new Twig_Environment($loader, array(
				'cache' => __DIR__ . '/../../app/cache',
				'debug' => true
			));
		} else {
			$loader = new Twig_Loader_Filesystem($path);
			$twig = new Twig_Environment($loader, array(
				'cache' => __DIR__ . '/../../app/cache',
				'debug' => false
			));	
		}
		
		$this->twig  = $twig;
		
		return $this->twig;
	}
	
	public function cargaSniper($sniper)
	{
		$this->sniper = new mySniper();
		$this->sniper->__autoload($sniper);	
		
		return $this->sniper;
		
	}
	
	
	public function cargaConstantes()
	{
		return $this->constantes;
	}

	
}

?>
