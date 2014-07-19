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
		$orden = $this->parametros_get['orden'];
		$_SESSION['orden'] = $orden;
		
	
		// Campos a listar
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos'][$tabla]);

		// contamos registros
		$totalregistros =  ORM::for_table($tabla)->count();	
		$rpag = 4;
		
		// preparamos paginador
		$paginacion = $this->cargaSniper('paginador');
		$paginacion->clase->inicio($totalregistros,$pagina,$rpag,$pagpaginador=3);
		$res_paginacion = $paginacion->clase->getPagpaginador();
		
		$inicio = $paginacion->clase->getInicio()-1;
		$final  = $paginacion->clase->getFinal();
		
		if($orden=='ASC'){
			
			$orden_cambio = 'DESC';
			// Buscamos campos
			$listado = ORM::for_table($tabla)
			->select_many($campos)
			->order_by_asc($campo_orden)
			->limit(" $inicio,$final ")
            ->find_many();
            	
			} elseif($orden=='DESC'){
			
			$orden_cambio = 'ASC';
			// Buscamos campos
			$listado = ORM::for_table($tabla)
			->select_many($campos)
			->order_by_desc($campo_orden)
			->limit(" $inicio,$final ")
            ->find_many();	
				}
		
	
	
		// listamos campos dependientes
		$lista_depe = $this->crearDependientes();
		
		
		// Preparamos listado de resultados para listar en template
		$lista_fin=array();
		$n=0;
		$reg=0;
		foreach ($listado as $item){
				foreach($campos as $nom2=>$val2){
					$nombre_campo = $campos[$nom2];
					$valor_campo  = $item->$campos[$nom2];
					
					// Buscamos posibles campos dependientes
					foreach ($lista_depe as $nomdep=>$valdep){
						
						if($campos[$nom2]==$lista_depe[$nomdep]['campo'] && $tabla==$lista_depe[$nomdep]['tabla']){
							$val_dep = ORM::for_table($lista_depe[$nomdep]['tabla_padre'])
										->select_many($lista_depe[$nomdep]['campo_busca'],$lista_depe[$nomdep]['campo_muetsra'])
										->find_one($item->$campos[$nom2]);
										
							$valor_campo="<span class='mini'>id: $valor_campo  - </span> ".$val_dep->$lista_depe[$nomdep]['campo_muetsra']; 
							}
						
						}
					
					
					$lista_fin[$n]=array('campo'=>$nombre_campo,'valor'=>$valor_campo);
				$n++;
				}
			}
		
		
		$twig = $this->cargaTwig('src/templates');	
		echo $twig->render('/backend/listado.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'listado'	 => $lista_fin,	
											'paginacion' => $paginacion->clase,
											'url'		 => 'gestor/listado/'.$tabla.'/'.$campo_orden.'/',
											'menuTablas' => $this->menuTablas,
											'campos'	 => $campos,
											'orden_cambio' => $orden_cambio,
											'campo_orden'	=> $campo_orden,
											'tabla'		 =>$tabla
											
											));
		
		
	}
	


	public function buscador()
	{
		$this->cargarConexion();
		if(isset($_POST['termino'])){
			$termino = $_POST['termino'];
			} 
		$campo_filtor_bus = $_POST['campo_filtro_bus'];	
		$tabla_b  = $_POST['tabla'].'_b';	
		$tabla  = $_POST['tabla'];
		
		
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $this->txt_comun->getAviso_busqueda();
		$ori2 = $this->txt_comun->getEliminar_filtro();
		
       
        $ori = $sniper->clase->mapeatxt($ori,$termino);
        $ori2 = $sniper->clase->mapeatxt($ori2,$this->constantes->getHOME().'gestor/listado/'.$tabla .'/id/1/ASC',$tabla);
        $this->txt_comun->setAviso_busqueda($ori);
		$this->txt_comun->setEliminar_filtro($ori2);
		
		
		// Campos a listar
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos'][$tabla]);
		
		$busqueda = ORM::for_table($tabla)
					->select_many($campos)
					->where_like($campo_filtor_bus,"%".$termino."%")
					->find_many();	
		
		
		
		// listamos campos dependientes
		$lista_depe = $this->crearDependientes();
		
		
		// Preparamos listado de resultados para listar en template
		$lista_fin=array();
		$n=0;
		$reg=0;
		foreach ($busqueda as $item){
				foreach($campos as $nom2=>$val2){
					$nombre_campo = $campos[$nom2];
					$valor_campo  = $item->$campos[$nom2];
					// Buscamos posibles campos dependientes
					foreach ($lista_depe as $nomdep=>$valdep){
						
						if($campos[$nom2]==$lista_depe[$nomdep]['campo'] && $tabla==$lista_depe[$nomdep]['tabla']){
							$val_dep = ORM::for_table($lista_depe[$nomdep]['tabla_padre'])
										->select_many($lista_depe[$nomdep]['campo_busca'],$lista_depe[$nomdep]['campo_muetsra'])
										->find_one($item->$campos[$nom2]);
										
							$valor_campo="<span class='mini'>id: $valor_campo   - </span> ".$val_dep->$lista_depe[$nomdep]['campo_muetsra']; 
							}
						
						}
					
					
					$lista_fin[$n]=array('campo'=>$nombre_campo,'valor'=>$valor_campo);
				$n++;
				}
			}
	
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/listado_busqueda.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'listado'	 => $lista_fin,	
											'menuTablas' => $this->menuTablas,
											'campos'	 => $campos,
											'termino'	 => $termino,
											'tabla'		=> $tabla
											));		
	}
	


	public function editar()
	{
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
	 	
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/editar.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'menuTablas' => $this->menuTablas
											));
	}


	
	public function crearMenu()
	{
		$tablas = $this->gestorConfig->getGestor();
		$tablas = explode(',',$tablas['Gestor']['tablas']);
		
		return $tablas;
		
	}
	

	public function crearDependientes()
	{
		 
		$depe =  $this->gestorConfig->getGestor();
		$depe = explode('@',$depe['Campos']['dependientes']);
		
		$res_depe=array();
		$n=0;
		foreach($depe as $nom=>$val){
			$depe2 = explode(':',$depe[$nom]);
			
				foreach($depe2 as $nom2=>$val2){
				$depe3 = explode('.',$depe2[0]);
				$tabla = $depe3[0];
				$campo = $depe3[1];
				
				$depe4 = explode('|',$depe2[1]);
				$tabla_padre = $depe4[0];
				$campo_busca = $depe4[1];
				$campo_muestra = $depe4[2];
				}
		$res_depe[$n]=array(
							'tabla'			=>$tabla ,
							'campo'			=>$campo,
							'tabla_padre'	=>$tabla_padre,
							'campo_busca'	=>$campo_busca,
							'campo_muetsra'	=>$campo_muestra
							);
					
		$n++;
					
		}	
		return $res_depe;
	}
	
}

?>
