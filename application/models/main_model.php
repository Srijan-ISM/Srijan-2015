<?php
class Main_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function verify(){
		$data = $this->input->post('select');
		$act = $this->input->post('act');
		
		if($act === 'Approve')
		{
			for($i = 0;$i< sizeof($data);$i++)
			{$this->db->where($this->input->post('cantrol'),$data[$i]);
			$this->db->update($this->input->post('table'),array('is_verified' => 1));}
		}
		else if($act === 'reject')
		{
			for($i = 0;$i< sizeof($data);$i++)
			{$this->db->where($this->input->post('cantrol'),$data[$i]);
			$this->db->update($this->input->post('table'),array('is_verified' => 2));}
		}
		return;
		//$query = $this->db->get_where('event_team_reg', array('event_id' => $eventid,'is_verified' => '0'));
		
	}
	
	public function sendemail()
	{
		$data = $this->input->post('select');
		
		for($i = 0;$i< sizeof($data);$i++)
		{
			$query = $this->db->get_where('team_members_map',array('teamid'=> $data[$i]));
			foreach($query->result_array() as $row)
		{
			$query2 = $this->db->get_where('user_reg',array('unique_code'=> $row['userid']));
				foreach($query2->result_array() as $row2)
					{
						 $this->email->clear();
						$email_id=$row2['email'];
						$this->email->from('kumargaurav2781@gmail.com', 'kumar gaurav');
						$this->email->to($email_id); 
						$this->email->subject($this->input->post('subject'));
						$this->email->message($this->input->post('message'));	
						$this->email->send();
					}
		}
		}
	}
	public function sendsms()
	{
		
	}
	
	public function event_update()
	{
		$this->db->where(array('eid' => $this->session->userdata('event_id')));
		$this->db->update('events',array('e_about' => $this->input->post('about'),'e_rules' => $this->input->post('rules'),'e_prize' => $this->input->post('prize'),'e_team_max' => $this->input->post('max'),'e_team_min' => $this->input->post('min')));
	}
	
	public function select_query()
	{
		$table = $this->input->post('table');
		if($this->input->post('act') === 'verified')
	$query= $this->db->get_where($table,array('is_verified' => '1'));
else if($this->input->post('act') === 'notverified')
	$query= $this->db->get_where($table,array('is_verified' => '0'));
else
	$query= $this->db->get($table);
return $query;
	}
}