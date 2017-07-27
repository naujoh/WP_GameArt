<?php
	//Iniciar o reanudar  sesion
	if(session_status() != PHP_SESSION_ACTIVE){
	  session_start();
	}
	$connection = new PDO('mysql:host=localhost;dbname=gameart', 'gaadmin', '12345');
?>