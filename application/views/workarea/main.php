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
	
}
.container1{
	width:90%;
	float:left;
	height: 800px;
	margin-left:6%;
	background-color:#fff;
}
.header{
	width:97.4%;
	height: 120px;
	float:left;
	padding-left:30px;
	border: thin solid #000;
}
.part1{
	width:20%;
	float:left;
	border: thin solid #000;
	height:970px;
	
	
}
.part2{
	width:76.6%;
	float:left;
	border: thin solid #000;
	padding-top:30px;
	padding-left:3%;
	height:940px;
}
.over
{
	margin-left: 0px;
	float: left;
	width: 100%;
	height:25px;
	font-size: 16px;
	border: thin solid #000;
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

#myframe1{
	width:100%;
	height:900px;
}
/* #func1{
	visibility:hidden;
}
#func2{
	visibility:hidden;
}
#func3{
	visibility:hidden;
}
#func4{
	visibility:hidden;
}
#func5{
	visibility:hidden;
} */
</style>
<script>

function choose(des)
{
/*	if(des == 3)
	{
		document.getElementById("func1").style.height = "0px";
		document.getElementById("func2").style.visibility = "visible";
		document.getElementById("func3").style.visibility = "visible";
		document.getElementById("func4").style.visibility = "visible";
		document.getElementById("func5").style.height = "0px";
	}
	else
	{
		document.getElementById("func2").style.visibility = "visible";
		document.getElementById("func1").style.visibility = "visible";
		document.getElementById("func5").style.visibility = "visible";
		document.getElementById("func4").style.visibility = "visible";
		document.getElementById("func3").style.visibility = "visible";
	}*/
}
</script>
<?php $user = $this->session->userdata('designation');?>
</head>
<body onload="choose(<?php echo $user; ?>)">
<div class="container1">
<?php 

if($set === '0')
{
	?>
Please  <a href="<?php echo base_url('index.php/login_c'); ?>">Login Here</a>
<?php 
}
else
{
	?>
<div class="header">
<h1>SRIJAN'15</h1>

</div>

<div class="part1">


<a href="<?php echo base_url('index.php/main_c/work/1'); ?>" target="myframe"><div class="over" id="func1">&nbsp Unverified teams</div></a>
<a href="<?php echo base_url('index.php/main_c/work/2'); ?>" target="myframe"><div class="over" id="func2">&nbsp Approved teams</div></a>
<a href="<?php echo base_url('index.php/main_c/work/3'); ?>" target="myframe"><div class="over" id="func3">&nbsp All Teams (your event)</div></a>
<a href="<?php echo base_url('index.php/main_c/work/4'); ?>" target="myframe"><div class="over" id="func4">&nbsp Edit Event Details</div></a>
<a href="<?php echo base_url('index.php/main_c/work/5'); ?>" target="myframe"><div class="over" id="func5">&nbsp Edit Personal Details</div></a>
<a href="<?php echo base_url('index.php/main_c/work/6'); ?>" target="myframe"><div class="over" id="func6">&nbsp View all Contestants</div></a>
<a href="<?php echo base_url('index.php/main_c/work/7'); ?>" target="myframe"><div class="over" id="func7">&nbsp View all Teams</div></a>
<a href="<?php echo base_url('index.php/main_c/work/8'); ?>" target="myframe"><div class="over" id="func8">&nbsp Report</div></a>
<a href="<?php echo base_url('index.php/main_c/work/9'); ?>" target="myframe"><div class="over" id="func9">&nbsp Validate admin Reg.</div></a>
<a href="<?php echo base_url('index.php/main_c/work/10'); ?>" target="myframe"><div class="over" id="func10">&nbsp Add/Update Event Category</div></a>
<a href="<?php echo base_url('index.php/main_c/work/11'); ?>" target="myframe"><div class="over" id="func11">&nbsp Add/Update Events</div></a>
<a href="<?php echo base_url('index.php/main_c/work/12'); ?>" target="myframe"><div class="over" id="func12">&nbsp Add/Update Team Coordinaters</div></a>
<a href="<?php echo base_url('index.php/main_c/work/13'); ?>" target="myframe"><div class="over" id="func14">&nbsp Add/Update Nickname Genre</div></a>
<a href="<?php echo base_url('index.php/main_c/work/14'); ?>" target="myframe"><div class="over" id="func15">&nbsp Add/Update Nick Names</div></a>


</div>

<div class="part2">
<iframe name="myframe" id="myframe1" scrolling="auto" src="<?php echo base_url('index.php/main_c/first'); ?>" frameborder="0">
</iframe>

</div>


</div>
<?php } ?>
</body>
</html>