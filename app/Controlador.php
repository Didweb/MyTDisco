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
	
	public $tip;
	
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
		
		$this->tip = $constantes->getTip();

		
	}

	public function camposselect()
	{
		
		$depe =  $this->gestorConfig->getGestor();
		$depe = explode('@',$depe['Select']['opciones']);
		
		$res_depe=array();
		$n=0;
		$x=0;
		foreach($depe as $nom=>$val){
			$depe2 = explode('*',$depe[$nom]);
			
				foreach($depe2 as $nom2=>$val2){
				$depe3 = explode('.',$depe2[0]);
				$tabla = $depe3[0];
				$campo = $depe3[1];
				
				$depe4 = explode(',',$depe2[1]);
				$x=0;
				$valores_select=array();
				foreach ($depe4 as $nom3=>$val3){
					
					$depe5 = explode('|',$depe4[$nom3]);
					foreach($depe5 as $nom4=>$val4){
					
					$valores_select[$x]=array(
									'valor' => $depe5[0], 'nombre' => $depe5[1]
									);
					
					
					}$x++;
					}
				
				}
				
		$res_depe[$n]=array(
							'tabla'			=>$tabla ,
							'campo'			=>$campo,
							'valores_select'=>$valores_select
							);
					
		$n++;
					
		}
		
		return $res_depe;
		
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
				'cache' => __DIR__ . '/cache',
				'debug' => true
			));
		} else {
			$loader = new Twig_Loader_Filesystem($path);
			$twig = new Twig_Environment($loader, array(
				'cache' => __DIR__ . '/cache',
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
	
	
	function cargaServicio( $nombreClase ){
		
		
		$ruta = $this->constantes->getDirRoot().'src/Controller/';
		if(file_exists( $ruta.$nombreClase . '.php' )) {
			require_once( $ruta.$nombreClase . '.php' );
			$nomclase = $nombreClase;
			$clase = new $nomclase();
			
			
			return $clase;
			
			} else {
						
				echo "ERROR EN CARGA DE SERVICIO :". $ruta.$nombreClase . '.php';
				return  null;
		}
	}
	
	
	
	public function cargaConstantes()
	{
		return $this->constantes;
	}

	
}

?>
