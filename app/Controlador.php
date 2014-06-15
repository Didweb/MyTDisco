<?php
abstract class Controlador
{
	protected $encontrada;
	
	public function __construct($redirect)
	{
		if($redirect == 404){
			$this->encontrada = false;
			
			} else {
			$this->encontrada = true;	
			}
	}
	
	public function error404()
	{
		$loader = new Twig_Loader_Filesystem('templates/error');
		$twig = new Twig_Environment($loader, array(
			'cache' => __DIR__ . '/../../app/cache',
		));
		$redirect = $this->redirect;
		echo $twig->render('error404.html', array('redirect' => $redirect));
		
	}
	
	
}

?>
