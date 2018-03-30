<?php 
	session_start();
	require 'database.php';
	$obj=new database();
	$email=$_SESSION["email"];
	$city=$_REQUEST["id"];
	
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
	<div class="col-md-10 col-sm-10">
		<center><font font size="15" color="red"> Upcoming Event </font></center>
		
		</div>
		<div class="col-md-2 col-sm-2" >
		</br>
		<form action="#" method="post"> 
		<select name="txtcity" class="form-control" onChange="window.location='upcomingeventsearch.php?id='+this.value">
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
	$mng=0;
	$obj=new database();
		$res=$obj->citywisedis($city);
	while($row=mysql_fetch_assoc($res))
	{
		if($mng<$_SESSION["num"])
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
      <img src="'.$row["event_logo"].'" style="height:150px" >
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
				else if($m1>=$month)
				{
		echo '
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="height:250px">
      <img src="'.$row["event_logo"].'" style="height:150px;">
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