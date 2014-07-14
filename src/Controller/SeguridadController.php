<?php
require_once 'app/Controlador.php';
require_once 'vendor/autoload.php';

class SeguridadController extends Controlador
{
	
	private $parametrosSeguridad;
	
	public function __construct($parametrosseg )
	{
		parent::__construct();	
		$this->parametrosSeguridad 	= $parametrosseg;
		
		$traducciones = $this->getLocaleTard();
		$diccionario = $traducciones->trad('formpass');
		$this->txt_comun = $diccionario;
	}
	
	public function login($urlregreso)
	{

		
		
		$twig = $this->cargaTwig('src/templates');
		$redirect = $this->redirect;
		echo $twig->render('seguridad/login.html', array(	
												'trad'		=> $this->txt_comun,
												'cons'		=> $this->constantes,
												'redirect' 	=> $this->redirect,
												'regreso'	=> $urlregreso));
	}
	
	
	public function check()
	{
		
		$acceso = new mySegurata($this->parametrosSeguridad);

	
		$acceso->visita($_POST['usuario'],$_POST['password']);
		
		$regreso = $_POST['regreso'];
		echo "getRes_entrada =".$acceso->getRes_entrada();
		if($acceso->getRes_entrada()==1){
		
		if(!isset($_SESSION['user']) && !isset($_SESSION['pass']) && $acceso->getRes_entrada()==1 ){
			$_SESSION['user'] = $acceso->getUser();
			$_SESSION['pass'] = $acceso->getAcceso();
			
			echo "Se han registrado las sesiones: User: ".$_SESSION['user']." Pass:".$_SESSION['pass'];
			} else {
				$_SESSION['user'] = $acceso->getUser();
				$_SESSION['pass'] = $acceso->getAcceso();
				echo "Ya estaban: User: ".$_SESSION['user']." Pass:".$_SESSION['pass'];
				}
				
				header('Location: '.$this->constantes->getHOME().$regreso);
				exit;
				
		} else {
			
		echo "<h1>NO PERIMITIDO [ metodo check ]</h1>";	
		$twig = $this->cargaTwig('src/templates');
		$redirect = $this->redirect;
		echo $twig->render('seguridad/login2.html', array(
												'trad'		=> $this->txt_comun,
												'cons'		=> $this->constantes,
												'redirect' 	=> $this->redirect,
												'regreso' 	=> $regreso));
		}
		
		
		
	
	}
	
	
	public function checkout()
	{
		$acceso = new mySegurata($this->parametrosSeguridad);
		$_SESSION['user']='';
		$_SESSION['pass']='';
		$acceso->setRes_entrada(0);
		header('Location: '.$this->constantes->getHOME());
		exit;	
	}

}

?>
