<?php

	$idaMail_data = array();
	
	//Datos para el envio del correo.
	$idaMail_data['destino_mail'] = array();
	
	$idaMail_data['cc'] = array();
	
	$idaMail_data['bcc'] = array();
	$idaMail_data['bcc'][] = 'soporte@idalibre.com';
	
	$idaMail_data['origen_nombre'] = 'Gracias - American Express';
	$idaMail_data['origen_mail'] = 'informes@idalibre.com';
	$idaMail_data['reply_nombre'] = 'Soporte - American Express';
	$idaMail_data['reply_mail'] = 'informes@idalibre.com';
	$idaMail_data['organizacion'] = 'American Express';
	$idaMail_data['asunto'] = 'Gracias por interesarte en nuestros servicios American Express';
	
	$idaMail_data['priority'] = 3;
	$idaMail_data['encoding'] = 'quoted-printable';
	
	$idaMail_data['host'] = 'smtp.gmail.com';
	$idaMail_data['port'] = 587;
	$idaMail_data['username'] = 'informes@idalibre.com';
	$idaMail_data['password'] = 'Informes.libre';
	
	$idaMail_data['username'] = '';
	
	
	$idaMail_data['texto_plano'] = '
		American Express:
		
		Invite de Nuevo Registro.
				
		* * * * * *

		
		[ fin ]
	';
?>