<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		
class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public $varFlash = 'flashHome';
	public $success = [];
	public $error = [];
	
	public function index(){
		isNoLogged();
		
		if ($this->form_validation->run() == FALSE)
		{
			$data['titulo'] = "Home";
			$data['actual'] = "home";
			$data['varFlash'] = $this->varFlash;
			$this->load->view('admin/head2', $data);
			$this->load->view('admin/saveControl', $data);
			$this->load->view('admin/home', $data);
			$this->load->view('admin/footer2', $data);
		} else{
			$post = $this->input->post(NULL,FALSE);
			//$this->session->set_userdata('formData', $post);
			redirect(base_url('admin/home/send'));
		}
	}
	
	public function send(){
		//isNoLogged();
		
		$json = array();
		$json['status'] = 'ok';
		$json['valores'] = array();
		$json['errores']  = array();
		
		$config['upload_path']          = FCPATH.'assets/public/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;

        $this->load->library('upload', $config);

        if ( !$this->upload->do_upload('userfile'))
        {
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
        }
        else
        {
			$data = array('upload_data' => $this->upload->data());
			print_r($data);
        }
		
		
/*
		$datos = '';
		if ( isset( $_REQUEST['datos'] ) ) {
			$datos = json_decode( str_replace("\\", '', $_REQUEST['datos']) );
		} else{
			die('No hay datos en la consulta.');
		}
*/
		
		
		// cargar imagenes
		//require_once(VIEWPATH.'admin/customers_modules.php');
		
/*
		$config['upload_path'] = FCPATH.'assets/public/img/' ;
        $config['allowed_types'] 	=  'jpg|jpeg|png|gif';
        $config['max_size'] 		=  2048;
        $config['overwrite'] 		=  true;

        $this->load->library('upload', $config);
*/
        
/*
        $config['upload_path']          = FCPATH.'assets/public/img/' ;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;

        $this->load->library('upload', $config);

        $todasCargaron = true;
        $rutaImagenes = [];
        
        foreach ($datos->servicios as $i=>$v) {
			if ( ! $this->upload->do_upload($v->foto) ){
				$todasCargaron == false;
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			} else{
				$result = $this->upload->data();
				$rutaImagenes[] = $result['full_path'];
			}
		}
		print_r($rutaImagenes);
*/
		
/*		if($todasCargaron !== true){
			$json['errores'][] = 'No se cargaron todas las imagenes de los iconos de los servicios.';
			echo( json_encode($json) );
			return false; 
		} 
		
		//Datos de la seccion Servicios.
		$linea_servicios = "'[";
		foreach ($datos->servicios as $i=>$v) {
			$linea_servicios .= "{'foto':'".$rutaImagenes[$i]."', 'titulo':'".$v['titulo']."', 'texto':'".$v['texto']."', 'enlace':'".$v['enlace']."'},";
		}
		$linea_servicios = "]";
		
		//Insertar los valores en la base de datos
		//Consulta insertar servicios
		$this->basic_modal->clean();
		$this->basic_modal->tabla = 'contenido';
		$valores = array( 'contenido_info' => $linea_servicios, 'contenido_pagina' => 'home', 'contenido_seccion' => 'servicios', 'contenido_user' => 1);
		$json['valores'][] = $valores;
		$insert = $this->basic_modal->genericInsert('sistema', $valores);
*/
		
		

		//echo( json_encode($json) );
		//$this->session->set_flashdata($this->varFlash.'Success', $this->success);
		//$this->session->set_flashdata($this->varFlash.'Error', $this->error);
		//redirect(base_url('admin/home'));
	}
		
		
	
	public function clean(){
		unset(
	        $_SESSION['formData']
		);
		
		redirect(base_url('admin/home'));
	}
	
}



