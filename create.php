<?php 
	session_start();
	if(isset($_SESSION["email"]))
	{
	}
	else{
		
		header('Location:login.php?id=0');
	}
	require 'database.php';
	$obj=new database();
?>

<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

	<title>
		Create an Event
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

<script type="text/javascript">
$(document).ready(function(){
$("#test1").keyup(function() {
    var val = $("#test1").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test1").val("");
        $("#test1").focus();
    }
});
});

</script>

<script type="text/javascript">
$(document).ready(function(){
$("#test2").keyup(function() {
    var val = $("#test2").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test2").val("");
        $("#test2").focus();
    }
});
});

</script>
<script type="text/javascript">
$(document).ready(function(){
$("#test3").keyup(function() {
    var val = $("#test3").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test3").val("");
        $("#test3").focus();
    }
});
});

</script>

</head>

	<?php
	if(isset($_POST["btncreate"]))
	{
		
		$pk_event_id="Null";
		$event_name=$_POST["txtname"];
		$event_logo="eventlogo/".basename($_FILES["txtlogo"]["name"]);
		$ext=pathinfo($event_logo,PATHINFO_EXTENSION);
		$event_image="eventimage/".basename($_FILES["txtimage"]["name"]);
		$ext1=pathinfo($event_image,PATHINFO_EXTENSION);
		
		$event_des=trim($_POST["txtdes"]);
		$venue_name=$_POST["txtvenuename"];
		$venue_add=$_POST["txtvenueaddress"];
		$pincode=$_POST["txtpincode"];
		$city=$_POST["txtcity"];
	
		$day=$_POST["day"];
		$month=$_POST["month"];
		$year=$_POST["year"];
		$event_date=$day."-".$month."-".$year;		
		
		$hour=$_POST["hour"];
		$min=$_POST["min"];
		$ampm=$_POST["ampm"];
		$event_time=$hour.":".$min." ".$ampm;
		$day1=$_POST["lastday"];
		$month1=$_POST["lastmonth"];
		$year1=$_POST["lastyear"];		
		$event_last_date=$day1."-".$month1."-".$year1;
		$event_ticket=$_POST["txtticket"];
		$event_price=$_POST["txtprice"];
		$fk_cat_id=$_POST["txtcat"];
		$fk_email_id=$_SESSION["email"];
		$fk_offer_id="0";
		$event_cnt="0";
		$flag="0";
		$cnt=1;
		if($ext=="jpg" || $ext=="jpeg" || $ext=="png" || $ext1=="jpg" || $ext1=="png" || $ext1=="jpeg")
		{
			if(move_uploaded_file($_FILES["txtlogo"]["tmp_name"],$event_logo))
			{
				if(move_uploaded_file($_FILES["txtimage"]["tmp_name"],$event_image))
			{
				if($event_des!="")
				{
		$obj=new database();
		$res=$obj->getallvenue();
		while($row=mysql_fetch_assoc($res))
		{
		
			if($cnt==1)
			{
					$fk_venue_id=$row["pk_venue_id"]+1;
					break;
			}
			$cnt=$cnt+1;
			
		}
		
		$obj1=new database();
		$res2=$obj1->createvenue($venue_name,$venue_add,$city,$pincode);
		$obj=new database();
		$res1=$obj->createevent($pk_event_id,$event_name,$event_logo,$event_image,
		$event_des,$fk_venue_id,$event_date,$event_time,$event_ticket,
		$event_price,$fk_cat_id,$fk_email_id,$fk_offer_id,$event_cnt,$flag,$event_last_date);
		if($res1==1)
		{
			echo '<script>alert("Your Event Display After Some Time");
			window.location.href="index.php";
			</script>';
			
		}
		else
		{
			echo"something went wrong";
		}
			}
			else{
				echo '<script>alert("Please Enter Description");</script>';
			}
			}
		}
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
					
					<label><font color="black" size=2>Event Name</font><font color="red">*</font></label>
					</br>
					<input type="text" placeholder="Event Title" name="txtname" class="form-control" maxlength="20"  required/> 
					</br>
					
					<label><font color="black" size=2>Event Description</font><font color="red">*</font></label>
					</br>
					<textarea rows="12" cols="76" name="txtdes"  placeholder="Event Description"  class="form-control" required/>
					</textarea>
					<font size="2" color="red">*Maximum 2000 character</font>
					</br></br>
					<label><font color="black" size=2>Venue Name</font><font color="red">*</font></label>
					</br>
					<input type="text" placeholder="Venue Name" name="txtvenuename" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Venue Address</font><font color="red">*</font></label>
					</br>
					<input type="text" placeholder="Venue Address" name="txtvenueaddress" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Pincode</font><font color="red">*</font></label>
					</br>
					<input type="text" placeholder="Pincode" id="test1" name="txtpincode" maxlength=6  class="form-control" required/> 
					</br>
					
					
					
		</div>
	</div>
	
	<div class="col-md-6 col-sm-6">	
						
						
					<label><font color="black" size=2>Select Event Logo</font><font color="red">*</font></label>
					</br>
					<input type="file" name="txtlogo"  />
					</br>
					
					<label><font color="black" size=2>Event Image</font><font color="red">*</font></label>
					</br>
				<input type="file" name="txtimage" />
					</br>
					
					<table class="tabel">
					<tr>
					<td><label><font color="black" size=2>Event Date (dd-mm-yy) </font><font color="red">*</font></label>
					<td>
					<select name="day" class="form-control">
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					</select>
					
					<td>
					<select name="month" class="form-control">
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					</select>
					
					<td>
					<select name="year" class="form-control">
					<option value="2017">2017</option>
					</select>
					
					
					</tr>
					</table>
					</br>


					<table class="tabel">
					<tr>
					<td><label><font color="black" size=2>Event Time</font><font color="red">* </font></label>
					<td>
					<select name="hour" class="form-control">
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="0">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					</select>

					
					<td>
					<select name="min" class="form-control">
					<option value="0">0</option>
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					<option value="25">25</option>
					<option value="30">30</option>
					<option value="35">35</option>
					<option value="40">40</option>
					<option value="45">45</option>
					<option value="50">50</option>
					<option value="55">55</option>
					</select>
	
					
					<td>
					<select name="ampm" class="form-control">
					<option value="AM">AM</option>
					<option value="PM">PM</option>
					</select>

					
					</tr>
					</table>
					</br>


					<label><font color="black" size=2>Event Ticket</font><font color="red">*</font></label>
					</br>
					<input type="text" placeholder="Event Price" id="test2" name="txtticket" class="form-control" required/> 
					</br>
				
					<label><font color="black" size=2>Event Price</font><font color="red">*</font></label>
					</br>
					<input type="text" placeholder="Event Price" id="test3" name="txtprice" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Select City</font><font color="red">*</font></label>
					</br>
					<select name="txtcity" class="form-control" >
								<?php
									$obj=new database();
									$res=$obj->getAllCity();
									while($row=mysql_fetch_array($res,MYSQL_ASSOC))
									{
										echo '<option value="'.$row["pk_city_id"].'">'.$row["city_name"].'</option>';
									}
								?>
					</select>	
		
					
					
					<label><font color="black" size=2>Select Category</font><font color="red">*</font></label>
					</br>
					<select name="txtcat" class="form-control" >
								<?php
									
									$res=$obj->getAllCat();
									while($row=mysql_fetch_array($res,MYSQL_ASSOC))
									{
										echo '<option value="'.$row["pk_cat_id"].'">'.$row["cat_name"].'</option>';
									}
								?>
					</select>	
					</br>
					
					
					<table class="tabel">
					<tr>
					<td><label><font color="black" size=2>Last Date of booking (dd-mm-yy) </font><font color="red">*</font></label>
					<td>
					<select name="lastday" class="form-control">
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
					</select>
					
					<td>
					<select name="lastmonth" class="form-control">
					<option value="01">1</option>
					<option value="02">2</option>
					<option value="03">3</option>
					<option value="04">4</option>
					<option value="05">5</option>
					<option value="06">6</option>
					<option value="07">7</option>
					<option value="08">8</option>
					<option value="09">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					</select>
					
					<td>
					<select name="lastyear" class="form-control">
					<option value="2017">2017</option>
					</select>
					
					
					</tr>
					</table>
					
					</br>
		
		
	</div>
		
	</div>
	</div>
	<br>
		<div>
				<center><input type="submit" name="btncreate" value="Create" class="btn btn-success"/></center>
			</form>
		</div>
	
	</br>
<div class="row">
<div class="col-md-12 col-sm-12">
<?php 

require 'footer.php';
?>
</div>
</div>	
	
</body>
</html>