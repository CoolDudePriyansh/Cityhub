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
		Change Profile
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
	
			$res=$obj->profiledetail($email);
			while($row=mysql_fetch_assoc($res))
			{
				$user_mobile_no=$row["user_mobile_no"];
				$user_name=$row["user_name"];
				$city=$row["fk_city_id"];
				$user_photo=$row["user_photo"];
			}
				if(isset($_POST["btnedit"]))
				{
					$user_mobile_no=$_POST["txtmob"];
					$city=$_POST["txtcity"];
					$user_name=$_POST["txtname"];
					$photo="userphoto/".$_FILES["photo"]["name"];
					if($photo==$user_photo)
					{
							
							$photo=$user_photo;
					}
					else{
						if($photo!=NULL)
						{
						unlink($user_photo);
					$ext=pathinfo($photo,PATHINFO_EXTENSION);
						}
					}
					
					
				if($ext=="jpg" || $ext=="jpeg" || $ext=="png")
				{	
			echo $photo;
			move_uploaded_file($_FILES["photo"]["tmp_name"],$photo);
					$res=$obj->editprofile($email,$user_mobile_no,$user_name,$city,$photo);
					if($res==1)
					{
						echo '<script>alert("Successfully changed Your profile");
		window.location.href="index.php";
		</script>';
							
					}
					else{
							echo '<script>alert("NOT EDITED YOUR PROFILE");</script>';
					}
					
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
		<center><font font size="15" color="red"> Change Your Profile </font></center>
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
			<form method="post" action="changepro.php" enctype="multipart/form-data">

					<label><font color="black" size=2>User Photo</font></label>
					</br>
					<img src="<?php echo $user_photo; ?>" height="150px" width="150px">
					<input type="file"  name="photo" class="form-control1" /> 
					</br>
					
					<label><font color="black" size=2>Email Address</font></label>
					</br>
					<input type="email" placeholder="Enter Your Email Id" name="txtemail" value="<?php echo $email; ?>" readonly class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>Mobile No.</font></label>
					</br>
					<input type="text" placeholder="Enter Your Mobile No." name="txtmob" value="<?php echo $user_mobile_no; ?>" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>User Name</font></label>
					</br>
					<input type="text" placeholder="Enter Your User Name" name="txtname" value="<?php echo $user_name; ?>" class="form-control" required/> 
					</br>
					
					<label><font color="black" size=2>City Name</font></label>
					</br>
					<select name="txtcity" class="form-control">
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
					</br>
					
					
					
					<center><input type="submit" name="btnedit" value="Update" class="btn btn-success"/></center>
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