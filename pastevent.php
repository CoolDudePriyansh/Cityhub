<?php 
	session_start();
	require 'database.php';
	$obj=new database();
	$email=$_SESSION["email"];
	
?>

<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

	<title>
		Login
	</title>
	
<script type="text/javascript">
$(document).ready(function(){
$("#test").keyup(function() {
    var val = $("#test").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test").val("");
        $("#test").focus();
    }
});
});

</script>

</head>

<body>
	<div class="row">
	<div class="col-md-12 col-sm-12">
	<?php 
		if(isset($_SESSION["email"])!="")
		{
	require 'headerwithlogin.php';
	
	}
	else
	{
	require 'header.php';
	}
	?>		
	</div>
	</div>


	<div class="row">
	<div class="col-md-12 col-sm-12">
	<?php 
		require 'catheader.php';
	?> 
	</div>
	</div>
	
	<div class="row">
	<div class="col-md-12 col-sm-12">
		<center><font font size="15" color="red"> Past Event Created By You </font></center>
		<hr>
	</div>
	</div>

	
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-3 col-sm-3">
		
		
		<table>
		<tr>
			<td><a href="dashboard.php"><font size=6>Organizer View</font></a>
		</tr>
		<tr>
			<td>&nbsp;
		</tr>
		<tr>
			<td><hr>
		</tr>
		
		<tr>
			<td><a href="upcomingevent.php"><font size=6>Upcoming events</font></a>
		</tr>
		<tr>
			<td>&nbsp;
		</tr>
		<tr>
			<td><hr>
		</tr>
		<tr>
			<td><a href="pastevent.php"><font size=6>Past events</font></a><hr>
		</tr>
		
		</table>

		
	</div>
	
	
	<div class="col-md-9 col-sm-9">
		</br>
	
	
	<?php 
	$cnt2=0;
	$obj=new database();
	$res=$obj->getEventByUser($email);
	while($row=mysql_fetch_assoc($res))
	{
		$da=(int)date("d");
		$month=(int)date("m");
		$year=(int)date("Y");
		$d=$row["event_date"];
		$arr=explode("-",$d);
		$d1=(int)$arr[0];
		$m1=(int)$arr[1];
		$y1=(int)$arr[2];
		if($y1<=$year)
		{
			if($m1==$month)
			{
				if($d1<$da)
				{
						$id=$row["pk_event_id"];
			$obj=new database();
			$res1=$obj->getBookcntByEvent($id);
			while($row1=mysql_fetch_assoc($res1))
			{
			$cnt2=$row1["cnt"];
				
			}
		echo '<div class="panel panel-info" style="width:700px;">
		<div class="panel-heading"><center>'.$row["event_name"].'</center></div>';
		echo '<div class="panel-body">
		<font size=4>Event Venue  : &nbsp;'.$row["venue_name"].'&nbsp;  - &nbsp;  '.$row["venue_address"].'</font></br>
		<font size=4>Event City  : &nbsp;'.$row["city_name"].'</font></br>
		<font size=4>Event Date   : &nbsp;'.$row["event_date"].'</br>   Event Time : &nbsp;'.$row["event_time"].' </font>
		<hr>
		<div class="col-md-3 col-sm-3">
		<font size=4>Event Id     : &nbsp;'.$row["pk_event_id"].'</font></br><br>   
			 
		</div>
		
		<div class="col-md-9 col-sm-9">
		<center><font size=4>Tickets Sold   </br>
		<table class="table" border=1 style="width:60px; height:35px;">
		<tr>
		<td "><center>
		'.$cnt2.'
		</tr></center>
		</table>
		</font></br><br></center>
		
		</div>
		</div>
		</div>';
	$cnt2=0;
					
				}
			}
			if($m1<$month)
			{
				
			$id=$row["pk_event_id"];
			$obj=new database();
			$res1=$obj->getBookcntByEvent($id);
			while($row1=mysql_fetch_assoc($res1))
			{
			$cnt2=$row1["cnt"];
				
			}
		echo '<div class="panel panel-info" style="width:700px">
		<div class="panel-heading"><center>'.$row["event_name"].'</center></div>';
		echo '<div class="panel-body">
		<font size=4>Event Venue  : &nbsp;'.$row["venue_name"].'&nbsp;  - &nbsp;  '.$row["venue_address"].'</font></br>
		<font size=4>Event City  : &nbsp;'.$row["city_name"].'</font></br>
		<font size=4>Event Date   : &nbsp;'.$row["event_date"].'</br>   Event Time : &nbsp;'.$row["event_time"].' </font>
		<hr>
		<div class="col-md-3 col-sm-3">
		
		</br></br>
		<font size=4>Event Id     : &nbsp;'.$row["pk_event_id"].'</font></br><br>   
			 
		</div>
		
		<div class="col-md-9 col-sm-9">
		<center><font size=4>Tickets sold </br>
		<table class="table" border=1 style="width:60px; height:35px;">
		<tr>
		<td "><center>
		'.$cnt2.'
		</tr></center>
		</table></font></br><br></center>
		
		</div>
		
		
		
		
	</div>
	
	</div>';
	$cnt2=0;
		}
	}
	}
	
	?>	
	</div>
	</div>
	</div>
	
	<div class="row">
<div class="col-md-12 col-sm-12">
<?php 

require 'footer.php';
?>
</div>
</div>
</body>
</html>