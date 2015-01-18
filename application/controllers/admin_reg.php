<?php

class Admin_reg extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_reg_model');
		$this->load->model('admin_reg_model');
		$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper('string');
	$this->load->library('email');
	}
	
public function index(){
	
	$this->load->view('admin_reg/reg_admin');
}
public function insert(){
	$config=array(
				array(
				'field'=>'f_name',
				'label'=>'First Name',
				'rules'=>'trim|required'
				),
				array(
				'field'=>'l_name',
				'label'=>'Last Name',
				'rules'=>'trim'
				),
				array(
				'field'=>'n_name',
				'label'=>'Favourite',
				'rules'=>'trim|required'
				),
				array(
				'field'=>'password',
				'label'=>'Password',
				'rules'=>'trim|required|min_length[6]|max_length[15]'
				),
				array(
				'field'=>'repassword',
				'label'=>'Re-Password',
				'rules'=>'trim|required|matches[password]'
				),
				array(
				'field'=>'email',
				'label'=>'E-mail',
				'rules'=>'trim|required|is_unique[user_reg.email]|valid_email'
				),
				array(
				'field'=>'mobile',
				'label'=>'Mobile Number',
				'rules'=>'trim|required|min_length[10]|max_length[10]'
				),
				array(
				'field'=>'designation',
				'label'=>'Designation',
				'rules'=>'trim|required'
				),
				array(
				'field'=>'event',
				'label'=>'Event',
				'rules'=>'trim'
				),
				array(
				'field'=>'team',
				'label'=>'Team',
				'rules'=>'trim'
				)
	);
	
	
	$this->form_validation->set_rules($config);
	if($this->form_validation->run() ===FALSE)
	{
		$this->load->view('admin_reg/reg_admin');
	}
	else
	
	{
		$verid=random_string('unique',30);
		$data2=array(
		'password'=>sha1($this->input->post('password')),
		'f_name'=>$this->input->post('f_name'),
		'l_name'=>$this->input->post('l_name'),
		'verification_id'=>$verid,
		'designation'=>$this->input->post('designation'),
		'n_name'=>$this->input->post('n_name'),
		'email'=>$this->input->post('email'),
		'mobile'=>$this->input->post('mobile'),
		'team_id'=>$this->input->post('team'),
		'event_id'=>$this->input->post('event')
		);
		$this->user_reg_model->set_user($data2,'admin_user');
		$data1=$this->admin_reg_model->update_id();
		$url=$data1['url'];
		//send email
$this->email->from('kumargaurav2781@gmail.com', 'kumar gaurav');
$this->email->to($this->input->post('email')); 
$this->email->subject('User Verification for Srijan\'15');
$this->email->message($url);	
$this->email->send();
//email send complete
		$this->load->view('admin_reg/success');
	}
	}
	
	public function verify($cre)
{
	$val=substr($cre,0,32);
	$uid=substr($cre,32,strlen($cre)-32);
	//echo $cre.' '.$val.'  '.$uid;
	$uid=(($uid-57)/32)-7;
	
	$state=$this->user_reg_model->validate($val,$uid);
	
	if($state==true)
		$this->load->view('user_reg/success2');
	else
		$this->load->view('user_reg/failure2');
}

}
