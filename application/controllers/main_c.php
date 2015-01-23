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
			case '10':$this->load->view('workarea/event_cat',array('error' => 'noerror'));break;
			case '11':$this->load->view('workarea/enter_events',array('error' => 'noerror'));break;
			case '12':$this->load->view('workarea/team_co',array('error' => 'noerror'));break;
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

public function data_return($ecid,$data_type)
{
	$this->load->view('workarea/data_return',array('ecid' => $ecid,'data_type' => $data_type));
}
public function add_func()
{
	$job_type = $this->input->post('job_type');
	switch($job_type)
	{
		case 'event_category' :
		$config=array(
				array(
				'field'=>'ec_name',
				'label'=>'Event Name',
				'rules'=>'trim|required|is_unique[events_category.ec_name]'
				)
				);
				$this->form_validation->set_rules($config);
	if($this->form_validation->run() ===FALSE)
	{
		$this->load->view('workarea/event_cat',array('error' => 'noerror'));
	}
	else
	{
		if($_FILES["userfile"]["tmp_name"]){
		$config['upload_path'] = './event_cat_image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				$this->load->view('workarea/event_cat',array('error' => $error));
				
			}
			else
			{
				$data = $this->upload->data();
		$this->db->insert('events_category',array('ec_name' => $this->input->post('ec_name'),'ec-pic' => $data['full_path'] ));
		$this->load->view('workarea/event_cat',array('error' => 'success'));
			}
	}
	else
	{
		$this->load->view('workarea/event_cat',array('error' => 'noimage'));
	}
	}
	break;
	case 'events':
	$config=array(
				array(
				'field'=>'e_name',
				'label'=>'Event Name',
				'rules'=>'trim|required|is_unique[events.e_name]'
				)
				);
				$this->form_validation->set_rules($config);
	if($this->form_validation->run() ===FALSE)
	{
		$this->load->view('workarea/enter_events',array('error' => 'noerror'));
	}
	else
	{
		$this->db->insert('events',array('e_name' => $this->input->post('e_name')));
		$this->load->view('workarea/enter_events',array('error' => 'success'));
	}
	break;
	case 'co_team':
	$config=array(
				array(
				'field'=>'team_name',
				'label'=>'team Name',
				'rules'=>'trim|required|is_unique[coordinator_team.team_name]'
				),
				array(
				'field'=>'sequence',
				'label'=>'Sequence',
				'rules'=>'trim|required|is_unique[coordinator_team.sequence]'
				)
				);
				$this->form_validation->set_rules($config);
	if($this->form_validation->run() ===FALSE)
	{
		$this->load->view('workarea/team_co',array('error' => 'noerror'));
	}
	else
	{
		$this->db->insert('coordinator_team',array('team_name' => $this->input->post('team_name'),'sequence' => $this->input->post('sequence')));
		$this->load->view('workarea/team_co',array('error' => 'successfully added a new team!'));
	}
	break;
	
	}
}

public function update_func()
{
	
$job_type = $this->input->post('job_type');
	switch($job_type)
	{
		case 'event_category' :
		
		if($_FILES["userfile"]["tmp_name"]){
		$config['upload_path'] = './event_cat_image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2024';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';

		$this->load->library('upload', $config);
			if ( ! $this->upload->do_upload())
			{
				$error = $this->upload->display_errors();
				$this->load->view('workarea/event_cat',array('error' => $error));
				
			}
			else
			{
				$data = $this->upload->data();
		$this->db->where(array('ecid' => $this->input->post('event_cat')));
		$this->db->update('events_category',array('ec_name' => $this->input->post('ec_name'),'ec-pic' => $data['full_path']));
		
			}
	}
	else
	{
		$this->db->where(array('ecid' => $this->input->post('event_cat')));
		$this->db->update('events_category',array('ec_name' => $this->input->post('ec_name')));
	}
	$this->load->view('workarea/event_cat',array('error' => 'update_successful'));
	break;
	
	case 'events' :
	$this->db->where(array('eid' => $this->input->post('event_name')));
		$this->db->update('events',array('e_name' => $this->input->post('e_name')));
	$this->load->view('workarea/enter_events',array('error' => 'update_successful'));
	break;
	case 'co_team':
	$this->db->where(array('team_id' => $this->input->post('t_name')));
		$this->db->update('coordinator_team',array('team_name' => $this->input->post('team_name'),'sequence' => $this->input->post('sequence')));
	$this->load->view('workarea/team_co',array('error' => 'update_successful'));
	break;
	
	}
}	

}
