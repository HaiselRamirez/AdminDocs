<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('login')){
			redirect('Login','refresh');
		}
	}
	public function index()
	{
		$this->layout->view('index');
	}
}
