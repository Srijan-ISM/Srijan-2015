<?php
class Login_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	
	public function verify()
	{
		$query = $this->db->get_where('admin_user', array('email' => $this->input->post('email'),'password' => sha1($this->input->post('password')), 'secret_code' => $this->input->post('secret')));
		if(sizeof($query->result()) == 1)
		{
			foreach($query->result() as $row)
				{
					return $row;
				}
		}
		else
			return FALSE;
	}
}