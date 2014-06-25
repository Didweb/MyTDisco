<?php
require_once('vendor/autoload.php'); 
require_once 'app/Request.php';
require_once 'app/Kernel.php';

class Bootstrap extends Kernel
{
	private $destino;
	
	public static function run(Request $peticion)
	{
		$kernel = new Kernel();
		$kernel->setConstantes();
		
		
		
		
		$peticion->setUrl();
		$destino = $peticion->getUrl();
		
	
		
		$res = $peticion->setDestino();
		require_once 'src/Controller/'.$peticion->controlador.'Controller.php';
		
		$nomControlador = $peticion->controlador.'Controller';
		$nomMetodo 		= $peticion->metodo;
		
		//echo "<br /><br />".'Controlador: '.$nomControlador.'   /  Metodo: '.$nomMetodo."<br /><br />";
		
		$carga = new $nomControlador($kernel->setConstantes(),$peticion->redirect,$peticion->parametros_get);
		
		$carga->$nomMetodo();
	
		
		return $res;
	}	
	
}
?>
