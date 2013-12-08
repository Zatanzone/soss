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
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('avatar', 'Avatar', 'emtry');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('manuindex');
			$this->load->view('form/signup');
		}
		else
		{
			$regis['email']=$this->input->post('email');
			$regis['password']=$this->input->post('password');
			$regis['name']=$this->input->post('name');
			$regis['phone']=$this->input->post('phone');
			$regis['avatar']=$this->input->post('avatar');
			
			$result = $this->User_model->register($regis);
		
		}
	}
	
}
?>