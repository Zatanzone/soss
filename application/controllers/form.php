<?php
class Form extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->library('encrypt');
	}
	
	

	function index()
	{
		//$this->load->view('manuindex');
		//$this->load->view('form/signin');
	}
	
	public function admin(){
		
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		
		
		if ($this->form_validation->run() == FALSE)
		{
			//$this->load->view('manuindex');
			$this->load->view('form/admin');
		}
		else
		{
				
			$signin['email']  = $this->input->post('email');
			$hashPassword = $this->encrypt->sha1($this->input->post('password'));
			$signin['pwd'] = $hashPassword;
				
			$data = $this->Admin_model->checkSignIn($signin);
				
			if ($data) {

				$this->Sess->setsession($data['login']);
		
				redirect('/admin','refesh');
			}else{
				//$this->load->view('manuindex');
				$this->load->view('form/admin');
			}
		
		}
		
	}
	
	function signin() {
		
		
		
		function generate_token ($len = 8)
		{
		
			// Array of potential characters, shuffled.
			$chars = array(
					'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
					'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
					'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
					'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
					'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
			);
			shuffle($chars);
		
			$num_chars = count($chars) - 1;
			$token = '';
		
			// Create random token at the specified length.
			for ($i = 0; $i < $len; $i++)
			{
			$token .= $chars[mt_rand(0, $num_chars)];
			}
		
			return $token;
		
		}
		

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
			$hashPassword = $this->encrypt->sha1($this->input->post('password'));
			$signin['pwd'] = $hashPassword;
			
			$data = $this->User_model->checkSignIn($signin);
			
			if ($data) {
				
// 				print_r($data['login']);
				$this->Sess->setsession($data['login']);
				
				redirect('/main','refesh');
			}else{
				echo "<script>";
				echo "alert('E-mail or Password invalid!');";
				echo "</script>";
				$this->load->view('manuindex');
				$this->load->view('form/signin');
			}
						
		}
	}
	
	function signup() {
		
		//$this->load->view('form/signup');
		$this->load->library('encrypt');
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
			$hashPassword = $this->encrypt->sha1($this->input->post('password'));
			$regis['password']=$hashPassword;
			$regis['name']=$this->input->post('name');
			$regis['phone']=$this->input->post('phone');
			
			$config['upload_path']="images/pic_profile/";
			$config['allowed_types']="jpg|gif|png"; //set type of file that can be upload
			$config['max_size']= 1024; // kb
			$config['max_height']= 1024; //pixel
			$config['max_width']= 1024; //pixel
			$this->load->library("upload",$config);
			
			
			if ($this->upload->do_upload("avatar")) { // ถ้าอัพโหลดได้
				$data=$this->upload->data();
				$regis['avatar'] = $data['file_name'];
			}else{
				echo  $this->upload->display_errors();
			}

			$result = $this->User_model->register($regis);
		
		}
	}
	
	function forgetpassword() {
		
		
		$this->load->view('manuindex');
		$this->load->view('form/forgetpassword');
		
		
		
	}
	
	
}
?>