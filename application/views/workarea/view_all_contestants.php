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
function printpage()
	{
		window.print();
	}
	</script>
</head>
<body>
<div class="container1">
<h3> List of all Registered Participents</h3>
<?php 
$attributes = array('name' => "view_all", 'id' => "view-all");
echo form_open('main_c/view_all_conts',$attributes);
 ?>
<input type="hidden" value="user_reg" name="table">
<input type="submit" name="act" value="verified">
<input type="submit" name="act" value="notverified">
<input type="submit" name="act" value="All">
<input name="page" type="button" value="Print List" onclick="printpage()">
</form>
<div style="float:left;width:99%;margin-top:30px;">
<table border="2px"  style="width:97%;padding:2px;border-collapse: collapse;">

<th style="width:13%">Unique_code</th>
<th style="width:10%">First Name</th>
<th style="width:10%">Second Name</th>
<th style="width:10%">Nick Name</th>
<th style="width:18%">E-Mail</th>
<th style="width:10%">Mobile</th>
<th style="width:15%">College</th>
<th style="width:10%">Status</th>

<?php
for($i = 0; $i<$count; $i++)
{
	
?>
<tr>
<td style="width:13%"><?php echo $values[$i]['unique_code']; ?></td>
<td style="width:10%"><?php echo $values[$i]['f_name']; ?></td>
<td style="width:10%"><?php echo $values[$i]['l_name']; ?></td>
<td style="width:10%"><?php echo $values[$i]['nick_name']; ?></td>
<td style="width:20%"><?php echo $values[$i]['email']; ?></td>
<td style="width:10%"><?php echo $values[$i]['mobile']; ?></td>
<td style="width:15%"><?php echo $values[$i]['college']; ?></td>
<td style="width:8%"><?php if($values[$i]['is_verified'] == '0') echo "Awaiting Approval"; else if($values[$i]['is_verified'] == '1') echo "Approved"; else echo "Rejected";?></td>
</tr>

<?php
}
?>

</table>
</div>
</div>
</body>
</html>