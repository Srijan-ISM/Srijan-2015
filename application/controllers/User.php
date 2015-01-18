<?php

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_reg_model');
	}
	
public function index()
{
	$this->load->helper('form');
	$this->load->helper('url');
	$this->load->library('form_validation');
	$this->load->helper('string');
	$this->load->library('email');
	if($_POST)
	{
		
	
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
				'field'=>'college',
				'label'=>'College Name',
				'rules'=>'trim|required'
				)
	);
	$this->form_validation->set_rules($config);
	if($this->form_validation->run() ===FALSE)
	{
		$this->load->view('user_reg/registration');
	}
	else
	
	{
		$verid=random_string('unique',30);
		$data2=array(
		'password'=>sha1($this->input->post('password')),
		'f_name'=>$this->input->post('f_name'),
		'l_name'=>$this->input->post('l_name'),
		'verification_id'=>$verid,
		'avatar'=>$this->input->post('avatar'),
		'nick_name'=>$this->input->post('n_name'),
		'email'=>$this->input->post('email'),
		'mobile'=>$this->input->post('mobile'),
		'college'=>$this->input->post('college')
		);
		$data1['success']=$this->user_reg_model->set_user($data2,'user_reg');
		$data1=$this->user_reg_model->update_id();
		$url=$data1['url'];
		$unique_code=$data1['unique_code'];
		//send email
$this->email->from('kumargaurav2781@gmail.com', 'kumar gaurav');
$this->email->to($this->input->post('email')); 
$this->email->subject('User Verification for Srijan\'15');
$this->email->message($url);	
$this->email->send();
//email send complete
$data1=array('unique_code'=>$unique_code);
		$this->load->view('user_reg/success',$data1);
	}
	}
	else
	{
		$this->load->view('user_reg/registration');
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
