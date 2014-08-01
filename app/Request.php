<?php
require_once 'app/Lecturas.php';
require_once 'vendor/didweb/myt-local/MyTlocale/myLocale.php';
require_once 'vendor/didweb/myt-segurata/src/mySegurata.php';

class Request extends Lecturas
{
	public $url;
	public 	$DestinoControlador;
	public 	$lang;
	public  $seguridad;
	public  $packidiomas;
	public  $packseguridad;
	
	public $parametros_get;
	public $constantes;
	public $permiso;
	
	
		
	public function __construct()
	{
		$this->setUrl();	
		$this->setConstantes();
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


	
	public function getIdiomaLang($getLa,$idiomasSoportados,$estilo)
	{
		$lang 	= new myLocale($idiomasSoportados);
		$idioma = $lang->setLang($getLa);
		$lang->setEstilo($estilo);
		$this->packidiomas = $lang;
		return $this->lang = $idioma;
	}
	

	public function packseguridad($parametros)
	{
		$seguridad = new mySegurata($parametros);
		$this->packseguridad = $seguridad;
		
		return $this;
		
	}

	
	public function setConstantes()
	{
		$this->constantes =  $this->LectorYamlConfig();	
		return $this;
	}
	
	public function getConstantes()
	{
		return $this->constantes;
	}
	
	

	
	
	public function setSeguridadConfig()
	{
		return $this->LectorYamlSeguridad();	
	}
	
	public function getGestorConfig()
	{
		return $this->LectorYamlGestor();	
		
	}
	
	
	public function listasSeguridad($parametros,$fuenteacceso)
	{
		$para = array();
		$lista = '';
		$listapw = '';
		foreach($parametros as $nom2=>$val2){
				foreach($parametros[$nom2] as $nom3=>$val3){
					if($nom3=='comodin'){
						$comodin = $parametros[$nom2]['comodin'];
						}
					
					if($nom3=='datosfuente'){
						$datosfuente = $parametros[$nom2]['datosfuente'];
						}
						
					if($nom3=='usuarios'){
						foreach($parametros[$nom2][$nom3] as $nom4=>$val4){
							$se = explode(':',$val4);
							$lista	.=$nom4.':'.$se[1].',';
							$listapw.=$nom4.':'.$se[0].',';  }
						}
					}
					}
				if(isset($_SESSION['pass'])) {
					$session = $_SESSION['pass']; } else {$session = '';}
					
				if(isset($_COOKIE['pass'])) {
					$cookie = $_COOKIE['pass']; } else {$cookie = '';}
						
				$para['lista']		= substr($lista, 0,-1);
				$para['listaPSW']	= substr($listapw,0, -1); 
				$para['acceso']		= 0; 
				$para['session']	= $session; 
				$para['cookie']		= $cookie; 
				$para['opcionCookie']	= 0; 
				$para['comodin']		= $comodin;
				$para['fuenteacceso']	= $fuenteacceso;
				$para['datosfuente']	= $datosfuente;
				
		return $para;
	}
	
}

?>
