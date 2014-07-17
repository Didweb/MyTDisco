<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';


class GestorController extends Controlador
{
	public $cons;
	public $txt_comun;
	private $menuTablas;
	public $gestorConfig;
	
	private $get;
	private $n_registros;
	
	public function __construct()
	{
		parent::__construct();
		$traducciones = $this->getLocaleTard();
		$traducciones2 = $this->getLocaleTard();
		$diccionario = $traducciones->trad('formpass');
		$diccionario2 = $traducciones2->trad('comungestor');
		$this->txt_pass = $diccionario;
		$this->txt_comun = $diccionario2;
		
		//Config Gestor
		$this->gestorConfig = $this->cargaGestorConfig();
		$this->menuTablas = $this->crearMenu();
		
		
		
		// Carga los parametros $_GET
		$this->cargaGets();
		
	}
	
	
	
	public function indexgestor()
	{
		$this->cargarConexion();

		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/backend/indexgestor.html', array(
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'menuTablas' => $this->menuTablas 
											));
		
	}
	
	
	public function listado()
	{
		$this->cargarConexion();
		$tabla  = $this->parametros_get['tabla'];
		$pagina = $this->parametros_get['pagina'];
		$campo_orden = $this->parametros_get['campo_orden'];
		
	
		
		
		$totalregistros =  ORM::for_table($tabla)->count();	
		$rpag = 2;
		
		$paginacion = $this->cargaSniper('paginador');
		$paginacion->clase->inicio($totalregistros,$pagina,$rpag,$pagpaginador=3);
		
		$res_paginacion = $paginacion->clase->getPagpaginador();
		
		$inicio = $paginacion->clase->getInicio()-1;
		$final  = $paginacion->clase->getFinal();
		
		$listado = ORM::for_table($tabla)
			->order_by_asc($campo_orden)
			->limit(" $inicio,$final ")
            ->find_many();	
		
		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/backend/listado.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'listado'	 => $listado,	
											'paginacion' => $paginacion->clase,
											'url'		 => 'gestor/listado/'.$tabla.'/'.$campo_orden.'/',
											'menuTablas' => $this->menuTablas,
											));
		
		
	}
	

	
	
	public function crearMenu()
	{
		$tablas = $this->gestorConfig->getGestor();
		$tablas = explode(',',$tablas['Gestor']['tablas']);
		
		return $tablas;
		
	}
	

	
}

?>
