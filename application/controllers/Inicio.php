<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	
	public $varFlash = 'flashLeadLogin';
	public $success = [];
	public $error = [];
	
	public function index(){
		isLeadLogged();
		
		if ($this->form_validation->run() == FALSE)
		{
			$fondos = @get_filenames(FCPATH.'assets/admin/img/loginBackground/');
			$data['fondo'] = ( (isset($fondos) && count($fondos) > 0) ) ? $this->security->sanitize_filename($fondos[random_int(0, (count($fondos)-1))]) : '';
			$data['titulo'] = "Login";
			$data['varFlash'] = $this->varFlash;
			$this->load->view('admin/head', $data);
			$this->load->view('public/login');
			$this->load->view('admin/footer', $data);
		} 
		else
		{
			$redir = current_url();;
			$post = $this->input->post(NULL,FALSE);
			
			if( $post['username'] !== '' && $post['password'] !== '' ){
				
				//Consulta
				$this->basic_modal->clean();
				$this->basic_modal->tabla = 'completados';
				$this->basic_modal->campos = 'completo_time';
				$this->basic_modal->condicion = array("completo_rfc" => $post['username']);
				
				$result = $this->basic_modal->genericSelect('sistema');
				if(isset($result) && count($result) > 0){
					$this->error[] = 'Ya se ha completado el proceso para este usuario, Pongase en contacto con un ejecutivo.';
					$this->session->set_flashdata($this->varFlash.'Error', $this->error);
					redirect(base_url());
				}
				
				
				//Consulta
				$this->basic_modal->clean();
				$this->basic_modal->tabla = 'leads';
				$this->basic_modal->campos = 'id_lead, lead_rfc, lead_nombre, lead_apellidos, lead_extranjero';
				$this->basic_modal->condicion = array("lead_rfc" => $post['username'], 'lead_pass' => $post['password']);
				
				$result = $this->basic_modal->genericSelect('sistema');
				
				if(isset($result) && count($result) > 0){
					$leadData = array(
						'id_lead' => $result[0]->id_lead,
						'lead_rfc' => $result[0]->lead_rfc,
						'lead_nombre' => $result[0]->lead_nombre,
						'lead_apellidos' => $result[0]->lead_apellidos,
						'lead_extranjero' => $result[0]->lead_extranjero
					);
					$this->session->set_userdata($leadData);
					$redir = base_url('public/carga_archivos');
	
				} else{
					$this->error[] = 'No son validos los datos que proporciono, verifique Su usuario y contraseña y trate de nuevo.';
					$redir = current_url();
				}

			} 
			
						
			$this->session->set_flashdata($this->varFlash.'Success', $this->success);
			$this->session->set_flashdata($this->varFlash.'Error', $this->error);
			redirect($redir);
		}
	}
	
	
	
	public function out(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}