<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>User Registration</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="" />
<style>
.container1{
	width:96%;
	float:left;
	margin-left:0%;
	
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
}
.right{
	margin-left:10px;
	float: left;
	width:50%;
}
#about{
	width:80%;
	margin-left:9%;
	height: 250px;
	border: thin solid #000;
	scroll: auto;
	color:#000;
	overflow: scroll;
}
#rules{
	width:80%;
	margin-left:9%;
	height:250px;
	border: thin solid #000;
	scroll: auto;
	color:#000;
	overflow: scroll;
}
#prize{
	width:80%;
	margin-left:9%;
	height:250px;
	border: thin solid #000;
	scroll: auto;
	color:#000;
	overflow: scroll;
}
.new{
	width:98%;
	margin-left:1%;
	margin-top: 20px;
	// border: thin solid #000;
}
.over
{
	margin-left: 30px;
	float: left;
	width: 95%;
	margin-top: 15px;
	font-size: 16px;
}
.button{
	margin-top:20px;
	margin-left:30%;
}
</style>
<script>
function data(data_type)
{
	var ecid = document.forms["events"]["event_name"].value;
	if (window.XMLHttpRequest) {
            
            xmlhttp = new XMLHttpRequest();
        } else {
           
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
               var r = xmlhttp.responseText;
			  
			   r = JSON_parse(r);
			    
			   document.getElementById("name").value = "hfgfhgsh";
			   document.getElementById("image1").src = r.ec_pic; 
            }
        }
		
        xmlhttp.open("GET","http://localhost/srijan/index.php/main_c/data_return/"+ecid+"/"+data_type,true);
        xmlhttp.send();
		
		 document.getElementById("button1").value = "Update";
		 document.getElementById("event_c_form").action = "http://localhost/srijan/index.php/main_c/update_func";
		 document.getElementById("heading").innerHTML = "Update Event  Here...";
		 document.getElementById("op").innerHTML = "";
		
}
function notify(error)
{
	if(error === 'noerror')
	{
		
	}
	else
		alert(error);
}

</script>
</head>
<body onload= "notify('<?php echo $error; ?>')">
<div class="container1">
<center><h2>ADD/Update Event </h2></center>
<center><h1><span style="color:#fff;">Add/Update Event</span></h1></center>

<?php 
$attributes = array('name' => "events", 'id' => "event_c_form");
echo form_open_multipart('main_c/add_func',$attributes); ?>

<h4>Select The event  to Update </h4>
 <select name="event_name" onchange="data('2')">
 <option value="00" select="selected" >  </option>
<?php
$this->db->select('eid,e_name');
$query = $this->db->get('events');
foreach($query->result_array() as $row)
{?> 
<option value="<?php echo $row['eid'];?>" ><?php echo $row['e_name']; ?></option>
<?php } ?>
</select> 

<div id="op"><center><h2>-----OR------</h2></center></div>
<h4><div id="heading">Add a new One here...</div></h4>
<input type="hidden" value="events" name="job_type">
<div class="over"><div class="left"><level>Event Name</level></div><div class="right"><input type="text" name="e_name" value="<?php echo set_value('e_name'); ?>" id="name"></div><span style="color:#ec1313"><?php echo form_error('ec_name'); ?></span></div>
<div class="over"><input id="button1" name="act" type="submit" value="add" ></div>
 </form>


</div>


</body>
</html>