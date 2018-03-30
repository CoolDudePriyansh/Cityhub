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
		require 'header.php';
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
		<center><font font size="15" color="red"> Account </font></center>
	</div>
	</div>

	<div class="container">
	<div class="row">
	<div class="col-md-12 col-sm-12">
		
		<div class="form">
			</br>
			</br>
			<form method="post" action="mail2.php">

					<label><font color="black" size=2>Email Address</font></label>
					</br>
					<input type="email" placeholder="Enter Email Id" name="txtemail" class="form-control" required/> 
					</br>
				 		<input type="submit" name="btnlogin" value="Continue" class="btn btn-success"/>				 
				  	</div>
			</form>
		</div>
	</div>
	
	
	
	</div>
	</div>
	
	
	
	</br></br></br>
	<div class="row">
<div class="col-md-12 col-sm-12">
<?php 

echo "</br></br></br><br>";
require 'footer.php';
?>
</div>
</div>
	
</body>
</html>