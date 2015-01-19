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
</style>
</head>
<body>
<div class="container1">
<b>
<div style="border-radius: 8px;scroll:auto;padding-bottom:20px;width:62%;margin-bottom:30px;border: thin solid #fff;float:left">
<center><h1><span style="color:#fff;">Login</span></h1></center>

<?php 

$attributes = array('name' => "login", 'id' => "login_form");
echo form_open('login_c/validate',$attributes); ?>

<div class="over"><div class="left"><level>E-Mail*</level></div><div class="right"><input class="box" type="text" name="email" value="<?php echo set_value('email'); ?>"/></div></div>
<div class="over"><div class="left"><level>Password*</level></div><div class="right"><input class="box" type="password" name="password"/></div></div>
<div class="over"><div class="left"><level>Secrete Key*</level></div><div class="right"><input class="box" type="password" name="secret"/></div></div>
<div class="over"><div class="left"></div><div class="right" style="margin-left:20%;"><?php if($stat === FALSE) echo "Invalid Entry. Try Again...";?></div></div>

<div class="over">
  <div style="float:left;width:30%;margin-left:30%;margin-top:27px;"><input class="box" type="submit" Value="Login" name="submit"></div></div>
 </b> 
 </form>
 </div>
 
  </div>
  
 
</body>
</html>