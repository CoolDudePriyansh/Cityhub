<?php 
	session_start();
	if(isset($_SESSION["email"]))
	{
	}
	else{
		
		header('Location:login.php');
	}
	require 'database.php';
	$obj=new database();
	$event_id=$_REQUEST["id"];
	$res=$obj->eventbyiddis($event_id);
	while($row=mysql_fetch_assoc($res))
	{
		$event_name=$row["event_name"];
		$event_logo=$row["event_logo"];
	
		$event_des=$row["event_des"];
		$venue_id=$row["fk_venue_id"];
		$venue_name=$row["venue_name"];
		$venue_add=$row["venue_address"];
		$city_id=$row["pk_city_id"];
		$pincode=$row["pincode"];
		$event_date=$row["event_date"];
		$event_time=$row["event_time"];
		$event_price=$row["event_price"];
		$event_ticket=$row["event_ticket"];
	}
?>

<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

	<title>
		Edit Your Event
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
<?php
	if(isset($_POST["btncreate"]))
	{
			$flag=0;
		if($venue_name!=$row["txtvenuename"])
		{
			$venue_name=$_POST["txtvenuename"];
			$flag=1;
		}
		if($venue_add!=$row["txtvenueaddress"])
		{
				$venue_add=$_POST["txtvenueaddress"];
				$flag=1;
		}
		if($pincode!=$row["pincode"])
		{
			$pincode=$_POST["txtpincode"];
			$flag=1;
		}		
		if($city_id!=$row["txtcity"])
		{
			$city_id=$_POST["txtcity"];
			$flag=1;
		}
		if($flag==1)
		{
			$obj=new database();
		$res1=$obj->updatevenue($venue_id,$venue_name,$venue_add,$pincode,$city_id);
		}
					
				
		
		$event_name=$_POST["txtname"];
		$event_des=$_POST["txtdes"];
		$event_date=$_POST["txtdate"];		
		$event_time=$_POST["txttime"];		
		$event_ticket=$_POST["txtticket"];
																					
		$obj=new database();
		$res1=$obj->updateevent($event_id,$event_des,$event_name,$event_date,$event_time,
		$event_ticket,$event_price);																																														
		if($res1==1)
		{
			echo '<script>alert("Successfully updated");
		window.location.href="dashboard.php";
		</script>';
			
		}
		else
		{
			echo '<script>alert("Not updated");</script>';
		}
		
		
	}		
	?>
	
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
		<center><font font size="15" color="red"> Create Your Event </font></center>
	</div>
	</div>
	
	<div class="container">
	<div class="row">
	<div class="col-md-6 col-sm-6">
		
		<div class="form">
			<form method="post" action="#" enctype="multipart/form-data">
					
					<label><font color="black" size=2>Event Name</font></label>
					</br>
					<input type="text" placeholder="Event Title" name="txtname" class="form-control" value="<?php echo $event_name; ?>" required/> 
					</br>
						
					
					<label><font color="black" size=2>Venue Name</font></label>
					</br>
					<input type="text" placeholder="Venue Name" name="txtvenuename" value="<?php echo $venue_name; ?>" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Venue Address</font></label>
					</br>
					<input type="text" placeholder="Venue Address" name="txtvenueaddress"value="<?php echo $venue_add; ?>" class="form-control" required/> 
					</br>
					<label><font color="black" size=2>Select City</font></label>
					</br>
					<select name="txtcity" class="form-control" >
	
								<?php
									$obj=new database();
									$res=$obj->getAllCity();
									while($row=mysql_fetch_array($res,MYSQL_ASSOC))
									{
										echo '<option value="'.$row["pk_city_id"].'"'; 
										if($row["pk_city_id"]==$city_id){
										echo 'selected="selected"';
										}
										echo '>'.$row["city_name"].'</option>';
									}
								?>
					</select>	
					
					
					
		</div>
	</div>
	
	<div class="col-md-6 col-sm-6">	
					
					
					<label><font color="black" size=2>Pincode</font></label>
					</br>
					<input type="number" placeholder="Pincode" name="txtpincode" value="<?php echo $pincode; ?>" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Event Date</font></label>
					</br>
					<input type="text" placeholder="Event date" name="txtdate" value="<?php echo $event_date; ?>" class="form-control" required/> 
					</br>
						
					<label><font color="black" size=2>Event Time</font></label>
					</br>
					<input type="text" placeholder="Event time" name="txttime" value="<?php echo $event_time; ?>" class="form-control" required/> 
					</br>	
						
					<label><font color="black" size=2>Event Ticket</font></label>
					</br>
					<input type="text" placeholder="Event ticket" name="txtticket" class="form-control" value="<?php echo $event_ticket; ?>" required/> 
					</br>
				
										
					
		
					
			
		
	</div>
		
	</div>
	</div>
	<br>
		<div>
				<center><input type="submit" name="btncreate" value="Update" class="btn btn-success"/></center>
			</form>
		</div>
	
</br></br>	
<div class="row">
	<div class="col-md-12 col-sm-12">
	<?php 
		require 'footer.php';
	?> 
	</div>
	</div>		
	
</body>
</html>