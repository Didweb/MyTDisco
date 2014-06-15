<?php
abstract class Controlador
{
	protected $encontrada;
	protected $twig;
	
	
	
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
	
	
}

?>
