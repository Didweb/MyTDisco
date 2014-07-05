<?php
require_once 'app/Lecturas.php';

class AppLocale extends Lecturas
{

	private $solicitud;
	private $elidioma;

	public function __construct($solicitud = null)
	{
		$this->setElidioma($solicitud);
		
	}
	
	public function setSolicitud($valor = null)
	{
		$this->solicitud = $valor;
		return $this;
	}


	public function getSolicitud()
	{
		return $this->solicitud;
	}
	
	public function setElidioma($valor = null)
	{
		$this->solicitud = $valor;
		return $this;
	}


	public function getElidioma()
	{
		return $this->solicitud;
	}
	
	public function trad($solicitud)
	{ 
		$solicitud = $solicitud.'_'.$this->getElidioma();
		$this->setSolicitud($solicitud);
		return $this->LecturaLocale($this->getSolicitud());
	}
}

?>
