<?php

class Main_c extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->library('form_validation');
		$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('session');
	
	}
	
	public function index()
	{
		$this->load->view('workarea/main',array('set' => '0'));
	}
	public function verify() {
		$this->main_model->verify();
		if($this->input->post('table') === 'event_team_reg')
		$this->load->view('workarea/verify');
	else
		$this->load->view('workarea/validate_admin');
	}
	public function approved() {
		if($this->input->post('act') === 'email')
		{
			$this->main_model->sendemail();
		}
		else if($this->input->post('act') === 'sms')
		{
			$this->main_model->sendsms();
		}
			else{
				$this->main_model->verify();
			}
			$this->load->view('workarea/approved',array('task' => $this->input->post('task')));
	}
	public function work($action)
	{
		switch($action)
		{
			
			case '1':$this->load->view('workarea/verify');break;
			case '2':$this->load->view('workarea/approved',array('task' => '2'));break;
			case '3':$this->load->view('workarea/approved',array('task' => '3'));break;
			case '4':$this->load->view('workarea/updateevent',array('img_error' => '101'));break;
			case '5':
			case '6':$this->load->view('workarea/view_all_contestants',array('count' => '0'));break;
			case '7':$this->load->view('workarea/view_reg_team',array('count' => '0'));break;
			case '8':
			case '9':$this->load->view('workarea/validate_admin');break;
			case '10':
			case '11':
			case '12':
			case '13':
			case '14':
		}
	}
	
	public function member_show($team_id)
	{
		$this->load->view('workarea/member_show',array('team_id'=> $team_id));
	}
	
	public function first() {
		$this->load->view('workarea/first');
	}
	
	public function viewall() {
		$this->load->view('workarea/viewall');
	}
	
	public function updateevent() {
		
		$this->main_model->event_update();
		if($_FILES["userfile"]["tmp_name"]){
			
			$config['upload_path'] = './event_img/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
		
		
		if ( ! $this->upload->do_upload())
		{
			$error = $this->upload->display_errors();

			$this->load->view('workarea/updateevent',array('img_error' => $error));
			
		}
		else
		{
			$data = $this->upload->data();

			$this->db->where(array('eid' => $this->session->userdata('event_id')));
		$this->db->update('events',array('e_image' => $data['full_path']));
		$this->load->view('workarea/updateevent',array('img_error' => 'noerror'));
		}
		
		}
		else
		$this->load->view('workarea/updateevent',array('img_error' => 'noerror'));
	}
	
	public function view_all_conts()
	{
$query = $this->main_model->select_query();
$data=array();
$c=0;
foreach($query->result_array() as $row)
{
	$data['values'][$c] = $row;
	$c++;
}

$data['count'] = $c;
if($this->input->post('table') === 'user_reg')
$this->load->view('workarea/view_all_contestants',$data);
else
	$this->load->view('workarea/view_reg_team',$data);
	
	}
	
}
