<?php
require_once('vendor/mustangostang/spyc/Spyc.php'); 
class LecturasInterpretes
{
	private $controlador;

	public function LectorYamlRutas($RequestUrl)
		{
		$data = Spyc::YAMLLoad('config/rutas.yml');
		$phpCode = '$data = ' . var_export($data, TRUE) . ';';
		file_put_contents('app/tmp/rutas.php', "<?php\n\n class rutas \n { \n\n private " . $phpCode . " \n\n public function getRutas()\n{ \n return \$this->data; \n} \n\n} \n\n?>");  	
		return $this->ComprobarRuta($RequestUrl);
		}	


	/*
	 * Esta función Comprueba si existe la ruta en nuestro rutas.yml
	 * */
	public function ComprobarRuta($RequestUrl)
		{
		require_once ('app/tmp/rutas.php');
		$data = new rutas();
		
			foreach ($data->getRutas() as $key => $val) {
			   if ($val['url'] === $RequestUrl) {
				   return $this->controlador = $val['controller'];
			   }
			}
		return null;
			
		}
	
}

?>
