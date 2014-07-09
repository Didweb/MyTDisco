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
		
		require_once 'src/Controller/'.$peticion->controlador.'Controller.php';
		
		$nomControlador = $peticion->controlador.'Controller';
		$nomMetodo 		= $peticion->metodo;
		

	
		
		/* Inicializamos el controlador correspondiente a la url. */
		//$carga = new $nomControlador($constantes, $peticion->redirect, $peticion->parametros_get, $idioma,$locale,$peticion->packidiomas,$packseguridad);
		$carga = new $nomControlador();
		$carga->$nomMetodo();
	
		
		
	}	
	
}
?>
