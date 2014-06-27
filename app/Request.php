<?php
require_once 'app/Lecturas.php';
require_once 'vendor/didweb/myt-local/MyTlocale/myLocale.php';

class Request extends Lecturas
{
	private $url;
	public $DestinoControlador;
	public $lang;
	
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
		{ 
			$this->controlador = 'Error';
			$this->metodo = 'error404';
			$this->redirect = 404;
		
		}
	
	}
	
	
	public function getIdiomaLang($getLa,$idiomasSoportados)
	{
	$lang = new myLocale($idiomasSoportados);
	$idioma = $lang->setLang($getLa);
	return $this->lang = $idioma;
	}
	
}

?>
