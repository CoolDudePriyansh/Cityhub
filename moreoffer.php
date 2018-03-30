<?php 
	session_start();
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
		Main Page
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

<div class="row">
<div class="col-md-12 col-sm-12">
<center><h1>Offers For You</h1></center>
<?php

	$res=$obj->offerdis();
	while($row=mysql_fetch_assoc($res))
	{
		echo '
    <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="height:350px">
      <img src="'.$row["offer_photo"].'" style="height:200px;">
	  
      <div class="caption">
        <h3>Promocode :<font color="red"> '.$row["offer_promocode"].'</font></h3>
      
      </div>
	
    </div>
  </div>';
  
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