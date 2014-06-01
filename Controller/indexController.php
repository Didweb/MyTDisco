<?php

class indexController extends Controller
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->_view->titulo = "Portada";
		$this->_view->cuerpo = "Este es el cuerpo de la Portada";
		$this->_view->render('index');
	}
	
	public function segunda()
	{
		$this->_view->titulo = "Segunda Página";
		$this->_view->cuerpo = "Este es el cuerpo de la segunda página";
		$this->_view->render('index');
	}
}

?>
