<?php
require_once 'app/Request.php';

class Bootstrap
{
	private $destino;
	private $constantes;
	

	
	
	public static function run(Request $peticion)
	{
	
		$peticion->getConstantes();
		$peticion->setUrl();
		$destino = $peticion->getUrl();
		
	
		$res = $peticion->setDestino();
		
		
		return $res;
	}	
	
}
?>
