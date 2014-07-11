<?php
session_start();
require_once('vendor/autoload.php'); 
require_once 'app/Request.php';
require_once 'app/AppLocale.php';


class Bootstrap extends Request
{
	public $constantes;
	
	public static function run()
	{
		$peticion = new Request();
		$constantes = $peticion->getConstantes();
		
		
		/*
			$seguridad = $peticion->constantes->getSeguridad();
			if($seguridad == 1){
				
				$ConfigSeguridad 		= $peticion->setSeguridadConfig();
				$parametrosSeguridad 	= $ConfigSeguridad->getSeguridadConfig();
				
				$parametrosSeg = $peticion->listasSeguridad($parametrosSeguridad);
				
				$packseguridad = $peticion->packseguridad($parametrosSeg);
				
				
				}
			
		*/
		
		
		
		
		
		$peticion->setDestino();
		
		
		/* Concretamos el idioma del usurio. 
		 * Mostramos uno soportado si el suyo no lo soporta la app.
		 * */
		if(isset($peticion->parametros_get['lang'])) {
			$parametro_get_lang = $peticion->parametros_get['lang']; 
			} else {
			$parametro_get_lang = '';	
			}
		$idioma = $peticion->getIdiomaLang($parametro_get_lang, $constantes->getIdiomas(),$constantes->getEstilo());
		
		// Montamos controlador.
		require_once 'src/Controller/'.$peticion->controlador.'Controller.php';
		
		$nomControlador = $peticion->controlador.'Controller';
		$nomMetodo 		= $peticion->metodo;
		
		// Llamamos al controlador.
		$carga = new $nomControlador();
		$carga->$nomMetodo();
	
		
		
	}	
	
}
?>
