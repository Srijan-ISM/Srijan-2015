<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mobile extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->view('mob-view/template/header');
		$this->load->view('mob-view/template/footer');
	}
	public function index(){
		$this->load->view('mob-view/index');
	}
}