<?php

class Login_c extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('session');
	}
	
	public function index()
	{
		$this->load->view('login/login',array('stat' => TRUE));
	}
	
	public function validate()
	{
		$status=$this->login_model->verify();
		
		if($status === FALSE)
		{
			$this->load->view('login/login',array('stat' => FALSE));
		}
		else
		{
			$this->session->set_userdata($status);
			$this->load->view('workarea/main',array('set' => '1'));
		}
	}
}
