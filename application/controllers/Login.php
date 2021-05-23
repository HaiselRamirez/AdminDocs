<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginModel');
	}

	public function index()
	{
		if($this->session->userdata('login')){
			redirect('Inicio');
		}else{
			$this->load->view('login');
		}
	}


	public function entrar()
	{
		if (!$this->session->userdata('login')) {
			if ($this->input->is_ajax_request()) {
				$this->form_validation->set_rules('tUser', 'Usuario', 'trim|required|alpha_numeric');
				$this->form_validation->set_rules('tPass', 'Clave', 'trim|required');
				$this->form_validation->set_message('required', 'El campo %s es requerido');
				$this->form_validation->set_message('alpha_numeric', ' %s debe ser alfanumerico, sin espacio');
				if ($this->form_validation->run() == FALSE) {
					$data = array(
						'error' => TRUE,
						'eUser' => form_error('tUser'),
						'ePass' => form_error('tPass'),
					);
				} else {
					$user = $this->input->post('tUser');
					$pass = md5($this->input->post('tPass'));
					$lo = $this->loginModel->entrar($user, $pass);
					if($lo != FALSE){
						$data = array(
							'login' 		=> TRUE,
							'id' 				=> $lo->id,
							'usuario' 	=> $lo->user,
							'clave' 		=> $lo->pass,
							'nombre' 		=> $lo->nombre,
							'correo' 		=> $lo->correo,
							'foto' 			=> $lo->foto,
							'rol' 			=> $lo->rol,
							'funcion' 	=> $lo->funcion,
							'code_camp' => $lo->code_camp,
							'campus' 		=> $lo->campus
						);
						$this->session->set_userdata($data);
					}else{
						$data = array(
							'error' => TRUE,
							'eLogin' => "Usuario y clave no coinciden"
						);
					}
				}
				echo json_encode($data);
			}else{
				show_404();
			}
		}else{
			redirect('Inicio', 'refresh');
		}
	}


	public function salir(){
		if ($this->input->is_ajax_request()) {
			try {
				$this->session->sess_destroy();
				$data = array(
					'success' =>TRUE,
					'mensaje' => "hasta luego!"
				);
			} catch (Exception $e) {
				$data = array(
					'error' =>TRUE,
					'mensaje' => "Ocurrió un error al salir del sistema" . $e.intl_get_error_message()
				);
			}
			echo json_encode($data);	
		}
	}
}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */