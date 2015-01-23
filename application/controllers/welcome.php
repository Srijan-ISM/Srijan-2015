<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	/* public function index()
	{
		$this->load->view('welcome_message');
	}
	*/
	
	public function index()
{
	$this->load->helper('form');
	$this->load->library('form_validation');

	$this->form_validation->set_rules('first', 'First', 'required');
	$this->form_validation->set_rules('last', 'last', 'required');

	if ($this->form_validation->run() === FALSE)
	{
		
		$this->load->view('user_reg/registration');
	}
	else
	{
		$this->user_reg_model->set_user();
		$this->load->view('user_reg/success');
	}
}
	
	
	
	
}
?>