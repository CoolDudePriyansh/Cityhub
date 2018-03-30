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
		Past event
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
		<center><font font size="15" color="red">Your Past Event  </font></center>
		<hr>
	</div>
	</div>

	
	
	<div class="row">
	<div class="col-md-12 col-sm-12">
		</br>
	
	<table class="table">
	<thead style="color:red">
		<th><font size=3>Event Date</font></th>
		<th><font size=3>Event Name</font></th>
		<th><font size=3>Event City</font></th>
		<th><font size=3>Book ticket count</font></th>
		<th><font size=3>Paid amount</font></th>
	</thead>
	<tbody>
	<?php 
	
	$obj=new database();
	$res=$obj->getpastbookevent($email);
	$cnt=mysql_num_rows($res);
	if($cnt==0)
	{
		echo '<font size=3>No Past Event</font>';
	}
	else
	{
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
					echo '<tr>';
					echo '<td><font size="4" color="black">'.$row["event_date"].'</font>';
					echo '<td><font size="4" color="black">'.$row["event_name"].'</font>';
					echo '<td><font size="4" color="black">'.$row["city_name"].'</font>';
					echo '<td><center><font size="4" color="black">'.$row["ticket_cnt"].'</font></center>';
					echo '<td><center><font size="4" color="black">'.$row["ticket_amnt"].'</font></center>';
					echo '</tr>';
					
				}
			}
			else if($m1<$month)
			{
					echo '<tr>';
					echo '<td><font size="4" color="black">'.$row["event_date"].'</font>';
					echo '<td><font size="4" color="black">'.$row["event_name"].'</font>';
					echo '<td><font size="4" color="black">'.$row["city_name"].'</font>';
					echo '<td><center><font size="4" color="black">'.$row["ticket_cnt"].'</font></center>';
					echo '<td><center><font size="4" color="black">'.$row["ticket_amnt"].'</font></center>';
					echo '</tr>';
			
			}
	}
	}
	}
	?>	
	</tbody>
	</table>
	</div>
	</div>
	</div>
	
	
</body>
</html>