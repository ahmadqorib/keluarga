<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		$this->form_validation->set_rules('username','username','required', 
			array('required' => '%s masih kosong')
		);
		$this->form_validation->set_rules('password','password','required',
			array('required' => '%s masih kosong')
		);

		if($this->form_validation->run()==FALSE){
			$this->load->view('login');
		}else{
			$user = $this->input->post('username');
			$pass= $this->input->post('password');
			// $data = array($user => 'admin', $pass => 'admin');
			if($user == 'admin' && $pass == 'admin'){
				$this->session->set_userdata('logged_in', TRUE);
				redirect(site_url('adminportal'));
			}else{
				$this->session->set_flashdata('ket','error');
				$this->load->view('login');
			}
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		redirect(site_url('welcome'));
	}
}
