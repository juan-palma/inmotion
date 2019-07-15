<?php
	require('vendor/autoload.php');
	$dotenv  =  Dotenv\Dotenv::create(dirname(__DIR__));
	$dotenv -> load ();
		
	echo (getenv('PRUEBA'));
?>