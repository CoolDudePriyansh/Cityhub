<?php 
	session_start();
	require 'database.php';
	$obj=new database();
	$city=$_REQUEST["id"];
?>

<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

	<title>
		Category Wise Display
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
		if(isset($_SESSION["email"]))
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
	</div>
<div class="row">
<div class="col-md-3 col-sm-3">
<center><h1>Offers For You</h1></center>

</div>
<div class="col-md-7 col-sm-7">
<center><h1>Upcoming Events</h1></center>

</div>
<div class="col-md-2 col-sm=2" style="margin-top:20px">

<form action="#" method="post"> 
		<select name="txtcity" class="form-control" onChange="window.location='search.php?id='+this.value">
		<option >Select City</option>
								<?php
									$obj=new database();
									$res=$obj->getAllCity();
									while($row=mysql_fetch_array($res,MYSQL_ASSOC))
									{
										echo '<option value="'.$row["pk_city_id"].'"'; 
										if($row["pk_city_id"]==$city){
										echo 'selected="selected"';
										}
										echo '>'.$row["city_name"].'</option>';
									}
								?>
					</select>	
					</form>
					
</div>
</div>

<div class="row">
<div class="col-md-3 col-sm-3">
</br>
</br>
<?php

	$cnt=1;
	$res=$obj->offerdis();
	while($row=mysql_fetch_assoc($res))
	{
		if($cnt>3)
		{
				break;
		}
		echo '
    <div class="thumbnail">
      <img src="'.$row["offer_photo"].'" height="100" width="250">
      <div class="caption">
        <h3>Promocode :<font color="red"> '.$row["offer_promocode"].'</font></h3>
        <h3>Price :<font color="red"> '.$row["offer_price"].'</font></h3>
      </div>
    </div>
  ';
  $cnt=$cnt+1;
	}
	?>

	</div>
<div class="col-md-8 col-sm-6">
</br>

</br>

	<?php 
	$flag=0;
	$mng=0;
	
		
		$obj=new database();
		$res=$obj->citywisedis($city);
		$cnt=mysql_num_rows($res);
		if($cnt>0)
		{
		while($row=mysql_fetch_assoc($res))
	{
		if($mng<9)
		{
		$da=(int)date("d");
		$month=(int)date("m");
		$year=(int)date("Y");
		$d=$row["event_date"];
		$arr=explode("-",$d);
		$d1=(int)$arr[0];
		$m1=(int)$arr[1];
		$y1=(int)$arr[2];
		if($y1>=$year)
		{
			if($m1==$month)
			{
				if($d1>=$da)
				{
		echo '
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="height:250px">
      <img src="'.$row["event_logo"].'" style="height:150px">
	  <a href=viewevent.php?id='.$row["pk_event_id"].'>
      <div class="caption">
        <h4><b>'.$row["event_name"].'</b></h4>
        
      </div>
	  </a>
    </div>
  </div>';
  $mng=$mng+1;
	}
			}
				if($m1>$month)
				{
		echo '
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="height:250px">
      <img src="'.$row["event_logo"].'" style="height:150px">
	  <a href=viewevent.php?id='.$row["pk_event_id"].'>
      <div class="caption">
        <h4><b>'.$row["event_name"].'</b></h4>
       
      </div>
	  </a>
    </div>
  </div>';
  $mng=$mng+1;
			}
			
			
		}
		
		}
	$flag=1;
	}
		}
	else
	{
		echo '<script>alert("No Event");
		
		window.location.href="index.php";
		</script>';
	}
		
	
	
	
	?>	
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
</html>