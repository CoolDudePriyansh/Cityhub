<?php 
	session_start();
	include 'admindatabase.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Add Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
  
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- jQuery -->
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
<!-- lined-icons -->
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<!-- //lined-icons -->
<script src="js/jquery-1.10.2.min.js"></script>
<script src="js/amcharts.js"></script>	
<script src="js/serial.js"></script>	
<script src="js/light.js"></script>	
<script src="js/radar.js"></script>	
<link href="css/barChart.css" rel='stylesheet' type='text/css' />
<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
<!--clock init-->
<script src="js/css3clock.js"></script>
<!--Easy Pie Chart-->
<!--skycons-icons-->
<script src="js/skycons.js"></script>

<script src="js/jquery.easydropdown.js"></script>

<!--//skycons-icons-->
	<link href="../Content/bootstrap.min.css" rel="stylesheet">
    <link href="../css/jquery.dataTables_themeroller.css" rel="stylesheet">
    <link href="../css/endless.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet"> 
    <script src="../js/jquery-1.10.2.min.js"></script>
	<script src="../Scripts/bootstrap.min.js"></script>
	<script src='../js/jquery.dataTables.min.js'></script>

    <script>
        $(function () {
            $('#dataTable').dataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers"
            });

            $('#chk-all').click(function () {
                if ($(this).is(':checked')) {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', true);
                        $(this).parent().parent().parent().addClass('selected');
                    });
                }
                else {
                    $('#responsiveTable').find('.chk-row').each(function () {
                        $(this).prop('checked', false);
                        $(this).parent().parent().parent().removeClass('selected');
                    });
                }
            });
        });
    </script>
</head> 
<body>



<?php include 'sidebar.php' ?>


		<div class="page-container">
			<div class="left-content">
				<div class="inner-content">
				<?php include 'header.php'; ?>
					<div class="outter-wp">
						<div class="sub-heard-part"></div>
							<div class="graph-visual tables-main">
								<h3 class="inner-tittle two"><center><font size="10" color="red">Add Admin </font></center></h3>
									<div class="graph">
								
									
									<div class="form">
			
									<form method="post" action="#">

										<label><font color="black" size=2>Email Address</font></label>
										</br>
										<input type="email" placeholder="Enter Email Id" name="txtemail" class="form-control1" required/> 
										</br>
										
										<label><font color="black" size=2>Password</font></label>
										</br>
										<input type="password" placeholder="Enter password" name="txtpwd" class="form-control1" required/> 
										</br>
										
										<label><font color="black" size=2>Mobile Number</font></label>
										</br>
										<input type="text" placeholder="Enter Mobile Number" name="txtmob" class="form-control1" required/> 
										</br>
										
										<label><font color="black" size=2>User Name</font></label>
										</br>
										<input type="text" placeholder="Enter User Name" name="txtuname" class="form-control1"required/> 
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
					
					
										<div>
											<center><input type="submit" name="btnsignup" value="Add" class="btn btn-success"/></center>
										</div>
									</form>
									</div>
									</div>
							</div>
	
							<?php 
							if(isset($_POST["btnsignup"]))
							{
								$email=$_POST["txtemail"];
								$name=$_POST["txtuname"];
								$pwd=$_POST["txtpwd"];
								$mobile=$_POST["txtmob"];
								$city=$_POST["txtcity"];
								
								$photo="";
								$type="admin";
								
								$obj=new database();
								$res=$obj->signup($email,$pwd,$mobile,$name,$city,$type,$photo);
								if($res==1)
								{
									header('location:index.php');
								}
								else
								{
									echo"something went wrong";
								}
							}
							?>
	
	
			
			
		
							</div>
					</div>
				</div>
			</div>
		</div>
</body>
<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
</script>
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<script src="js/bootstrap.min.js"></script>

</html>