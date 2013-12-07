<?php
class Form extends CI_Controller {

	function index()
	{
		$this->load->view('manuindex');
		$this->load->view('form/signin');
	}
	
	function signin() {
	$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('manuindex');
			$this->load->view('form/signin');			
		}
		else
		{
			echo "Sign In Success!!";
			//$this->load->view('index/formsuccess');
		}
	}
	
	function signup() {
		
	}
	
}
?>