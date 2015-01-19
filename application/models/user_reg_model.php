<?php
class User_reg_model extends CI_Model {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

public function set_user($data,$table)
{
	return $this->db->insert($table, $data);
}
//generating unique-code
public function update_id()
{
	$query = $this->db->get_where('user_reg', array('email' => $this->input->post('email')));
	
	
	foreach($query->result() as $row)
	{	
	$uidc=$row->uid;
	$first=$row->f_name;
	$val=$row->verification_id;
	}
	//url for email validation
	$uids=(($uidc+7)*32)+57;
	$url= '{unwrap}'.base_url('index.php/User/verify').'/'.$val.$uids.'{/unwrap}';
	
	$first = strtoupper($first);
	if(strlen($first)<3)
	$unique_code='S15-'.$first.'-'.$uidc;
	else
	$unique_code='S15-'.$first[0].$first[1].$first[2].'-'.$uidc;
	$data=array('unique_code'=>$unique_code);
	$this->db->where('uid',$uidc);
 $this->db->update('user_reg', $data); 
 $data1=array(
 'unique_code'=>$unique_code,
 'url'=>$url
 );
 return $data1;

}

public function validate($val,$uid){
	$this->db->select('uid');
	$query=$this->db->get_where('user_reg',array('verification_id'=>$val,'uid'=>$uid));
	if(sizeof($query->result()))
	{
		$data=array('is_verified'=>1);
		$this->db->where('uid',$uid);
		$this->db->update('user_reg',$data);
		return true;
	}
	else
		return false;
		
}



}