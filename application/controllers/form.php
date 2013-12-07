<?php
class Form extends CI_Controller {
	
	

	function index()
	{
		//$this->load->view('manuindex');
		//$this->load->view('form/signin');
	}
	
	function signin() {
		
		//$this->load->library('session');
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
			
			$signin['email']  = $this->input->post('email');
			$signin['pwd'] = $this->input->post('password');
			
			$data = $this->User_model->checkSignIn($signin);
			
			if ($data) {
				
// 				print_r($data['login']);
				$this->Sess->setsession($data['login']);
				
				redirect('/main','refesh');
			}else{
				$this->load->view('manuindex');
				$this->load->view('form/signin');
			}
						
		}
	}
	
	function signup() {
		
		//$this->load->view('form/signup');
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('manuindex');
			$this->load->view('form/signup');
		}
		else
		{
			echo "Sign In Success!!";
			//$this->load->view('index/formsuccess');
		}
	}
	
}
?>