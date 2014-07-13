<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';


class GestorController extends Controlador
{
	public $cons;
	public $txt_comun;
	
	
	public function __construct()
	{
		parent::__construct();
		$traducciones = $this->locale->trad('comungestor');
		$this->txt_comun = $traducciones;
	}
	
	
	
	public function indexgestor()
	{
		
		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/backend/indexgestor.html', array(
											'trad_comun'	=> $this->txt_comun,
											'cons'	=> $this->constantes,
											'idioma'=> $this->packidiomas,
											));
		
	}
	
	
}

?>
