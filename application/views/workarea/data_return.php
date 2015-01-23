<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Registration</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
</head>
<body>
<?php
switch($data_type)
{
	case '1' : 
				$query = $this->db->get_where('events_category',array('ecid' => $ecid));
				foreach($query->result_array() as $row);
				echo json_encode($row);break;
	case '2' : 
	$query = $this->db->get_where('events',array('eid' => $ecid));
				foreach($query->result_array() as $row);
				echo json_encode($row);break;
	case '3' : 
	$query = $this->db->get_where('coordinator_team',array('team_id' => $ecid));
				foreach($query->result_array() as $row);
				echo json_encode($row);break;
}
?>
</body>
</html>