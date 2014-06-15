<?php
//require_once 'app/Lecturas.php';
//require_once 'app/tmp/config.php';

class Kernel extends Lecturas
{
	public $cons;
	
	
	public function __construct()
	{
		$this->LectorYamlConfig();	
		if($_SERVER['HTTP_HOST']=='localhost')
			{
			define ('ENTORNO','_debug');	
			} else {
			define ('ENTORNO','');	
				
			}
			
	}
	
	public function setConstantes()
	{
	$cons = new config();	
	return $this->cons = $cons;	
	}

	public function getConstantes()
	{	
	return $this->cons;	
	}

	
}
?>
