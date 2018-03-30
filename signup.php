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
		Signup
	</title>

<script type="text/javascript">
function passid_validation(passid,mx,my)
{
	mx=5;
	my=12;
	var pl=passid.value.length;
	if(pl==0 || pl>=my || pl<=mx)
	{
		alert("Password should be of 5-12 digits only ");
		passid.value="";
		passid.focus();
		return false;
	}
	return true;
}
</script>

	
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
$("#test6").keyup(function() {
    var val = $("#test6").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test6").val("");
        $("#test6").focus();
    }
});
});

</script>
	
</head>
<?php 
	if(isset($_POST["btnsignup"]))
	{
		$email=$_POST["txtemail"];
		$obj=new database();
		$res=$obj->signupcheck($email);
		$cnt=mysql_num_rows($res);
		if($cnt==0)
		{$name=$_POST["txtuname"];
		$pwd=$_POST["txtpwd"];
		$repwd=$_POST["txtpwd1"];
		$mobile=$_POST["txtmob"];
		$city=$_POST["txtcity"];
		
		$photo="";
		$type="user";
		
		if($pwd==$repwd)
		{
			$obj=new database();
			$res=$obj->signup($email,$pwd,$mobile,$name,$city,$type,$photo);
			if($res==1)
			{
				$_SESSION["email"]=$email;
				header('Location:index.php');
			}
			else
			{
				echo"something went wrong";
			}
		}
		else
		{		
			echo'<script>alert("your Password and Confirm Password is wrong");</script>';
		}
		}
		else{
				echo '<script>alert("Your Email Address already user");</script>';
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
		<center><font font size="15" color="red"> Register </font></center>
	</div>
	</div>
	
	<div class="container">
	<div class="row">	
	<div class="col-md-6 col-sm-6">
	
		<div class="form">
			</br>
			</br>
		<form method="post" action="#">

					<label><font color="black" size=2>Email Address</font></label>
					</br>
					<input type="email" placeholder="Enter Email Id" name="txtemail" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Password</font></label>
					</br>
					<input type="password" placeholder="Enter password" name="txtpwd" class="form-control" onblur="return passid_validation(txtpwd);" required/> 
					</br>
					
					
					<label><font color="black" size=2>Type Your Password Again</font></label>
					</br>
					<input type="password" placeholder="Type Your Password Again" name="txtpwd1" class="form-control" onblur="return passid_validation(txtpwd1);" required/> 
					</br>
			
		</div>
	</div>
	
	
	<div class="col-md-6 col-sm-6">
	
		<div class="form">
			</br>
			</br>
					<label><font color="black" size=2>Mobile Number</font></label>
					</br>
					<input type="test" placeholder="Enter Mobile Number" name="txtmob" class="form-control" id="test6" maxlength="10" required/> 
					</br>
					
					<label><font color="black" size=2>User Name</font></label>
					</br>
					<input type="text" placeholder="Enter User Name" name="txtuname" class="form-control"required/> 
					</br>
					
					<label><font color="black" size=2>Select City</font></label>
					</br>
					<select name="txtcity" class="form-control" >
								<?php
									$obj=new database();
									$res=$obj->getAllCity();
									while($row=mysql_fetch_array($res,MYSQL_ASSOC))
									{
										echo '<option value='.$row["pk_city_id"].'>'.$row["city_name"].'</option>';
									}
								?>
					</select>	
					</br>
					
					
		</div>
	</div>
			
			
		<div>
			<center><input type="submit" name="btnsignup" value="Signup" class="btn btn-success"/></center>
		</form>
		</div>
		
	</div>
	</div>
	
	
	
	<div class="row">
	<div class="col-md-12 col-sm-12">
	<?php 

	echo "<br><br><br>";
	require 'footer.php';
	?>
	</div>
	</div>
	
</body>
</html>