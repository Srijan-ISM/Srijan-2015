<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Registration</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<link rel="stylesheet" type="text/css" href="base_url('file/style.css')" />
<script type="text/javascript" src="base_url('file/jquery.js')"></script>

<style>
body{
	background-color:#2f2be2;
}
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
	width: 100%;
	margin-top: 15px;
	font-size: 16px;
}
.left{
	margin-left:0px;
	float: left;
	width:20%;
	color: #fff;
}
.right{
	margin-left:10px;
	float: left;
	width:50%;
	color:#fff;
}
.avatar{
	width:30%;
	height:80px;
	float:left;
	margin-left: 2%;
}
.box{
	width:70%;
	border-radius: 4px;
	border: 0px solid #000;
	height:20px;
	background-color:#aa82e0;
}
.white{
	background-color:#eae4e5;
}
#event{
	visibility: hidden;
	height:0px;
}
#team{
	visibility: hidden;
	height:0px;
}
</style>
<script>
function decide()
{
	var p = document.forms["registration"]["designation"].value;
	if(p == 3)
	{
		document.getElementById("team").style.visibility = "visible";
		document.getElementById("event").style.visibility = "hidden";
	}
	else
	{
		document.getElementById("team").style.visibility = "hidden";
		document.getElementById("event").style.visibility = "visible";
	}
}

function choose1(data) {
    var p1=document.getElementById("selecter");
	if(data == '1')
	{
		p1.innerHTML = "<select name=\"n_name\" class=\"box\"><option value=\"01\">music1</option><option value=\"02\">music2</option></select>";
	}
	else if(data == '2')
	{
		p1.innerHTML = "<select name=\"n_name\" class=\"box\"><option value=\"11\">dance1</option><option value=\"12\">dance2</option></select>";
	}
	else if(data == '3')
	{
		p1.innerHTML = "<select name=\"n_name\" class=\"box\"><option value=\"21\">drama1</option><option value=\"22\">drama2</option></select>";
	}
	
	var p = document.forms["registration"]["f_name"].value;
	if(p == "")
		p = "Enter Your Name";
	document.getElementById("fill1").textContent = p + "- ";
}
</script>

</head>
<body>
<div class="container1">
<b>
<div style="border-radius: 8px;scroll:auto;padding-bottom:20px;width:62%;margin-bottom:30px;border: thin solid #fff;float:left">
<center><h1><span style="color:#fff;">Admin Registration</span></h1></center>

<?php 
$attributes = array('name' => "registration", 'id' => "reg_form");
echo form_open('admin_reg/insert',$attributes); ?>
<div class="over"><div class="left"><level>First Name*</level></div><div class="right"><input class="box" type="text" name="f_name" value="<?php echo set_value('f_name'); ?>"/><div style="color:#fff;font-size:13px;"><?php echo form_error('f_name'); ?></div></div></div>
<div class="over"><div class="left"><level>Last Name*</level></div><div class="right"><input class="box" type="text" name="l_name" value="<?php echo set_value('l_name'); ?>"/><div style="color:#fff;font-size:13px;"><?php echo form_error('l_name'); ?></div></div></div>
<div class="over"><div class="left"><level>Favorite (Not related to your event)*</level></div><div class="right">
<center><div onclick="choose1('1')" style="color:#fff;float:left;border:thin solid #fff;width:20%">Music</div>
<div onclick="choose1('2')" style="color:#fff;float:left;margin-left:10px;border:thin solid #fff;width:20%">Dance</div>
<div onclick="choose1('3')" style="color:#fff;float:left;margin-left:10px;border:thin solid #fff;width:20%">Drama</div></center>
</div></div>
<div class="over"><div class="left" ><level>Your Nick Name is</div><div class="right">
<div id="fill1" style="float:left"></div><div id="selecter" style="float:left;width:60%"></div>
<div style="color:#fff;font-size:13px;float:left"><?php echo form_error('n_name'); ?></div>
</div>
</div>
<div class="over"><div class="left"><level>Password*</level></div><div class="right"><input class="box" type="password" name="password"/><div style="color:#fff;font-size:13px;float:left"><?php echo form_error('password'); ?></div></div></div>
<div class="over"><div class="left"><level>Re-enter Password*</level></div><div class="right"><input class="box" type="password" name="repassword"/><div style="color:#fff;font-size:13px;"><?php echo form_error('repassword'); ?></div></div></div>
<div class="over"><div class="left"><level>E-Mail*</level></div><div class="right"><input class="box" type="text" name="email" value="<?php echo set_value('email'); ?>"/><div style="color:#fff;font-size:13px;"><?php echo form_error('email'); ?></div></div></div>
<div class="over"><div class="left"><level>Mobile*</level></div><div class="right"><input class="box" type="text" name="mobile" value="<?php echo set_value('mobile'); ?>"/><div style="color:#fff;font-size:13px;"><?php echo form_error('mobile'); ?></div></div></div>

<div class="over"><div class="left"><level>Designation*</level></div><div class="right">
<select class="box" name="designation" onchange="decide()">
<option class="white" value="0" <?php echo set_select('designation', '0',TRUE); ?>>  </option>
<option class="white" value="1" <?php echo set_select('designation', '1'); ?>>Event Organiser</option>
<option class="white" value="2" <?php echo set_select('designation', '2'); ?>>Event Co-Ordinator</option>
<option class="white" value="3" <?php echo set_select('designation', '3'); ?>>Co-Ordinator</option>
</select><div style="color:#fff;font-size:13px;float:left"><?php echo form_error('designation'); ?></div>

</div></div>

<div class="over" id="event"><div class="left"><level>Event*</level></div><div class="right">
<select class="box" name="event_id">
<option class="white" value="1" <?php echo set_select('event_id', '1',TRUE); ?>>Event1</option>
<option class="white" value="2" <?php echo set_select('event_id', '2'); ?>>Event2</option>
<option class="white" value="3" <?php echo set_select('event_id', '3'); ?>>Event3</option>
</select>

</div></div>

<div class="over" id="team"><div class="left"><level>Team*</level></div><div class="right">
<select class="box" name="team_id">
<option class="white" value="1" <?php echo set_select('team_id', '1', TRUE); ?>>team1</option>
<option class="white" value="2" <?php echo set_select('team_id', '2'); ?>>team2</option>
<option class="white" value="3" <?php echo set_select('team_id', '3'); ?>>team3</option>
</select>

</div></div>


<div class="over">
  <div style="float:left;width:30%;margin-left:30%;margin-top:27px;"><input class="box" type="submit" Value="Register" name="submit"></div></div>
 </b> 
 </form>
 </div>
 
  </div>
  
 
</body>
</html>