<?php
require_once('vendor/mustangostang/spyc/Spyc.php'); 

class LecturasInterpretes
{
	static $controlador;
	static $metodo;
	static $redirect;
	static $constantes;


	public function LectorYamlRutas($RequestUrl)
		{
		
		
		$originalFile = 'config/rutas.yml';
		$compiledFile = 'app/tmp/rutas.php';
		
		if(!$this->isCompiled($originalFile, $compiledFile)) {
			$data = Spyc::YAMLLoad('config/rutas.yml');
			$phpCode = '$data = ' . var_export($data, TRUE) . ';';
			// Lectura y escritura para el propietario, nada para los demás
			//chmod("app/tmp/rutas.php", 0755);
			file_put_contents('app/tmp/rutas.php', "<?php\n\n class rutas \n { \n\n private " . $phpCode . " \n\n public function getRutas()\n{ \n return \$this->data; \n} \n\n} \n\n?>");  	
			return $this->ComprobarRuta($RequestUrl,'app/tmp/rutas.php','rutas');
			}
		else {
			return $this->ComprobarRuta($RequestUrl,'app/tmp/rutas.php','rutas');	
			}
		
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
			if (is_array($data))
{
			foreach($data as $nom=>$val){
				foreach($data[$nom] as $nom2=>$val2)
					{
					$variables.="\n private \$".$nom2." = \"".$data[$nom][$nom2]."\";\n";	

					
					$getset.=" \n \n \t public function get".ucfirst($nom2)."() {";
					$getset.=" \n \n \t \t return \$this->".$nom2."; ";	
					$getset.=" \n  \t \t } \n ";		
					}
					
				}
			} else {echo "NO ES ARRAY";}
			// Lectura y escritura para el propietario, nada para los demás
			//chmod("app/tmp/config.php", 0755);
			file_put_contents('app/tmp/config.php', "<?php\n\n class config \n { \n\n " .$variables ." \n private " .$phpCode ." \n\n \t public function getConfig() { \n \t \t return \$this->data; \n \t \t }  \n\n ".$getset." \n\n} ?>");  	
			return $this->ComprobarRuta($RequestUrl,'app/tmp/config.php','config'); }
		else {
			return $this->ComprobarRuta($RequestUrl,'app/tmp/config.php','config');	 }
			
			
			
		require_once ('app/tmp/config.php');	
		$constantes = new config();
		return $constantes;
		}	


	/*
	 * Esta función Comprueba si existe la ruta en nuestro rutas.yml
	 * */
	public function ComprobarRuta($RequestUrl,$path,$clase)
		{
		require_once ($path);
		$elGet = 'get'.ucfirst($clase);
		echo $path.' - '.$RequestUrl;
		$data = new $clase();
		
			foreach ($data->$elGet() as $key => $val) {
			   if ($val['url'] === $RequestUrl) {
				   echo "<br /> ---------->PIT  ".$da;
				    $da = explode('::',$val['controller']);
				    $this->controlador = $da[0];
				    $this->metodo = $da[1];
				    if(isset($da[2])){
				    $this->redirect = $da[2];}
				    else{
					$this->redirect = 302;}
				    return true;
			   }
			}
		return null;
			
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
	
	
	
}

?>
