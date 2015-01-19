<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Registration</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<style>
.container1{
	width:90%;
	float:left;
	margin-left:6%;
	background-color:#2f2be2;
}
.over
{
	margin-left: 30px;
	float: left;
	width: 95%;
	margin-top: 15px;
	font-size: 16px;
}
.left{
	margin-left:0px;
	float: left;
	width:20%;
}
.right{
	margin-left:10px;
	float: left;
	width:70%;
}
#message_box{
	float:left;
	width:95%;
}
</style>

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

function data(team_id)
{
	if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
           
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("content").innerHTML = xmlhttp.responseText;
            }
        }
		
        xmlhttp.open("GET","http://localhost/srijan/index.php/main_c/member_show/"+team_id,true);
        xmlhttp.send();
		
}

function change1(a)
{
	var m = document.getElementById("message_box");
		
	if(a == '1')
	{
		m.innerHTML = "<div class=\"over\"><div class=\"left\"><level>Subject</level></div><div class=\"right\"><input type=\"text\" name=\"subject\"></div></div><div class=\"over\"><div class=\"left\"><level>Message</level></div><div class=\"right\"><textarea name=\"message\" style=\"width:80%;height:200px;\"></textarea></div></div><input type=\"submit\" name=\"act\" value=\"email\"><input type=\"button\" value=\"Cancel\" onclick=\"change1('3')\"><input name=\"page\" type=\"button\" value=\"Print\" onclick=\"printpage()\">";
	}
	else if(a == '2')
	{
		m.innerHTML = "<div class=\"over\"><div class=\"left\"><level>Message</level></div><div class=\"right\"><textarea name=\"message\" style=\"width:80%;height:200px;\"></textarea></div></div><input type=\"submit\" name=\"act\" value=\"sms\"><input type=\"button\" value=\"Cancel\" onclick=\"change1('3')\"><input name=\"page\" type=\"button\" value=\"Print\" onclick=\"printpage()\">";
	}
	else if(a == '3')
	{
		m.innerHTML = "<input type=\"button\" name=\"act\" value=\"email\" onclick=\"change1('1')\"><input type=\"button\"  name=\"act\" value=\"sms\" onclick=\"change1('2')\"><input type=\"submit\" name=\"act\" value=\"reject\"\"><input type=\"submit\" name=\"act\" value=\"Approve\"\"><input name=\"page\" type=\"button\" value=\"Print\" onclick=\"printpage()\"></div>";
	}
}
function printpage()
	{
		window.print();
	}
</script>
<?php $event_id = $this->session->userdata('event_id');?>
</head>
<body>
<div style="float:left;margin-left:0%"><h2>Teams Awaiting Approval</h2></div>
<?php 
$count =1;
$check = "false";
if($task === '2')
	$data = array('event_id' => $event_id,'is_verified' => '1');
else if($task === '3')
	$data = array('event_id' => $event_id);

$query = $this->db->get_where('event_team_reg', $data);
?>

<?php 
$attributes = array('name' => "check", 'id' => "check_form");
echo form_open('main_c/approved',$attributes); ?>
<input type="hidden" name="table" value="event_team_reg">
<input type="hidden" name="cantrol" value="team_id">
<div style="float:left;width:90%">
<div id="content" style="float:left;margin-bottom:30px;width:90%"></div>
<div style="float:left;width:95%">
<table border="1px" style="width:80%;padding:2px; border-collapse:collapse;">

<th style="width:5%"><input type="checkbox"   onchange="change(<?php echo sizeof($query->result()); ?>)"></th>
<th style="width:20%">Team Id</th>
<th style="width:20%">Team Name</th>
<th style="width:15%">Number of Members</th>
<th style="width:20%">Status</th>
<th style="width:10%">Details</th>

<?php
foreach($query->result_array() as $row)
{
?>
<tr>
<td><input type="checkbox" name="select[]" value="<?php echo $row['team_id'];?>" id="check<?php echo $count; $count++;?>" ></td>
<td><?php echo $row['team_id']; ?></td>
<td><?php echo $row['team_name']; ?></td>
<td><?php echo $row['team_members']; ?></td>

<td style="width:10%"><?php if($row['is_verified'] == '0') echo "Waiting Approval"; else if($row['is_verified'] == '1') echo "Approved"; else echo "Rejected";?></td>
<td><input type="button" value="Members Details" onclick="data(<?php echo $row['team_id'];?>)"></td>
</tr>
<?php
}
?>
</table>
</div>
</div>
<input type="hidden" name="task" value="<?php echo $task; ?>">
<div style="float:left;width:80%;margin-left:1%;margin-top:20px;">Check the teams to send E-Mail/SMS or reject an approved team..</br></div>

<div id="message_box">
<input type="submit" name="act" value="email" onclick="change1('1')"><input type="button"  name="act" value="sms" onclick="change1('2')"><input type="submit" name="act" value="reject"><input type="submit" name="act" value="Approve"><input name="page" type="button" value="Print" onclick="printpage()">
</div>
</form>

</body>
</html>