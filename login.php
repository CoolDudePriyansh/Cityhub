<?php 
	session_start();
	$id=$_REQUEST["id"];
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
<?php
	if(isset($_POST["btnlogin"]))
	{
		$email=$_POST["txtemail"];
		$pwd=$_POST["txtpwd"];
		$obj=new Database();
		$res=$obj->login($email,$pwd);
		while($row=mysql_fetch_assoc($res))
		{
			$type=$row["user_type"];
		}
		$cnt=mysql_num_rows($res);
		if($cnt==1)
		{
			$_SESSION["email"]=$email;
			if($type=="user")
			{
				
				if($id==0)
				{
					
				header("Location:index.php");
				}
				else{
					
					header("Location:viewevent.php?id=".$id);
				}
			}
			else{
				header("Location:web/dashboard.php");
			}
		}
		else
		{
			echo '<script>alert("something went wrong");</script>';
		}
	}		
	?>
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
	<div class="col-md-6 col-sm-6">
		
		<div class="form">
			</br>
			</br>
			<form method="post" action="login.php?id=<?php echo $id; ?>">

					<label><font color="black" size=2>Email Address</font></label>
					</br>
					<input type="email" placeholder="Enter Email Id" name="txtemail" class="form-control" required/> 
					</br>
					<label><font color="black" size=2>Password</font></label>
					</br>
					<input type="password" placeholder="Enter password" name="txtpwd" class="form-control" required/> 
					</br>
					<div class="word-in">
				  		<a class="forgot" href="forgetpass.php">Forgot Your Password?</a></br>
						</br>
				 		<input type="submit" name="btnlogin" value="Login" class="btn btn-success"/>				 
				  	</div>
			</form>
		</div>
	</div>
	
	<div class="col-md-6 col-sm-6">
		</br>
		</br>
		<div>
			<h4><b>NEW CUSTOMERS</b></h4>
			<p>By creating an account with our Website, you will be able to
			   book and create Events and do payment procedures faster...
			</p>
			<a class="btn btn-success" href="signup.php">Create an Account</a>
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