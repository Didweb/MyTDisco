<?php
require_once 'app/LecturasInterpretes.php';


class Lecturas extends LecturasInterpretes
{
	
	public function BuscaUrl($RequestUrl)
	{
		return $this->LectorYamlRutas($RequestUrl); 
	}

}
?>
