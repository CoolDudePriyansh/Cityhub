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
		Change Password
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
		if(isset($_POST["btnpass"]))
		{
			$pwd=$_POST["txtoldpwd"];
					
			$res=$obj->login($email,$pwd);
			$cnt=mysql_num_rows($res);
			
			if($cnt==1)
			{
				$new=$_POST["txtnewpwd"];
				$renew=$_POST["txtrepwd"];
					
				if($new==$renew)
				{		
					$obj=new database();
					$res=$obj->changePassword($email,$new);
					if($res==1)
					{
						echo '<script>alert("Successfully changed password");
		window.location.href="index.php";
		</script>';
						
					}
					else
					{
						echo"<script>alert('Your password is not match plz try again');</script>";
					}		
				}
				else
				{
						echo "<script>alert('Your password is not match plz try again');</script>";
				}
			}
			else
			{
				echo"<script>alert('Your Old password is wrong plz try again');</script>";
			}	
		}
	?>
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
		<center><font font size="15" color="red"> Change Your Password </font></center>
	</div>
	</div>
	
	<div class="container">
	<div class="row">
	<div class="col-md-3 col-sm-3">
	
	</div>
	
	<div class="col-md-6 col-sm-6">
		
		<div class="form">
			</br>
			</br>
			<form method="post" action="#">

					<label><font color="black" size=2>Email Address</font></label>
					</br>
					<input type="email" placeholder="Enter Your Email Id" name="txtemail" value="<?php echo $email; ?>" readonly class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Old Password</font></label>
					</br>
					<input type="password" placeholder="Enter Old password" name="txtoldpwd" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>New Password</font></label>
					</br>
					<input type="password" placeholder="Enter New password" name="txtnewpwd" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Reenter New Password</font></label>
					</br>
					<input type="password" placeholder="Reenter New password" name="txtrepwd" class="form-control" required/> 
					</br>
					
					<center><input type="submit" name="btnpass" value="Change" class="btn btn-success"/></center>
			</form>
		</div>
	</div>
	
	<div class="col-md-3 col-sm-3">
	
	</div>

	
	</div>
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