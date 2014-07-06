<?php
require_once 'vendor/autoload.php';
//require_once 'vendor/didweb/myt-sniper/src/mySniper.php';

class Controlador
{
	protected $encontrada;
	protected $twig;
	public $sniper;
	public $menuIdioma;
	public $estilo;
	

	
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
	
	

	
}

?>
