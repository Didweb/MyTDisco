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
		
		// Preparamos ruta absoluta
		if ( $_SERVER['HTTP_HOST'] == 'localhost' ){
			$constantes->setDirRoot($constantes->getDirRootDev());
			}
		
		
		// Definimos el idioma del usuario.
	
		if(isset($get->parametros_get['lang'])) {
			$parametro_get_lang = $get->parametros_get['lang']; 
			} else {
			$parametro_get_lang = '';	
			}
			
		$idioma = $this->getIdiomaLang($parametro_get_lang, $constantes->getIdiomas_Gestor(),$constantes->getEstilo());
		$this->idioma = $idioma;
		


		
	}


	public function cargaIMG()
	{
		require_once 'src/Controller/IMGcrud.php';
		$img = new IMGcrud();
		return $img;
		
	}

	public function cargaGets()
	{
		$get = new Request();
		$get->setDestino();
		$this->parametros_get = $get->parametros_get;
	}
	
	

	public function cargarConexion()
	{
		ORM::configure('mysql:host=localhost;dbname=myt');
		ORM::configure('username', 'root');
		ORM::configure('password', 'rasmysql');
		
	}

	public function cargaGestorConfig()
	{
		return $this->getGestorConfig();
		
	}


	public function getLocaleTard()
	{
		$locale_new = new AppLocale($this->idioma);
		return $locale_new;
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
		$twig->addGlobal("session", $_SESSION);
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
