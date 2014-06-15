<?php


class ErrorController 
{

	public function __construct($constantes,$redirect)
	{
	$this->constantes = $constantes;
	$this->redirect  = $redirect;	
	}
	
	public function error404()
	{
		header("HTTP/1.0 404 Not Found");
		$loader = new Twig_Loader_Filesystem('templates/error');
		$twig = new Twig_Environment($loader, array(
			'cache' => __DIR__ . '/../../app/cache',
		));
		
		$redirect = $this->redirect;
		echo $twig->render('error404.html', array('redirect' => $redirect));
	}
	

}

?>
