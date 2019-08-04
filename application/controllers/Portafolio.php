<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Portafolio extends CI_Controller {
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
		$data['titulo'] = "Portafolio";
		$data['actual'] = "portafolio";
		$data['desc'] = "Descripción Portafolio INMOTION";
		
		
		$this->load->view('public/head', $data);
		$this->load->view('public/portafolio', $data);
		$this->load->view('public/footer', $data);
	}
	
	
	
	public function articulo($name = ''){
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
		$data['titulo'] = "Portafolio Articulo";
		$data['actual'] = "portafolio_in";
		$data['desc'] = "Descripción Portafolio Articulo INMOTION";
		
		
		$this->load->view('public/head', $data);
		$this->load->view('public/portafolio_in', $data);
		$this->load->view('public/footer', $data);
	}
	

	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('inicio'));
	}

	
}



