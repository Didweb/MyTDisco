<?php
require_once 'app/Lecturas.php';

class Request extends Lecturas
{
	private $url;
	public $constantes;
	
	public function __construct()
	{
		$this->setUrl();	
	}
	
	public function getConstantes()
	{
		$data = Spyc::YAMLLoad('config/config.yml');
		$constantes = var_export($data, TRUE);
		
		$this->constantes = $constantes;	
	}
	
	
	public function setUrl()
	{
		if(isset($_GET['url'])){
		$this->url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
		}
		
		return $this->url;
		
	}
	
	public function getUrl()
	{
		return $this->url;
	}


	public function setDestino()
	{
		$resultado = $this->BuscaUrl($this->url);
		
		if($resultado === null)
		{ return "ERROR 404 -> Esta ruta no existe.";}
		else
		{return 'El controlador es: '.$this->controlador;}
		
		
	}
}

?>
