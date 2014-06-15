<?php


class IndexController 
{
	private $constantes;
	private $redirect;
	
	public function __construct($constantes,$redirect)
	{
	$this->constantes = $constantes;
	$this->redirect  = $redirect;	
	}
	
	public function index2()
	{
		
		$loader = new Twig_Loader_Filesystem('templates/fijas');
		$twig = new Twig_Environment($loader, array(
			'cache' => __DIR__ . '/../../app/cache',
		));
		$redirect = $this->redirect;
		echo $twig->render('pato-dos.html', array('redirect' => $redirect));
		
		
	}
	
	public function indexpolka()
	{
		echo "<br /> <b>CONSTANTE OtraRuta</b>: [en Controlador]".$this->constantes->getOtraRuta()."<br /><br />";
		echo "<br />En controlador Indesx dentro de <b>indexpolka</b> metodo <<<-----";
	}
}

?>
