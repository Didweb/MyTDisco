<?php
require_once 'app/Lecturas.php';
require_once 'vendor/didweb/myt-local/MyTlocale/myLocale.php';

class Request extends Lecturas
{
	private $url;
	public 	$DestinoControlador;
	public 	$lang;
	
	public function __construct()
	{
		$this->setUrl();	
	}
	
	public function getConstantes()
	{
		$data = Spyc::YAMLLoad('config/config.yml');
		$constantes = var_export($data, TRUE);
		
		$this->constantes = $constantes;
		return $this;	
	}
	
	
	public function setUrl()
	{
		$this->url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
		return $this->url;	
	}
	

	public function setDestino()
	{
		$resultado = $this->BuscaUrl($this->url);
		return $resultado;
	
	}
	
	
	public function getIdiomaLang($getLa,$idiomasSoportados)
	{
		$lang 	= new myLocale($idiomasSoportados);
		$idioma = $lang->setLang($getLa);
		
		return $this->lang = $idioma;
	}
	
	
	public function setConstantes()
	{
		return $this->LectorYamlConfig();	
	}
	
}

?>
