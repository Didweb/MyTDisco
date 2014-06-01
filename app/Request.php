<?php
require_once 'app/Lecturas.php';

class Request extends Lecturas
{
	private $url;
	
	public function __construct()
	{
		$this->setUrl();
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
		return $this->BuscaUrl($this->url);
	}
}

?>
