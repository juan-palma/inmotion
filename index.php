<?php
	require('vendor/autoload.php');
	$dotenv = new Dotenv\Dotenv('../');
	$dotenv->load();
	
	//echo($_ENV["PRUEBA"]);
	echo (getenv('PRUEBA'));
	//echo (getenv('HOME'));
?>