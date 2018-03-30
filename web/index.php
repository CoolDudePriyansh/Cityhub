 <?php 
session_start();
include 'admindatabase.php';

?>
<!DOCTYPE HTML>
<html>
<head>
<title>Dashboard</title>
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
</head> 
<body>

<?php include 'sidebar.php' ?>

   <div class="page-container">
   <!--/content-inner-->
	<div class="left-content">
	   <div class="inner-content">
	   
	   <?php include 'header.php' ?>
					<!-- //header-ends -->
						<div class="outter-wp">
								<!--custom-widgets-->
												<div class="custom-widgets">
												   <div class="row-one">
														<a href="userdis.php"><div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Total</h5>
																<h4>Users</h4>
															</div>
															<?php 
																$obj=new Database();
																$res=$obj->getAllUsers();
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div><a>
														<a href="eventdis.php"><div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>Active</h5>
																<h4>Events</h4>
															</div>
															<?php 
																$obj=new Database();
																$res=$obj->getAllActiveEvent();
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div><a>
														<a href="offerdis.php"><div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Active</h5>
																<h4>Offers</h4>
															</div>
															<?php 
																$obj=new Database();
																$res=$obj->getAllOffers();
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div><a>
														<a href="todayevent.php"><div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Today's</h5>
																<h4>Events</h4>
															</div>
															<?php 
																$obj=new Database();
																$d=date("d-m-Y");
																$res=$obj->getAllEventByDate($d);
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div></a>
														<div class="clearfix"> </div>	
														
														<br>
														
														<a href="appdis.php"><div class="col-md-3 widget">
															<div class="stats-left ">
																<h5>Approve</h5>
																<h4>DisApprove</h4>
															</div>
															<?php 
																$obj=new Database();
																$res=$obj->getAllEventByFlag();
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div><a>
														
														
														<a href="disapproved.php"><div class="col-md-3 widget states-mdl">
															<div class="stats-left">
																<h5>DisApproved</h5>
																<h4>Events</h4>
															</div>
															<?php 
																$obj=new Database();
																$res=$obj->getAllEventByDisApproved();
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div></a>
														
														
														
														
													</div>
												</div>
												
										
										
		
											
					</div>
										
						</div>
									 <!--footer section start-->
										
									<!--footer section end-->
								</div>
							</div>
						</div>
				<!--//content-inner-->
				
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
<!--js -->
<link rel="stylesheet" href="css/vroom.css">
<script type="text/javascript" src="js/vroom.js"></script>
<script type="text/javascript" src="js/TweenLite.min.js"></script>
<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>

<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
</body>
</html>