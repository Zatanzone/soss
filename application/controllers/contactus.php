<?php

class Contactus extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('header');
		$this->load->view('contactus/contactus');
		$this->load->view('footer');	
	}
}
?>