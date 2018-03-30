<?php 
	session_start();
	$pk_cat_id=$_REQUEST["id"];
	include 'admindatabase.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Category Edit</title>
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
<script type="text/javascript">
	
	function allLetter(uname)
{
	var letters=/^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
			return true;
	}
	else
	{
			
			uname.focus();
			alert('Category Name must have Alphabetic characters only');
			return false;
	}
}

</script>

<!--//skycons-icons-->
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
								<h3 class="inner-tittle two"><center><font size="10" color="#FF6347">Update Category  </font></center></h3>
									<div class="graph">
										<div class="tables">		
			
			
													<?php
														$obj=new Database();
														$res=$obj->catEdit1($pk_cat_id);
														while($row=mysql_fetch_array($res,MYSQL_ASSOC))
														{
															$cat_id=$row["pk_cat_id"];		
															$cat_name=$row["cat_name"];		
														}
														
													 ?>
							
										<div class="set-1">
											<div class="graph-2 general">
												<div class="grid-1">
													<div class="form-body">
													<form class="form-horizontal" method="post" action="catedit1.php">
														<div class="form-group">
														<label for="focusedinput" class="col-sm-2 control-label"><font size="3" color="black"><b>Category Name</b></font></label>
															<div class="col-sm-8">
														
															<input type="text" class="form-control1" id="focusedinput" value="<?php echo $cat_name; ?>" name="txtcatname" placeholder="Category Name" onblur="return allLetter(txtcatname);"/>
															<input type="text" hidden class="form-control1" id="focusedinput" value="<?php echo $pk_cat_id; ?>" name="txtcatid" placeholder="Category Id"/>	
															<center><button type="submit" style="background-color: lightgreen" class="btn btn-default" value="Update" name="btnupdate" >Update</button></center>
															</div>
														</div>
													</form>
													
														
													</div>
												</div>
											</div>
										</div>
										</div>
									</div>
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