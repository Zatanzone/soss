<?php
class Session extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}	
	
	public function signout(){
		$this->session->sess_destroy();
		redirect('index','refesh');
	}
	
}
