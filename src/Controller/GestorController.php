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
	private $IMGTablas;
	
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
		$this->menuTablas	= $this->crearMenu();
		
		// IMG
		$this->IMGTablas	= $this->configIMG();
		$this->IMG 			= $this->cargaIMG();
		
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
		if(!isset($this->parametros_get['pagina'])){
			$pagina = 1;
			} else
			{
			$pagina = $this->parametros_get['pagina'];	
			}
		if(!isset($this->parametros_get['campo_orden'])) {
				$campo_orden = 'id'; } 
			else {
			$campo_orden = $this->parametros_get['campo_orden'];	
			}
		
		if(!isset($this->parametros_get['orden'])) {
				$orden = 'ASC'; } 
			else {
			$orden = $this->parametros_get['orden'];	
			}
		
		$_SESSION['orden'] = $orden;
		$_SESSION['campo_orden'] = $campo_orden;
	
		// Campos a listar
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos'][$tabla]);

		// contamos registros
		$totalregistros =  ORM::for_table($tabla)->count();	
		$rpag = 20;
		
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
		
		
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $this->txt_comun->getNotradp();
		$url = $this->constantes->getHOME().'gestor/editar/'.$tabla.'/'.$id;
        $ori = $sniper->clase->mapeatxt($ori,$url);
        $this->txt_comun->setNotradp($ori);
		
		
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
		
		$existe = ORM::for_table('myt_locale')
				->where(array ('idtotal'	=> $id,
								'tabla'		=> $tabla,
								'locale'	=> $idiomareg))
				->find_many();
		$campos_tra = $this->lectura_campos_trad($tabla,$existe);
		
		
	
		
		
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/editar_idioma.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 	=> $this->constantes,
											'idioma'	 	=> $this->packidiomas,
											'idiomaprincipal' =>$this->idioma_principal,
											'menuTablas' 	=> $this->menuTablas,
											'res'	 		=> $campos_tra,
											'idiomas_reg' 	=> $this->idiomas_per
											));
		

		
			
	}
	

	public function editaraccion()
	{
		$this->cargarConexion();
		
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		
		$registro = ORM::for_table($tabla)->find_one($id);
		foreach ($_POST as $nom=>$val){
			
		if($_POST[$nom]!=''){
		$registro->$nom = $_POST[$nom];}
		}
		
		$registro->save();
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$id."");
		die();
	}




	public function subirfoto()
	{
		$this->cargarConexion();
		
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		
		
		// Subimos imagen 
		$datos_config = $this->gestorConfig->getGestor();
		$dir 		= $this->constantes->getDirRoot().$datos_config['IMG']['IMGdir'];
		$patron 	= $datos_config['IMG']['IMGpatron'];
		
		$tmpname 		= $_FILES['imagen']['tmp_name'];
		$nombre_enviado = $_FILES['imagen']['name'];
		$save_name		= $_POST['nombre'];
		$alt			= $_POST['alt'];
	
		$sniper = $this->cargaSniper('resize');
		$sniper->clase->iniciamos($dir,$patron);
		
		// Crear Slug
		$paginacion = $this->cargaSniper('slug');
		$save_name = $paginacion->clase->limpiando($save_name);
		
		$nombre_img_bbdd = $sniper->clase->resizeImg($tmpname,$save_name,$nombre_enviado);
		
		if($nombre_img_bbdd != null ){
			$this->IMG->almacenarIMG($id,$tabla,$nombre_img_bbdd,$alt,$this->constantes->getIdiomas()); }
			
	
	
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$id."");
		die();
	
	}


	public function editartxtimg()
	{
		$this->cargarConexion();
		
		$id 	= $_POST['id'];
		$alt	= $_POST['alt'];
		
		$tabla  = $this->parametros_get['tabla'];
		$idreg 	= $this->parametros_get['idreg'];
		
		$this->IMG->actualizar($id,$alt);
		
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$idreg."");
		die();
	}


	public function eliminarimg()
	{
		$this->cargarConexion();
		$tabla  	= $this->parametros_get['tabla'];
		$idimagen 	= $this->parametros_get['idimagen'];
		$idreg 		= $this->parametros_get['idreg'];
		
		
		$datosIMG = $this->gestorConfig->getGestor();
		$patron = $datosIMG['IMG']['IMGpatron'];
		$dir = $datosIMG['IMG']['IMGdir'];
		$root = $this->constantes->getDirRoot();
		
		$this->IMG->eliminarImagen($idimagen,$patron,$dir,$root);
		
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$idreg."");
		die();
	}
	

	public function editartxtimgprin()
	{
		$this->cargarConexion();
		
		$id 	= $_POST['id'];
		$alt	= $_POST['alt'];
		
		$tabla  = $this->parametros_get['tabla'];
		$idreg 	= $this->parametros_get['idreg'];
		
		$this->IMG->actualizarprin($id,$alt);
		
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$idreg."");
		die();
	}




	public function editar()
	{
		$this->cargarConexion();
		
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
		
		$campos_editar_anidados = null;
		$campos_crear_anidados 	= null;
		$campo_padre			= null;
		$tabla_anidada = '';
		$n_anidados = null;
		$configGestor = $this->gestorConfig->getGestor();
		
		// Comprobamos si tiene anidados
		if(isset($configGestor['Anidados']['Ani_'.$tabla])){ 
			
			$res_anidados = $this->anidados($configGestor['Anidados']['Ani_'.$tabla]);
			
			$tabla_anidada 	= $res_anidados['tablaanidada'];
			$campo_padre  	= $res_anidados['idpadre'];
			
			$n_anidados = ORM::for_table($tabla_anidada)->where($campo_padre, $id)->count();
			
			$res_anidado_lista = ORM::for_table($tabla_anidada)
							->where($campo_padre, $id)
							->find_many();
			
			$campos_editar_anidados = $this->lectura_campos_varios($tabla_anidada,$res_anidado_lista);
					
					
			$this->idiomas_registros();
			$campos_crear_anidados = $this->lectura_campo_crear($tabla_anidada);

			}
		
		
		
		// Necesita imagenes?
		$rutaIMGVista = ''; 
		$listado_fotos = null;
		$listado_fotos_txt = null;
		$need_photo = strpos($this->IMGTablas, $tabla);
		
		if($need_photo !== false ) {
		$need_photo = 1;
		$listado_fotos 		= $this->IMG->listado($id,$tabla);
		$listado_fotos_txt 	= $this->IMG->listarIdiomasFotos();
		
		
		$rutaIMGVista = $configGestor['IMG']['IMGdirMuestra'];
			} 
		
	 	$res = ORM::for_table($tabla)->find_one($id);
	 	$campos_editar = $this->lectura_campos($tabla,$res);

		$this->idiomas_registros();
	 	
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/editar.html', array(
											'get'				=> $this->parametros_get,
											'trad_acceso'		=> $this->txt_pass,
											'trad'				=> $this->txt_comun,
											'cons'		 		=> $this->constantes,
											'idioma'	 		=> $this->packidiomas,
											'menuTablas' 		=> $this->menuTablas,
											'res'	 			=> $campos_editar,
											'res_anidado'		=> $campos_editar_anidados,
											'res_anidados_crear'=> $campos_crear_anidados,
											'idiomas_reg' 		=> $this->idiomas_per,
											'idiomaprincipal'	=> $this->idioma_principal,
											'need_photo'		=> $need_photo,
											'listado_fotos'		=> $listado_fotos,
											'listado_fotos_txt'	=> $listado_fotos_txt,
											'rutaIMGVista'		=> $rutaIMGVista,
											'tabla_anidada'		=> $tabla_anidada ,
											'campo_padre'		=> $campo_padre,
											'n_anidados'		=> $n_anidados
											));
	}

	public function eliminaranidado()
	{
		$this->cargarConexion();
		
		$id  			= $this->parametros_get['id'];
		$tabla  		= $this->parametros_get['tabla'];
		$idanidado  	= $this->parametros_get['idanidado'];
		$tablaanidado  = $this->parametros_get['tablaanidado'];
		

		
		$eli_anidado = ORM::for_table($tablaanidado)->find_one($idanidado);
		$eli_anidado->delete();
		
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$id."");
		die();
		
	}


	public function anidados($par_anidados)
	{
		
		$res = $this->LectorAnidados($par_anidados);
		return $res;
	}


public function lectura_campos_varios($tabla,$res)
	{
		
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos']['tab_'.$tabla]);
		
		$campos_editar=array();
		$n=0;
		$x=0;
		
		foreach($res as $nom1=>$val1){
		
		foreach($campos as $nom=>$val){
			
			$campos_detalle=explode('|',$campos[$nom]);
			$valor = $res[$nom1][$campos_detalle[0]];
			$lista = '';
			
			if($campos_detalle[1]=='depe'){
			// listamos campos dependientes
			$lista_depe = $this->crearDependientes();
			$valor1 = $this->buscar_dependencias($lista_depe,$tabla,$campos_detalle[0],$res[$nom1][$campos_detalle[0]],1);
			$valor = $valor1['valor_campo'];
			$lista = $valor1['lista'];
			}
			
			if($campos_detalle[1]=='select'){
				$resselect = $this->camposselect();
				foreach($resselect as $nomr=>$valr){
				if($resselect[$nomr]['campo']==$campos_detalle[0]){
						$lista = $resselect[$nomr]['valores_select'];}
				}
			}
			
			$campos_editar[$x][$n]=array(
							'nombre'	=> $campos_detalle[0],
							'tipo'		=> $campos_detalle[1],
							'formato'	=> $campos_detalle[2],
							'valor'		=> $valor,
							'lista'		=> $lista
							);
			$n++;
			}
		
		$x++;}

		return $campos_editar;
	}


	public function eliminar()
	{
		$this->cargarConexion();
		
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];
			
		$res = ORM::for_table($tabla)->find_one($id);
		
		$sniper = $this->cargaSniper('mapeatxt');
		$ori = $this->txt_comun->getPelimina();
        $ori = $sniper->clase->mapeatxt($ori,$id);
        $this->txt_comun->setPelimina($ori);
		
		
		
		

		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/eliminar.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'menuTablas' => $this->menuTablas,
											'res'	 => $res
											));
		
		
	}

	
	public function eliminaraccion()
	{
		$this->cargarConexion();
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];	
		
		// Comprobamos tablas anidadas para eliminar registros relacionados
		$configGestor = $this->gestorConfig->getGestor();
		if(isset($configGestor['Anidados']['Ani_'.$tabla])){
				
				$res_anidados = $this->anidados($configGestor['Anidados']['Ani_'.$tabla]);
			
				$tabla_anidada 	= $res_anidados['tablaanidada'];
				$campo_padre  	= $res_anidados['idpadre'];
				
					$n_anidados = ORM::for_table($tabla_anidada)->where($campo_padre, $id)->count();
					
					if($n_anidados>1){
						
						$eli_anidado = ORM::for_table($tabla_anidada)
									->where_equal($campo_padre, $id)
									->delete_many();
									
						}	elseif($n_anidados==1)	{
						
						$eli_anidado = ORM::for_table($tabla_anidada)
										->where($campo_padre, $id)
										->find_one();
						$eli_anidado->delete();
						
						}		
					
				}
		
		
		
		
		
		// Eliminamos imganes
		$n_img = ORM::for_table('myt_imagen')
							->where(
							array(	'idtotal'	=> $id,
									'tabla'		=> $tabla ))->count();
		
		if($n_img>=1){
		
			$imgs = ORM::for_table('myt_imagen')->where(
								array(	'idtotal'	=> $id,
										'tabla'		=> $tabla ))->find_many($id);
			
			foreach ($imgs as $nom=>$val){
			$idimagen = $imgs[$nom]['id'];
			$datosIMG = $this->gestorConfig->getGestor();
			$patron = $datosIMG['IMG']['IMGpatron'];
			$dir = $datosIMG['IMG']['IMGdir'];
			$root = $this->constantes->getDirRoot();
			
			$this->IMG->eliminarImagen($idimagen,$patron,$dir,$root);
			
			$idiomas = ORM::for_table('myt_locale')->where_equal(array('idtotal'=>$idimagen,'tabla'=>'myt_imagen'))->delete_many();
			}
			
		}	
		
		
		$registro = ORM::for_table($tabla)->find_one($id);
		$registro->delete();
		
		// Traducciones
		$idiomas = ORM::for_table('myt_locale')->where_equal(array('idtotal'=>$id,'tabla'=>$tabla))->delete_many();
		
		
		$this->listado();
		
	}
	

	public function crearaccion()
	{
	
		$this->cargarConexion();
		$tabla  = $this->parametros_get['tabla'];
		
		$registro = ORM::for_table($tabla)->create();
	
		foreach ($_POST as $nom=>$val){
			
			if($_POST[$nom]!=''){
			$registro->$nom = $_POST[$nom];}
		}
		$registro->save();
		
		
		$res = ORM::for_table($tabla)->find_one($registro->id);
	 	$campos_editar = $this->lectura_campos($tabla,$res);

		
		$this->idiomas_registros();
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$registro->id."");
		die();
	
		
	}

	

	public function crear()
	{
		$this->cargarConexion();
		$tabla  = $this->parametros_get['tabla'];
		
		$this->idiomas_registros();
		$campos_editar = $this->lectura_campo_crear($tabla);
		
		$twig = $this->cargaTwig('src/templates');
		echo $twig->render('/backend/crear.html', array(
											'get'			=> $this->parametros_get,
											'trad_acceso'	=> $this->txt_pass,
											'trad'			=> $this->txt_comun,
											'cons'		 => $this->constantes,
											'idioma'	 => $this->packidiomas,
											'menuTablas' => $this->menuTablas,
											'res'	 => $campos_editar,
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
									
								if(isset($val_dep->$lista_depe[$nomdep]['campo_muetsra']))	{		
										$valor_campo_in = $val_dep->$lista_depe[$nomdep]['campo_muetsra']; 
										} else {$valor_campo_in = ''; }		
											
								$valor_campo = "<span class='mini'>id: $valor_campo   - </span> ".$valor_campo_in; 
								} else {
								$valor_campo = $valor_campo;	
								}
							$res = $valor_campo;
							} 
						
						elseif ($con_lista == 1) {
							
					if($valor_campo!=''){
						
							if($nomcampo==$lista_depe[$nomdep]['campo'] && $tabla==$lista_depe[$nomdep]['tabla']){
							$val_dep = ORM::for_table($lista_depe[$nomdep]['tabla_padre'])
										->select_many($lista_depe[$nomdep]['campo_busca'],$lista_depe[$nomdep]['campo_muetsra'])
										->find_one($valor_campo);
							
							
							if(isset($val_dep->$lista_depe[$nomdep]['campo_muetsra']))	{		
							$valor_campo = $val_dep->$lista_depe[$nomdep]['campo_muetsra']; 
							} else {$valor_campo = '';}
							
							
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
						
						
						}	else
						{
						$valor_campo ='';
						
						if($nomcampo==$lista_depe[$nomdep]['campo'] && $tabla==$lista_depe[$nomdep]['tabla']){
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
							}	
							
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
	

	public function configIMG()
	{
		$tablas = $this->gestorConfig->getGestor();
		$tablas = $tablas['IMG']['IMGtablas'];
		
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
			
			if($campos_detalle[1]=='select'){
				$resselect = $this->camposselect();
				foreach($resselect as $nomr=>$valr){
				if($resselect[$nomr]['campo']==$campos_detalle[0]){
						$lista = $resselect[$nomr]['valores_select'];}
				}
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
	

	public function insertaranidado()
	{
		$this->cargarConexion();
		$id  	= $this->parametros_get['id'];
		$tabla  = $this->parametros_get['tabla'];	
		
		$tabla_anidada = $_POST['tabla_anidada'];
		$nuevo_anidado = ORM::for_table($tabla_anidada)->create();
		
		$loscampos = $this->lectura_campo_crear($tabla_anidada);
		
		foreach($loscampos as $nom=>$val){
			$nuevo_anidado->$loscampos[$nom]['nombre'] = $_POST[$loscampos[$nom]['nombre']];
			}
		

		$nuevo_anidado->save();
		
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$id."");
		die();
	}


	public function editaranidado()
	{
		$this->cargarConexion();
		$id  		= $this->parametros_get['id'];
		$tabla  	= $this->parametros_get['tabla'];	
		$idanidado  = $this->parametros_get['idanidado'];
		
		$tabla_anidada = $_POST['tabla_anidada'];
		$loscampos = $this->lectura_campo_crear($tabla_anidada);
		
		$edita_anidada = ORM::for_table($tabla_anidada)->find_one($idanidado);

		foreach($loscampos as $nom=>$val){
			if($_POST[$loscampos[$nom]['nombre']]!=''){
			$edita_anidada->$loscampos[$nom]['nombre'] = $_POST[$loscampos[$nom]['nombre']];}
			}
		$edita_anidada->save();
		
		header("Location: ".$this->constantes->getHOME()."gestor/editar/".$tabla."/".$id."");
		die();
	}


	public function lectura_campo_crear($tabla)
	{
		$campos = $this->gestorConfig->getGestor();
		$campos = explode(',',$campos['Campos']['tab_'.$tabla]);
		
		$campos_editar=array();
		$n=0;
		
		foreach($campos as $nom=>$val){
			
			$campos_detalle=explode('|',$campos[$nom]);
			$valor = '';
			$lista = '';
			
			if($campos_detalle[1]=='depe'){
			// listamos campos dependientes
			$lista_depe = $this->crearDependientes();
			$valor1 = $this->buscar_dependencias($lista_depe,$tabla,$campos_detalle[0],'',1);
			$valor = '';
			$lista = $valor1['lista'];
			}
			
			
			if($campos_detalle[1]=='select'){
				$resselect = $this->camposselect();
				foreach($resselect as $nomr=>$valr){
					if($resselect[$nomr]['campo']==$campos_detalle[0]){
						$lista = $resselect[$nomr]['valores_select'];}
					}
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
		//nombre|normal|string,des|area|string
		$campos = $this->gestorConfig->getGestor();
		
		if(isset($campos['Campos']['trad_'.$tabla])){
		$campos = explode(',',$campos['Campos']['trad_'.$tabla]);
		$campos_trad=array();
		$n=0;
		
		$nombre='';
		$tipo='';
		$formato='';
		$resultado='';
		
		foreach($campos as $nom=>$val){
			$resultado='';
			
			$campos2 = explode('|',$campos[$nom]);
			
			if(count($res)>=1){
			
			foreach ($res as $item ){
				
				foreach ($campos2 as $nom2=>$val2){
				$nombre		= $campos2[0];
				$tipo 		= $campos2[1];
				$formato 	= $campos2[2];
				}
				
				if($campos2[0] == $item->nombrecampo){
					$resultado = $item->txt; }
				}
			} else {
				
				foreach ($campos2 as $nom2=>$val2){
				$nombre		= $campos2[0];
				$tipo 		= $campos2[1];
				$formato 	= $campos2[2];
				}
				
				
				
				}	
				
				
				$campos_trad[$n]=array(
							'nombre'	=> $nombre,
							'tipo'		=> $tipo,
							'formato'	=> $formato,
							'valor'		=> $resultado);
			$n++;
		
			}
		

		return $campos_trad;
		} else
		{ return $campos_trad=null;}	
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
