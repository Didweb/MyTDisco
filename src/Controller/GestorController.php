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
	public $idiomas_per;
	public $idioma_reg;
	public $idioma_principal;
	
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
					$valor_campo2 = $this->buscar_dependencias($lista_depe,$tabla,$nombre_campo,$valor_campo,0 );
					
					$valor_campo = $valor_campo2 ;
					
					
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
					$valor_campo2 = $this->buscar_dependencias($lista_depe,$tabla,$nombre_campo,$valor_campo,0 );
					$valor_campo = $valor_campo2;
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
	
	
	public function editaridiomaccion()
	{
		$this->cargarConexion();
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		$idiomareg = $this->parametros_get['idiomareg'];
		
		$existe = ORM::for_table('myt_locale')
				->where(array ('idtotal'	=> $id,
								'tabla'		=> $tabla,
								'locale'	=> $idiomareg))
				->count();
		
		if($existe>=1)
		{
		
		foreach ($_POST as $nom=>$val){
		$registro = ORM::for_table('myt_locale')->where(array (
								'idtotal'	=> $id,
								'tabla'		=> $tabla,
								'locale'	=> $idiomareg,
								'nombrecampo'=>$nom ))
								->find_one();
		
				if(isset($_POST[$nom])){
					$registro->set('txt', $_POST[$nom]);
					$registro->save();	
					}
		
		}
			
		
		}
		
		$this->editaridioma();
		
	}
	
	
	
	
	public function editaridioma()
	{
		$this->cargarConexion();
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		$idiomareg = $this->parametros_get['idiomareg'];
		
		
		$existe = ORM::for_table('myt_locale')
				->where(array ('idtotal'	=> $id,
								'tabla'		=> $tabla,
								'locale'	=> $idiomareg))
				->find_many();
		$campos_tra = $this->lectura_campos_trad($tabla,$existe);
		
		$cuentaexiste=count($existe);
		$_SESSION['idioma_reg']=$idiomareg;
		
		if($cuentaexiste==0)
		{
			foreach($campos_tra as $nom=>$val) {
				
			$crearidiomareg = ORM::for_table('myt_locale')->create();
			$crearidiomareg->idtotal 	= $id;
			$crearidiomareg->tabla 		= $tabla;
			$crearidiomareg->locale 	= $idiomareg;
			$crearidiomareg->nombrecampo = $campos_tra[$nom]['nombre'];
			$crearidiomareg->save();
			}
		}
		
		$this->idiomas_registros();
		
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/editar_idioma.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'idiomaprincipal' =>$this->idioma_principal,
											'menuTablas' => $this->menuTablas,
											'res'	 => $campos_tra,
											'idiomas_reg' => $this->idiomas_per
											));
		

		
			
	}
	

	public function editaraccion()
	{
		$this->cargarConexion();
		
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		
		$registro = ORM::for_table($tabla)->find_one($id);
		foreach ($_POST as $nom=>$val){
			echo "<br> ->>".$_POST[$nom];
		if($_POST[$nom]!=''){
		$registro->$nom = $_POST[$nom];}
		}
		
		$registro->save();
		$this->editar();
	}


	public function editar()
	{
		$this->cargarConexion();
		
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		
		
		
	 	$res = ORM::for_table($tabla)->find_one($id);
	 	$campos_editar = $this->lectura_campos($tabla,$res);

		$this->idiomas_registros();
	 	
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/editar.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'menuTablas' => $this->menuTablas,
											'res'	 => $campos_editar,
											'idiomas_reg' => $this->idiomas_per,
											'idiomaprincipal'=>$this->idioma_principal
											));
	}


	
	public function buscar_dependencias($lista_depe,$tabla,$nomcampo,$valor_campo,$con_lista = 0)
	{
	$lista='';		
	foreach ($lista_depe as $nomdep=>$valdep){
						
						if($con_lista == 0){
						
							if($nomcampo==$lista_depe[$nomdep]['campo'] && $tabla==$lista_depe[$nomdep]['tabla']){
								$val_dep = ORM::for_table($lista_depe[$nomdep]['tabla_padre'])
											->select_many($lista_depe[$nomdep]['campo_busca'],$lista_depe[$nomdep]['campo_muetsra'])
											->find_one($valor_campo);
											
								$valor_campo = "<span class='mini'>id: $valor_campo   - </span> ".$val_dep->$lista_depe[$nomdep]['campo_muetsra']; 
								} else {
								$valor_campo = $valor_campo;	
								}
							$res = $valor_campo;
							} 
						
						elseif ($con_lista == 1) {
							
							if($nomcampo==$lista_depe[$nomdep]['campo'] && $tabla==$lista_depe[$nomdep]['tabla']){
							$val_dep = ORM::for_table($lista_depe[$nomdep]['tabla_padre'])
										->select_many($lista_depe[$nomdep]['campo_busca'],$lista_depe[$nomdep]['campo_muetsra'])
										->find_one($valor_campo);
										
							$valor_campo = $val_dep->$lista_depe[$nomdep]['campo_muetsra']; 
							
							$lista_res =array();
							$n=0;
							$lista = ORM::for_table($lista_depe[$nomdep]['tabla_padre'])
										->select_many($lista_depe[$nomdep]['campo_busca'],$lista_depe[$nomdep]['campo_muetsra'])
										->find_many();
								
								foreach ($lista as $lis){ 
									$lista_res[$n] = array('id'=>$lis->$lista_depe[$nomdep]['campo_busca'],'nombre'=>$lis->$lista_depe[$nomdep]['campo_muetsra']);
									$n++;
									}
								$lista = $lista_res;	
								} else {
							$valor_campo =$valor_campo;
							
							}	
							
						$res = array('valor_campo'=>$valor_campo,'lista'=>$lista);	
							
						}
					}
				return $res;	
		
	}
	
	
	public function crearMenu()
	{
		$tablas = $this->gestorConfig->getGestor();
		$tablas = explode(',',$tablas['Gestor']['tablas']);
		
		return $tablas;
		
	}
	
	
	
	public function lectura_campos($tabla,$res)
	{
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos']['tab_'.$tabla]);
		
		$campos_editar=array();
		$n=0;
		
		foreach($campos as $nom=>$val){
			
			$campos_detalle=explode('|',$campos[$nom]);
			$valor = $res->$campos_detalle[0];
			$lista = '';
			
			if($campos_detalle[1]=='depe'){
			// listamos campos dependientes
			$lista_depe = $this->crearDependientes();
			$valor1 = $this->buscar_dependencias($lista_depe,$tabla,$campos_detalle[0],$res->$campos_detalle[0],1);
			$valor = $valor1['valor_campo'];
			$lista = $valor1['lista'];
			}
			
			$campos_editar[$n]=array(
							'nombre'	=> $campos_detalle[0],
							'tipo'		=> $campos_detalle[1],
							'formato'	=> $campos_detalle[2],
							'valor'		=> $valor,
							'lista'		=> $lista
							);
			$n++;
			}
		
		return $campos_editar;
	}
	

	
	public function lectura_campos_trad($tabla,$res)
	{ 
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos']['trad_'.$tabla]);
		$campos_trad=array();
		$n=0;
		
		foreach($campos as $nom=>$val){
			$resultado='';
			foreach ($res as $item ){
				
				if($campos[$nom]==$item->nombrecampo){
					$resultado = $item->txt; }
				}
				$campos_trad[$n]=array(
							'nombre'	=> $campos[$nom],
							'valor'		=> $resultado);
			$n++;
		
			}
		
		return $campos_trad;	
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
	
	
	public function idiomas_registros()
	{
		$idiomas_per =  explode(',',$this->constantes->getIdiomas());
		$this->idiomas_per = $idiomas_per;	
		$this->idioma_principal = $this->idiomas_per[0];
		
		
		
		if(isset($this->parametros_get['idioma_reg']))
		{$_SESSION['idioma_reg'] = $this->parametros_get['idioma_reg'];
		$this->idioma_reg = $this->parametros_get['idioma_reg'];
		}

	
		if(!isset($_SESSION['idioma_reg']) || !isset($this->parametros_get['idioma_reg'])) {
		$_SESSION['idioma_reg'] = $this->idioma_principal;
		$this->idioma_reg = $this->idioma_principal;
		}
	
	}
	
	
}

?>
