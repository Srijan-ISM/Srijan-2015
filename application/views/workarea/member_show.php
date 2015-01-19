<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Registration</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
</head>
<body>
<h4>Members List for Team-Id <?php echo $team_id;?></h4>
<table border="1px" style="width:80%;padding:2px;border-collapse:collapse;">

<th style="width:20%">unique_code</th>
<th style="width:20%">First Name</th>
<th style="width:20%">email</th>
<th style="width:10%">mobile</th>
<th style="width:10%">college</th>

<?php 
$query = $this->db->get_where('team_members_map',array('teamid'=> $team_id));
foreach($query->result_array() as $row)
{
$query2 = $this->db->get_where('user_reg',array('unique_code'=> $row['userid']));
foreach($query2->result_array() as $row2)
{
?>
<tr>
<td><?php echo $row2['unique_code']; ?></td>
<td><?php echo $row2['f_name']; ?></td>
<td><?php echo $row2['email']; ?></td>
<td><?php echo $row2['mobile']; ?></td>
<td><?php echo $row2['college']; ?></td>

</tr>
<?php
}}
?>
</body>
</html>