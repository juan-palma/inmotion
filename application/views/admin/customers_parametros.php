<?php

	$idaMail_data = array();
	
	//Datos para el envio del correo.
	$idaMail_data['destino_mail'] = array();
	
	$idaMail_data['cc'] = array();
	
	$idaMail_data['bcc'] = array();
	$idaMail_data['bcc'][] = 'soporte@idalibre.com';
	$idaMail_data['bcc'][] = 'monserrat@radicaltesta.com';
	
	$idaMail_data['origen_nombre'] = 'Contacto - INMOTION';
	$idaMail_data['origen_mail'] = 'info@inmotion.com';
	$idaMail_data['reply_nombre'] = 'Sistema - INMOTION';
	$idaMail_data['reply_mail'] = 'informes@idalibre.com';
	$idaMail_data['organizacion'] = 'INMOTION';
	$idaMail_data['asunto'] = 'Nuevo contacto desde el formulario de tu sitio web.';
	
	$idaMail_data['priority'] = 3;
	$idaMail_data['encoding'] = 'quoted-printable';
	
/*
	$idaMail_data['host'] = 'smtp.gmail.com';
	$idaMail_data['port'] = 587;
	$idaMail_data['username'] = 'info@inmotion.com';
	$idaMail_data['password'] = 'pass';
*/
	
	$idaMail_data['username'] = '';
	
	
	$idaMail_data['texto_plano'] = '
		INMOTION:
		
		Datos de contacto de formulario.
				
		* * * * * *

		
		[ fin ]
	';
?>