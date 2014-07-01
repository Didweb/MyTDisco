<?php
session_start();
require_once('vendor/autoload.php'); 
require_once 'app/Request.php';


class Bootstrap extends Request
{
	public $constantes;
	
	public static function run()
	{
		$peticion = new Request();
		$constantes = $peticion->setConstantes();
		
		$usu = $constantes->getEdu();
		
		
		echo "<br /> Las constantes: ".$usu;
		
		//foreach()
		
		
		if ( $_SERVER['HTTP_HOST'] == 'localhost' ){
			$constantes->setHOME($constantes->getHOME_dev());
			}
		
		$peticion->setDestino();
		
		require_once 'src/Controller/'.$peticion->controlador.'Controller.php';
		
		$nomControlador = $peticion->controlador.'Controller';
		$nomMetodo 		= $peticion->metodo;
		
		if(isset($peticion->parametros_get['lang'])) {
			$parametro_get_lang = $peticion->parametros_get['lang']; 
			} else {
			$parametro_get_lang = '';	
			}
		
		/* Concretamos el idioma del usurio. 
		 * Mostramos uno soportado si el suyo no lo soporta la app.
		 * */
		$idioma = $peticion->getIdiomaLang($parametro_get_lang, $constantes->getIdiomas());
		
		/* Inicializamos el controlador correspondiente a la url. */
		$carga = new $nomControlador($constantes, $peticion->redirect, $peticion->parametros_get, $idioma);
		$carga->$nomMetodo();
	
		
		
	}	
	
}
?>
