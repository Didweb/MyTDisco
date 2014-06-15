<?php
require_once 'app/Request.php';
require_once 'app/Bootstrap.php'; 

 try{
	 
	echo '<br />'.Bootstrap::run(new Request);
	} catch(Exception $e){
	echo '<br />'.$e->getMessage();
	}

?>
