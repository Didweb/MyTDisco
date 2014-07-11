<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';

class ErrorController extends Controlador
{

	public function __construct()
	{
		parent::__construct();	
	
	}
	
	public function error404()
	{
		header("HTTP/1.0 404 Not Found");
		$loader = new Twig_Loader_Filesystem('src/templates/error');
		$twig = new Twig_Environment($loader, array(
			'cache' => __DIR__ . '/../../app/cache',
		));
		
		$redirect = $this->redirect;
		echo $twig->render('error404.html', array('redirect' => $this->redirect));
	}
	

}

?>
