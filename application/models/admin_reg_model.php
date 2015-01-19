<?php
class Admin_reg_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function update_id()
{
	$query = $this->db->get_where('admin_user', array('email' => $this->input->post('email')));
	
	
	foreach($query->result() as $row)
	{	
	$uidc=$row->auid;
	$val=$row->verification_id;
	}
	//url for email validation
	$uids=(($uidc+7)*32)+57;
	$url= '{unwrap}'.base_url('index.php/admin_reg/verify').'/'.$val.$uids.'{/unwrap}';
	
	$secret_code = "imsecrete";
	
	$data=array('secret_code'=>$secret_code);
	$this->db->where('auid',$uidc);
 $this->db->update('admin_user', $data); 
 $data1=array(
 'url'=>$url
 );
 return $data1;

}

public function validate($val,$uid){
	$this->db->select('auid');
	$query=$this->db->get_where('uadmin_user',array('verification_id'=>$val,'auid'=>$uid));
	if(sizeof($query->result()))
	{
		$data=array('is_verified'=>1);
		$this->db->where('auid',$uid);
		$this->db->update('admin_user',$data);
		return true;
	}
	else
		return false;
		
}
}