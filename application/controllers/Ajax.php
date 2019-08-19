<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Ajax extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		
	}
	
	
	
		
	public function footerForm(){
		$json = array();
		$json['status'] = 'ok';
		$json['valores'] = array();
		$json['errores']  = array();
		
		$this->load->helper('mail');
		require(VIEWPATH.'admin/customers_parametros.php');
		
		$idaMail_data['destino_mail'][] = 'juan.palma@me.com';
		$template = FCPATH.'assets/public/template/contactoForm.php';
		$info = array();
		$info['nombre'] = $_POST['nombre'];
		$info['mail'] = $_POST['correo'];
		$info['tel'] = $_POST['telefono'];
		$info['mensaje'] = $_POST['mensaje'];
		$info['logo'] = base_url('assets/public/img/logo_inmotion.jpg');
		$info['empresa'] = 'INMOTION';
		$info['sitio'] = base_url();
		
		$respMail = ida_sendMail($template, $info, $idaMail_data);
		if($respMail){
			$json['valores'][] = 'Se envió de correo de manera correcta.';
		}
		
		echo( json_encode($json) );
	}
	
	
	public function downloadVcard(){
		header('Content-Type: text/x-vcard');  
		header('Content-Disposition: inline; filename="inmotion.vcf"');
		echo (vcard());
	}
			
		
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



