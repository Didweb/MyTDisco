<?php
session_start();
require_once('vendor/autoload.php'); 
require_once 'app/Request.php';
require_once 'app/AppLocale.php';


class Bootstrap extends Request
{
	public $constantes;
	public $parametrosSeg;
	
	public static function run()
	{
		$peticion = new Request();
		$constantes = $peticion->getConstantes();
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
		
		
		
		
			$seguridad = $peticion->constantes->getSeguridad();
			
			if($seguridad == 1){
				
				$ConfigSeguridad 		= $peticion->setSeguridadConfig();
				$parametrosSeguridad 	= $ConfigSeguridad->getSeguridadConfig();
				
				$parametrosSeg = $peticion->listasSeguridad($parametrosSeguridad,$peticion->fuenteacceso,$peticion->url);
				
				
				$acceso = new mySegurata($parametrosSeg);
				$visita = $acceso->visita();
				
				if($peticion->permiso > $visita){
					
					
					// Montamos controlador.
					require_once 'src/Controller/SeguridadController.php';
					
					$nomControlador = 'SeguridadController';
					$nomMetodo 		= 'login';
					
					// Llamamos al controlador.
					$carga = new $nomControlador($parametrosSeg);
					$carga->$nomMetodo($peticion->url);
					
					} else {
						
						// Montamos controlador.
						require_once 'src/Controller/'.$peticion->controlador.'Controller.php';
						
						// Llamamos al controlador.
						$nomControlador = $peticion->controlador.'Controller';
						$nomMetodo 		= $peticion->metodo;
						
						if($peticion->metodo=='check' || $peticion->metodo=='checkout'){
							$carga = new $nomControlador($parametrosSeg);
							} else {
							$carga = new $nomControlador();	
							}
						
						
						$carga->$nomMetodo();
					
						}
				
				}
			
		
				
				
				
		
		
		
		
		
		
		


	
		
		
	}	
	
}
?>
