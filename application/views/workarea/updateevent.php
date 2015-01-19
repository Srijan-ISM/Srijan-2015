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
var about2;
var rules2;
var prize2;
function editable(area)
{
	
	if(area === "about")
	{
		var m = document.getElementById("about");
		
		m.contentEditable = "true";
		m.style.border = "thin solid #f20b37";
		m.style.color = "#3c0bf2";
	}
	else if(area === "rules")
	{
		var m = document.getElementById("rules");
		
		m.contentEditable = "true";
		m.style.border = "thin solid #f20b37";
		m.style.color = "#3c0bf2";
	}
	else if(area === "prize")
	{
		var m = document.getElementById("prize");
		m.contentEditable = "true";
		m.style.border = "thin solid #f20b37";
		m.style.color = "#3c0bf2";
	}
	
}

function data()
{
	document.getElementById("about1").value = document.getElementById("about").innerHTML;
	document.getElementById("rules1").value = document.getElementById("rules").innerHTML;
	document.getElementById("prize1").value = document.getElementById("prize").innerHTML;
		document.getElementById("event").submit();
}

function previewFile() {
    var preview = document.querySelector('img'); 
    var file    = document.querySelector('input[type=file]').files[0]; 
    var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
     }

    if (file) {
         reader.readAsDataURL(file);
     } 
   else {
        preview.alt="there was a problem uploading file, try again....";
      }
    }
	
function error_alert(error)
	{
		if(error === "noerror")
		{
			alert("Updation Successful");
		}
		else if(error !== "101")
			alert(error);
		
	about2 = document.getElementById("about").innerHTML;
	rules2 = document.getElementById("rules").innerHTML;
	prize2 = document.getElementById("prize").innerHTML;
	}
function resetfield(area)
	{
		if(area === "about")
	{
		var m = document.getElementById("about");
		m.innerHTML = about2;
	}
	else if(area === "rules")
	{
		var m = document.getElementById("rules");
		m.innerHTML = rules2;
	}
	else if(area === "prize")
	{
		var m = document.getElementById("prize");
		m.innerHTML = prize2;
	}
		m.contentEditable = "false";
		m.style.border = "thin solid #000";
		m.style.color = "#000";
	}
	function printpage()
	{
		window.print();
	}
</script>
<?php $event_id = $this->session->userdata('event_id');?>
</head>
<body onload="error_alert('<?php print_r($img_error); ?>')">

<div class="container1">
<h2>Event Details</h2>
<?php 
$attributes = array('name' => "event_updater", 'id' => "event");
echo form_open_multipart('main_c/updateevent',$attributes); ?>
<div id="status"></div>
<?php
$this->db->select('e_about,e_rules,e_prize,e_image,e_team_max,e_team_min');
$query = $this->db->get_where('events',array('eid' => $event_id));
$about = "";
	$rules = "";
	$prize = "";
	$image = "";
	$max = "";
	$min = "";
foreach($query->result_array() as $row)
{
	$about = $row['e_about'];
	$rules = $row['e_rules'];
	$prize = $row['e_prize'];
	$image = $row['e_image'];
	$max = $row['e_team_max'];
	$min = $row['e_team_min'];
}
?>
<div class="new">
<h4>Event Image/Poster (Max Size: 2MB & Recommended Resolution: 800*600)</h4>
<div id="image">
<img src="<?php echo $image; ?>"  width="800px" height="600px" alt="Upload Your Event Poster/Image" id="image1">
</div>
<div class="button"><input type="file" name="userfile" value="Upload" onchange="previewFile()"><input name="send" type="button" value="Update" onclick="data()"></div>
<div class="new">
<h4>About the Event max(10,000 characters)</h4>
<div id="about" contentEditable="false" ondblclick="editable('about')">
<?php echo $about; ?>
</div>
<div class="button"><input type="button" name="edit" value="Edit" onclick="editable('about')"><input type="button" name="reset" value="Undo All Changes" onclick="resetfield('about')"><input name="send" type="button" value="Update" onclick="data()"><input name="page" type="button" value="Print" onclick="printpage()"></div>
</div>

<div class="new">
<h4>Rules for the Event max(10,000 characters)</h4>
<div id="rules" contentEditable="false" ondblclick="editable('rules')">
<?php echo $rules; ?>
</div>
<div class="button"><input type="button" name="edit" value="Edit" onclick="editable('rules')"><input type="button" name="reset" value="Undo All Changes" onclick="resetfield('rules')"><input name="send" type="button" value="Update" onclick="data()"><input name="page" type="button" value="Print" onclick="printpage()"></div>
</div>
<div class="new">
<h4>Prizes Max(2,000 characters)</h4>
<div id="prize" contentEditable="false" ondblclick="editable('prize')">
<?php echo $prize; ?>
</div>
<div class="button"><input type="button" name="edit" value="Edit" onclick="editable('prize')"><input type="button" name="reset" value="Undo All Changes" onclick="resetfield('prize')"><input name="send" type="button" value="Update" onclick="data()"><input name="page" type="button" value="Print" onclick="printpage()"></div>
</div>
<div class="new">
<h4>Maximum Number of Team Members</h4>
<input type="number" value="<?php echo $max;?>" name="max">
</div>
<div class="new">
<h4>Minimum number of team members</h4>
<input type="number" value="<?php echo $min;?>" name="min">
</div>
<div class="button"><input name="send" type="button" value="Update" onclick="data()"><input name="page" type="button" value="Print" onclick="printpage()"></div>
<input type="hidden" id="about1" value="" name="about">
<input type="hidden" id="rules1" value="" name="rules">
<input type="hidden" id="prize1" value="" name="prize">
</form>
</div>
</body>
</html>