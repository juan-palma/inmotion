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
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'contenido_info';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
			
			$isServicio = $this->basic_modal->genericSelect('sistema');
			$data['serviciosDB'] = $isServicio[0];
			
			$data['titulo'] = "Home";
			$data['actual'] = "home";
			$data['varFlash'] = $this->varFlash;
			$this->load->view('admin/head2', $data);
			$this->load->view('admin/saveControl', $data);
			$this->load->view('admin/home', $data);
			$this->load->view('admin/footer2', $data);
		} else{
			$post = $this->input->post(NULL,FALSE);
			$this->session->set_userdata('formData', $post);
			redirect(base_url('admin/home/send'));
		}
	}
	
	public function send(){
		isNoLogged();
		
		print_r($_FILES);
        echo('<br /><br /><br />');
        print_r($_POST);
        
        $json = array();
		$json['status'] = 'ok';
		$json['valores'] = array();
		$json['errores']  = array();
		
		
		//Seccion para procesar informacion de SERVICIOS.
		$config['upload_path']		= FCPATH.'assets/public/img/';
        $config['allowed_types']	= 'gif|jpg|png';
        $config['max_size']			= 1024;
        $config['overwrite']		= true;

        $this->load->library('upload', $config);
        
        $todasCargaron = true;
        $rutaImagenes = [];
        
        foreach ($_FILES['servicios'] as $i=>$v) {
			if ( ! $this->upload->do_upload('servicio['.$i.'][icono]') ){
				$todasCargaron == false;
				$error = array('error' => $this->upload->display_errors());
				print_r($error);
			} else{
				$result = $this->upload->data();
				$rutaImagenes[] = $result;
			}
		}
		print_r($rutaImagenes);
        
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
	
	
	public function do_upload(){
		//print_r($_FILES);
		//echo('<br /><br /><br />');
		//print_r($_POST);
		//echo('<br /><br /><br />');
		
		$json = array();
		$json['status'] = 'ok';
		$json['valores'] = array();
		$json['errores']  = array();
		
		
		//Seccion para procesar informacion de SERVICIOS.
		$config['upload_path']		= FCPATH.'assets/public/img/servicios';
		$config['allowed_types']	= 'gif|jpg|png';
		$config['max_size']			= 1024;
		$config['overwrite']		= true;
		
		$this->load->library('upload', $config);
		
		$todasCargaron = true;
		$rutaImagenes = [];
		$servicios = count($_POST['servicios']['servicio']);
		//foreach ($_FILES['servicio'] as $i=>$v) {
		for ($i = 0; $i < $servicios; $i++) {
			if ( ! $this->upload->do_upload('servicio'.$i.'_icono') ){
				$todasCargaron == false;
				$json['errores'][] = array('error' => $this->upload->display_errors());
			} else{
				$result = $this->upload->data();
				$rutaImagenes[] = $result;
				$json['valores'][] = $result['file_name'];
			}
		}
		
		if($todasCargaron == true){
			//Datos de la seccion Servicios.
			$linea_servicios = '{"titulo_general":"'.$_POST['servicios']['titulo'].'", "servicios":[';
			foreach ($_POST['servicios']['servicio'] as $i=>$v) {
				if($i !== 0){ $linea_servicios .= ', '; }
				$linea_servicios .= '{"foto":"'.$rutaImagenes[$i]['file_name'].'", "titulo":"'.$v['titulo'].'", "texto":"'.$v['texto'].'", "enlace":"'.$v['enlace'].'"}';
			}
			$linea_servicios .= ']}';
			
			//consultar si existe un registro con valores para HOME-SECCIONES para saber si interta nuevo registro o actualizar el actual.
			//Consulta - HOME-SECCIONES
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			$this->basic_modal->campos = 'id_contenido';
			$this->basic_modal->condicion = array( "contenido_pagina" => 'home', "contenido_seccion" => 'servicios' );
			
			$isServicio = $this->basic_modal->genericSelect('sistema');
			
			//Insertar los valores en la base de datos
			//Consulta
			$this->basic_modal->clean();
			$this->basic_modal->tabla = 'contenido';
			
			if(count($isServicio) > 0){
				//Consulta UPDATE servicios
				$this->basic_modal->condicion = array('id_contenido', $isServicio[0]->id_contenido);
				$valores = array('contenido_info' => $linea_servicios);
				$update = $this->basic_modal->genericUpdate('sistema', $valores);
			} else{
				//Consulta INSERT servicios
				$valores = array( 'contenido_info' => $linea_servicios, 'contenido_pagina' => 'home', 'contenido_seccion' => 'servicios', 'contenido_user' => $_POST['userID']);
				$insert = $this->basic_modal->genericInsert('sistema', $valores);
				echo($insert);
				echo('<br /><br /><br />');
			}
			
			
			
			
			
						
			
		} else{
			$json['errores'][] = 'No se cargaron todas las imágenes de la sección de servicios.';
		}
		
		
		
		
		//Fin de la operación y retorno de la respuesta JSON a la consulta.
		echo( json_encode($json) );
	        
	}
	
}



