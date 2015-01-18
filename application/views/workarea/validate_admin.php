<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Registration</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />

<script>
var c=0;
function change(count)
{
	var val;
	if(c%2 == 0)
	{for(var i=1;i<= count;i++)
		{
			val= "check"+i;
			document.getElementById(val).checked = "checked";
		}
		c++;
	}
	else
	{
		for(var i=1;i<= count;i++)
		{
			val= "check"+i;
			document.getElementById(val).checked = "";
		}
		c++;
	}
}

function printpage()
	{
		window.print();
	}
</script>
</head>
<body>
<div style="float:left;margin-left:0%"><h2>Admin Registration Awaiting Approval</h2></div>
<?php 
$count =1;
$check = "false";
$query = $this->db->get_where('admin_user', array('is_verified' => '0'));
?>
<div style="float:left;width:90%">
<?php 
$attributes = array('name' => "check", 'id' => "check_form");
echo form_open('main_c/verify',$attributes); ?>
<input type="hidden" name="table" value="admin_user">
<input type="hidden" name="cantrol" value="auid">

<div id="content" style="float:left;margin-bottom:30px;width:90%"></div>
<div style="float:left;width:98%">
<table border="1px" style="width:98%;padding:2px;border-collapse: collapse;">
<th style="width:5%"><input type="checkbox"   onchange="change(<?php echo sizeof($query->result()); ?>)"></th>
<th style="width:10%">Auid</th>
<th style="width:15%">First Name</th>
<th style="width:15%">Last Name</th>
<th style="width:10%">Status</th>
<th style="width:15%">Email</th>
<th style="width:10%">Mobile</th>
<th style="width:10%">Designation</th>
<th style="width:7%">Team Id</th>
<th style="width:7%">Event Id</th>
<?php
foreach($query->result_array() as $row)
{
?>
<tr>
<td><input type="checkbox" name="select[]" value="<?php echo $row['auid'];?>" id="check<?php echo $count; $count++;?>" ></td>
<td><?php echo $row['auid']; ?></td>
<td><?php echo $row['f_name']; ?></td>
<td><?php echo $row['l_name']; ?></td>
<td style="width:10%"><?php if($row['is_verified'] == '0') echo "Waiting Approval"; else if($row['is_verified'] == '1') echo "Approved"; else echo "Rejected";?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['mobile']; ?></td>
<td><?php if($row['designation'] === '1')echo "Event Organiser"; else if($row['designation'] === '2') echo "Event Coordinator"; else echo "Coordinator"; ?></td>
<td><?php echo $row['team_id']; ?></td>
<td><?php echo $row['event_id']; ?></td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<div style="float:left;width:80%;margin-left:1%;margin-top:20px;">Check the Admin to approve and click on VERIFY/REJECT Button.</br>
<input type="submit" name="act" value="Approve"><input type="submit" name="act" value="reject"><input name="page" type="button" value="Print" onclick="printpage()"></div>
</form>
</body>
</html>