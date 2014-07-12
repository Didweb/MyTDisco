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
	}
	
	public function login($urlregreso)
	{

		
		
		$twig = $this->cargaTwig('src/templates/seguridad');
		$redirect = $this->redirect;
		echo $twig->render('login.html', array(	'cons'	=> $this->constantes,
												'redirect' => $this->redirect,
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
		$twig = $this->cargaTwig('src/templates/seguridad');
		$redirect = $this->redirect;
		echo $twig->render('login2.html', array('cons'		=> $this->constantes,
												'redirect' 	=> $this->redirect,
												'regreso' 	=> $regreso));
		}
		
		
		
	
	}
	

}

?>
