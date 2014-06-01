<?php
require_once 'app/Request.php';

class Bootstrap
{
	private $destino;
	
	public static function run(Request $peticion)
	{
	
		$peticion->setUrl();
		$destino = $peticion->getUrl();
		
		$res = $peticion->setDestino();
		
		if($res==='POLKA')
		{
			throw new Exception('Es ---->>> POLKA');
			}
	
		return $res;
	}	
	
}
?>
