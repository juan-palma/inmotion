<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Servicios extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
		
	public function index(){
		
		//Consulta - HOME-SECCIONES
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$this->basic_modal->campos = 'contenido_info';
		$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
		
		$isServicio = $this->basic_modal->genericSelect('sistema');
		$encontrar = array("\r\n", "\n", "\r");
		$remplazar = '';
		$nuevoValor = str_replace($encontrar, $remplazar, $isServicio[0]->contenido_info);
		
		$valoresDB = json_decode($nuevoValor);
		
		$data['serviciosDB'] = $valoresDB;
		$data['portafoliosDB'] = [];
		$data['titulo'] = "Servicios";
		$data['actual'] = "servicios";
		$data['desc'] = "Descripción Servicios INMOTION";
		
		$this->load->view('public/head', $data);
		$this->load->view('public/servicios', $data);
		$this->load->view('public/footer', $data);
	}
	
	public function send(){
		
	}
		
		
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



