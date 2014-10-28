<?php
//require_once('vendor/mustangostang/spyc/Spyc.php'); 



class LecturasInterpretes
{
	public $controlador;
	public $metodo;
	public $redirect;
	public $constantes;
	public $locale;
	private $nueva_url;
	
	public $parametros_get;
	

	public function getParametros_get()
	{
		
	 return $this->parametros_get;	
	}

	public function setParametros_get($valor)
	{
		$this->parametros_get = $valor;
		return $this;
	}

	public function LectorYamlRutas($RequestUrl)
		{
		
		$originalFile = 'config/rutas.yml';
		$compiledFile = 'app/tmp/rutas.php';
		
		if(!$this->isCompiled($originalFile, $compiledFile)) {
			$data = Spyc::YAMLLoad('config/rutas.yml');
			$phpCode = '$data = ' . var_export($data, TRUE) . ';';
			file_put_contents('app/tmp/rutas.php', "<?php\n\n class rutas \n { \n\n private " . $phpCode . " \n\n public function getRutas()\n{ \n return \$this->data; \n} \n\n} \n\n?>");  	
			return $this->ComprobarRuta($RequestUrl,'app/tmp/rutas.php','rutas');
			}
			else {
				return $this->ComprobarRuta($RequestUrl,'app/tmp/rutas.php','rutas');	
			}
		
		}	

	

	public function LecturaLocaleYml($solicitud)
	{
		$separa = explode('_',$solicitud);
		$NomClase = ucfirst($separa[0]); 
		$originalFile = 'src/locale/'.$separa[1].'/'.$solicitud.'.yml';
		
		if(!file_exists($originalFile)){
				
				$mensaje = "Se ha producido un <b style='color:red'>ERROR</b> el archivo no existe: <br /><br /><b>$originalFile</b><br />  <br /><br /> NO existe este diccionario en el directorio <b>/src/locale/".$separa[1]."</b> <br /><br />Es necesario crear el archivo con las traducciones para que estas se puedan leer.";
				$this->error($mensaje);
				}
    
		
		
		
		$compiledFile = 'app/tmp/locale/'.$solicitud.'.php';
		
		if(!$this->isCompiled($originalFile, $compiledFile)) {
				$data = Spyc::YAMLLoad($originalFile);
				$phpCode = '$data = ' . var_export($data, TRUE) . ';';
				
				$getset='';
				$variables='';
				
				if (is_array($data)) {
					foreach($data as $nom=>$val){
						foreach($data[$nom] as $nom2=>$val2)
							{

							$variables.="\n private \$".$nom2." = \"".$data[$nom][$nom2]."\";\n";	

							
							$getset.=" \n \n \t public function get".ucfirst($nom2)."() {";
							$getset.=" \n \n \t \t return \$this->".$nom2."; ";	
							$getset.=" \n  \t \t } \n ";
							
							$getset.=" \n \n \t public function set".ucfirst($nom2)."(\$valor) {";
							$getset.=" \n \n \t \t  \$this->".$nom2." = \$valor; ";	
							$getset.=" \n \n \t \t return \$this; ";	
							$getset.=" \n  \t \t } \n ";
									
							}
						}
							
						
				}
				
				
				file_put_contents($compiledFile, "<?php\n\n class ".$separa[0]." \n { \n\n " .$variables ." \n private " .$phpCode ." \n\n \t public function get".$separa[0]."() { \n \t \t return \$this->data; \n \t \t } \n\n ".$getset."  \n\n} ?>");  	
			}

		require_once ($compiledFile);	
		$locale = new $NomClase();
		return $locale;	
		
	}




	public function LectorAnidados($par_anidados)
	{
		// pedidosdetalle,idpedidos|idproducto,cantidad
		$campos = array();
		$n=0;
		$separa = explode('|',$par_anidados);
		$separa1	= explode(',',$separa[0]);
		$separa2	= explode(',',$separa[1]);
		foreach ($separa2 as $nom=>$val){
			$campos[$n]=array($separa2[$nom]);
			$n++;
			}
		
		$res = array(
					'tablaanidada' 	=> $separa1[0],
					'idpadre'		=> $separa1[1],
					'campos'		=> $campos
					);
		return $res;			
	}







	/*
	 * Modificamos si es necesario la clase config donde almacenamos las constantes.
	 * */
	public function LectorYamlConfig()
		{
		
		
		$originalFile = 'config/config.yml';
		$compiledFile = 'app/tmp/config.php';
		
		if(!$this->isCompiled($originalFile, $compiledFile)) {
				$data = Spyc::YAMLLoad('config/config.yml');
				$phpCode = '$data = ' . var_export($data, TRUE) . ';';
				
				$getset='';
				$variables='';
				
				if (is_array($data)) {
					foreach($data as $nom=>$val){
						foreach($data[$nom] as $nom2=>$val2)
							{

							$variables.="\n private \$".$nom2." = \"".$data[$nom][$nom2]."\";\n";	

							
							$getset.=" \n \n \t public function get".ucfirst($nom2)."() {";
							$getset.=" \n \n \t \t return \$this->".$nom2."; ";	
							$getset.=" \n  \t \t } \n ";
							
							$getset.=" \n \n \t public function set".ucfirst($nom2)."(\$valor) {";
							$getset.=" \n \n \t \t  \$this->".$nom2." = \$valor; ";	
							$getset.=" \n \n \t \t return \$this; ";	
							$getset.=" \n  \t \t } \n ";
									
							}
						}
							
						
				} 
				file_put_contents('app/tmp/config.php', "<?php\n\n class config \n { \n\n " .$variables ." \n private " .$phpCode ." \n\n \t public function getConfig() { \n \t \t return \$this->data; \n \t \t }  \n\n ".$getset." \n\n} ?>");  	
			}

		require_once ('app/tmp/config.php');	
		$constantes = new config();
		return $constantes;
		}	



	public function LectorYamlGestor()
		{
		
		
		$originalFile = 'config/gestor.yml';
		$compiledFile = 'app/tmp/gestor.php';
		
		if(!$this->isCompiled($originalFile, $compiledFile)) {
				$data = Spyc::YAMLLoad('config/gestor.yml');
				$phpCode = '$data = ' . var_export($data, TRUE) . ';';
				
				$getset='';
				$variables='';
				
				if (is_array($data)) {
					foreach($data as $nom=>$val){
						foreach($data[$nom] as $nom2=>$val2)
							{

							$variables.="\n private \$".$nom2." = \"".$data[$nom][$nom2]."\";\n";	

							
							$getset.=" \n \n \t public function get".ucfirst($nom2)."() {";
							$getset.=" \n \n \t \t return \$this->".$nom2."; ";	
							$getset.=" \n  \t \t } \n ";
							
							$getset.=" \n \n \t public function set".ucfirst($nom2)."(\$valor) {";
							$getset.=" \n \n \t \t  \$this->".$nom2." = \$valor; ";	
							$getset.=" \n \n \t \t return \$this; ";	
							$getset.=" \n  \t \t } \n ";
									
							}
						}
							
						
				} 
				file_put_contents('app/tmp/gestor.php', "<?php\n\n class gestor \n { \n\n " .$variables ." \n private " .$phpCode ." \n\n \t public function getGestor() { \n \t \t return \$this->data; \n \t \t }  \n\n ".$getset." \n\n} ?>");  	
			}

		require_once ('app/tmp/gestor.php');	
		$gestor = new gestor();
		return $gestor;
		}	



	/*
	 * Modificamos si es necesario la clase config donde almacenamos las constantes.
	 * */
	public function LectorYamlSeguridad()
		{
		
		
		$originalFile = 'config/seguridad.yml';
		$compiledFile = 'app/tmp/seguridad.php';
		
		if(!$this->isCompiled($originalFile, $compiledFile)) {
				$data = Spyc::YAMLLoad('config/seguridad.yml');
				$phpCode = '$data = ' . var_export($data, TRUE) . ';';
				
				
				file_put_contents('app/tmp/seguridad.php', "<?php\n\n class SeguridadConfig \n {  \n private " .$phpCode ." \n\n \t public function getSeguridadConfig() { \n \t \t return \$this->data; \n \t \t }  \n\n  \n\n} ?>");  	
			}

		require_once ('app/tmp/seguridad.php');	
		$seguridad = new SeguridadConfig();
		return $seguridad;
		}	


	/*
	 * Esta función Comprueba si existe la ruta en nuestro rutas.yml
	 * En caso de no existir devuelve un valor null y 404
	 * */
	public function ComprobarRuta($RequestUrl,$path,$clase)
		{
		require_once ($path);
		$elGet = 'get'.ucfirst($clase);
		$data = new $clase();
	
			foreach ($data->$elGet() as $key => $val) {
				
			
			$this->JackUrl($val['url']);
			
			$verifica = preg_match($this->nueva_url,$RequestUrl);
				
			   if ($verifica===1) {
				  
				    $da = explode('::',$val['controller']);
				    $this->controlador 		= $da[0];
				    $this->metodo 			= $da[1];
				    $this->permiso 			= $val['permiso'];
				    $this->fuenteacceso 	= $val['fuenteacceso'];
				    $this->parametros_get 	= $this->JackParametros($RequestUrl,$val['url']);


				    if(isset($da[2])){
						$this->redirect = $da[2];}
						else{
						$this->redirect = 202;}
				    return true;
			   }
			}
			$this->controlador = 'Error';
			$this->metodo = 'error404';
			$this->redirect = 404;	
		return null;
		
			
		}


	
	
	public function JackUrl($url)
	{
		
		$nueva_url = '';
		
		$url1 = explode('/',$url);
		if(preg_match('/^\//',$url)){
			
			$nueva_url='(.*\w[^\/])';
			if(preg_match('/^{/',$url)){
		
			$url2 = $this->LimpioPara($url);
			foreach($url2 as $nom2=>$val2){
				
				if($nom2==1)
				{
				if($url2[$nom2]=='string'){
					$nueva_url .= '(.*\w[^\/])';
					} elseif ($url2[$nom2]=='int') {
					$nueva_url .= '(\d[^aA-zZ_-\/]*)';
					} elseif ($url2[$nom2]=='locale') {
					$nueva_url .= '(.*\w[^\/])';
					}
					
				}
				
				}
				
			}
			
			
		}else {
			
		foreach ($url1 as $nom=>$val)
		{
		
		if(preg_match('/^{/',$url1[$nom])){
			

			$url2 = $this->LimpioPara($url1[$nom]);
			foreach($url2 as $nom2=>$val2){
				
				if($nom2==1)
				{
				if($url2[$nom2]=='string'){
					$nueva_url .= '(.*\w)/';
					} elseif ($url2[$nom2]=='int') {
					$nueva_url .= '(\d[^aA-zZ_-]*)/';
					} elseif ($url2[$nom2]=='locale') {
					$nueva_url .= '(.*\w)/';
					}
					
				}
				
				}
				
			}else{
				$nueva_url .= $url1[$nom].'/';}
		
		}
	}
		if(substr($nueva_url, -1)=='/') {
			$nueva_url = substr($nueva_url, 0, -1); }
		$this->nueva_url = "#^".$nueva_url."(/)?$#"; 
		return $this;
		
	}



	public function JackParametros($RequestUrl,$ModeloUrl)
	{
		
		$des_RequestUrl = explode('/',$RequestUrl);
		$des_ModeloUrl	= explode('/',$ModeloUrl);
		
		$parametros = array();
		
		foreach($des_RequestUrl as $nom=>$val){
			
			foreach($des_ModeloUrl as $nom2=>$val){
				
				if(isset($des_ModeloUrl[$nom])){
					if($des_RequestUrl[$nom]!= $des_ModeloUrl[$nom]){
						$ordenes = $this->LimpioPara($des_ModeloUrl[$nom]);
						$parametros[$ordenes[0]] = strip_tags($des_RequestUrl[$nom]);
						
						}
					}	
			}
			
		} 
		$this->parametros_get = $parametros;
		return $parametros;
		
	}
	
	
	
	public function LimpioPara($tramo)
	{
		$limpio = str_replace(array('{','}'), "", $tramo);
		$desglose = explode(":",$limpio);
		return $desglose;	
	}


	public function isCompiled($originalFile, $compiledFile) 
	 { 
	   if (file_exists($compiledFile)) 
	   { 
		
		if (filemtime($originalFile) < filemtime($compiledFile)) { 
		  return TRUE; 
			} 
	   } 
	   
	   return FALSE; 
	 }
	
	
	public function error($valor)
	{
	throw new Exception ($valor);
	}
	
}

?>
