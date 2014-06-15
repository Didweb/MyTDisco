<?php
//require_once 'app/Lecturas.php';
//require_once 'app/tmp/config.php';

class Kernel extends Lecturas
{
	public $cons;
	
	public function __construct()
	{
		$this->LectorYamlConfig();	
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
