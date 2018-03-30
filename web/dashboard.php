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
<?php 
 $page = $_SERVER['PHP_SELF'];
 $sec = "10";
 header("Refresh: $sec; url=dashboard.php");
?>
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
														</div></a>
														
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
														</div></a>
														
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
														</div></a>
														
														<a href="citydis.php"><div class="col-md-3 widget states-last">
															<div class="stats-left">
																<h5>Total</h5>
																<h4>City</h4>
															</div>
															<?php 
																$obj=new Database();
																$res=$obj->getAllCity();
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
														</div></a>
														
														
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
														
														<a href="todaybookdetails.php"><div class="col-md-3 widget states-thrd">
															<div class="stats-left">
																<h5>Today's</h5>
																<h4>Bookings</h4>
															</div>
															<?php 
																$obj=new Database();
																$d=date("d-m-Y");
																$res=$obj->getAllEventByBookDate($d);
																$count=mysql_num_rows($res);
															?>
															<div class="stats-right">
																<label><?php echo "$count" ?></label>
															</div>
															<div class="clearfix"> </div>	
														</div></a>
														
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
														
														
														
													</div>
												</div>
												
												
												<div class="charts">
												  <div class="chrt-inner">
												    <div class="chrt-bars">
														<div class="col-md-6 chrt-two">
														 <h3 class="sub-tittle"><center><font size="8" color="#FF6347">Month wise Events</font></center> </h3>
															<div id="chart2"></div>
															<?php 
															
																$obj=new database();
																$res=$obj->getAllActiveEvent();
																$count=mysql_num_rows($res);
																$cnt1=0;$cnt2=0;$cnt3=0;$cnt4=0;$cnt5=0;$cnt6=0;
																while($row=mysql_fetch_assoc($res))
																{
																	
																	$d=$row["event_date"];
																	$arr=explode("-",$d);
																	
																	$m1=(int)$arr[1];
																	
																
																	
																	if($m1=="01")
																	{
																		$cnt1=$cnt1+1;;
																	}
																	if($m1=="02")
																	{
																		$cnt2=$cnt2+1;
																	}
																	if($m1=="03")
																	{
																		$cnt3=$cnt3+1;
																	}	
																	if($m1=="04")
																	{
																		$cnt4=$cnt4+1;
																	}
																	if($m1=="05")
																	{
																		$cnt5=$cnt5+1;
																	}	
																	if($m1=="12")
																	{
																		$cnt5=$cnt5+1;
																	}
																}
															?>
															<script src="js/fabochart.js"></script>
															<script>
															$(document).ready(function () {
																data = {
																 
																  'January' : <?php echo $cnt1;?>,
																  'February' : <?php echo $cnt2;?>,
																  'March' : <?php echo $cnt3;?>,
																  'April' : <?php echo $cnt4;?>,
																  'May' : <?php echo $cnt5;?>,
																  'June' : <?php echo $cnt6;?>
																  
																};

																$("#chart1").faBoChart({
																  time: 500,
																  animate: true,
																  instantAnimate: true,
																  straight: false,
																  data: data,
																  labelTextColor : "#FF6347",
																});
																$("#chart2").faBoChart({
																  time: 2500,
																  animate: true,
																  data: data,
																  straight: true,
																  labelTextColor : "#FF6347",
																});
															});
															</script>
														</div>
														
														
														<div class="col-md-6 chrt-three">
														 <h3 class="sub-tittle"><center><font size="8" color="#FF6347">Month wise Bookings</font></center> </h3>
															<div id="chart3"></div>
															
																<?php 
															
																$obj=new database();
																$res=$obj->getAllBook();
																$count=mysql_num_rows($res);
																$cnt1=0;$cnt2=0;$cnt3=0;$cnt4=0;$cnt5=0;$cnt6=0;
																while($row=mysql_fetch_assoc($res))
																{
																	
																	$d=$row["book_date"];
																	$arr=explode("-",$d);
																	
																	$m1=(int)$arr[1];

																	if($m1=="01")
																	{
																		$cnt1=$cnt1+1;;
																	}
																	if($m1=="02")
																	{
																		$cnt2=$cnt2+1;
																	}
																	if($m1=="03")
																	{
																		$cnt3=$cnt3+1;
																	}	
																	if($m1=="04")
																	{
																		$cnt4=$cnt4+1;
																	}
																	if($m1=="05")
																	{
																		$cnt5=$cnt5+1;
																	}	
																	if($m1=="12")
																	{
																		$cnt5=$cnt5+1;
																	}
																}
															?>
										
															<script src="js/fabochart.js"></script>
															<script>
															$(document).ready(function () {
																data = {
																 
																  'January' : <?php echo $cnt1;?>,
																  'February' : <?php echo $cnt2;?>,
																  'March' : <?php echo $cnt3;?>,
																  'April' : <?php echo $cnt4;?>,
																  'May' : <?php echo $cnt5;?>,
																  'June' : <?php echo $cnt6;?>
																
																  
																};

																$("#chart1").faBoChart({
																  time: 500,
																  animate: true,
																  instantAnimate: true,
																  straight: false,
																  data: data,
																  labelTextColor : "#FF6347",
																});
																$("#chart3").faBoChart({
																  time: 2500,
																  animate: true,
																  data: data,
																  straight: true,
																  labelTextColor : "#FF6347",
																});
															});
															</script>
														</div>
														
													</div>
													
													
										<div class="bottom-grids">
										<div class="dev-table">    
										<div class="col-md-4 dev-col mid">                                    
										
										<?php 
															
											$obj=new database();
											$d=date("d-m-Y");
											$res=$obj->getAllBookByToday($d);
											$count=mysql_num_rows($res);
											$tot=0;
											while($row=mysql_fetch_assoc($res))
											{			
												$ticket_amnt=$row["ticket_amnt"];
												$tot=$tot+$ticket_amnt;
											}
										?>
                                            <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                <h3 class="inner">Today's Earnings</h3>
                                                <p>This is Today's earnings </p>                                        
                                                <div class="dev-stat">INR <span class="counter"><?php echo $tot;?></span></div>                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 79%;"></div>
                                                </div>                                        
											</div>
                                        </div>
											
											
											<div class="col-md-4 dev-col mid">
											<?php 
															
											$obj=new database();
											$d=date("d-m-Y");
											$res=$obj->getAllEventByDate($d);
											$count=mysql_num_rows($res);
											
										?>
											 <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                <h3 class="inner">Today's Events</h3>
                                                <p>This is Today's Events </p>                                        
                                                <div class="dev-stat">Today <span class="counter"><?php echo $count;?> Event</span></div>                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 3%;"></div>
                                                </div>                                        

                                            
											</div>
										
										</div>
										
										<div class="col-md-4 dev-col mid">
											<?php 
															
											$obj=new database();
											$res=$obj->getAllEventByFlag();
											$count=mysql_num_rows($res);
											
										?>
											 <div class="dev-widget dev-widget-transparent dev-widget-success">
                                                <h3 class="inner">Approve/DisApprove</h3>
                                                <p>This is Approve/DisApprove Box </p>                                        
                                                <div class="dev-stat">You have <span class="counter"><?php echo $count;?> Approval/DisApproval</span></div>                                                                                
                                                <div class="progress progress-bar-xs">
                                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 3%;"></div>
                                                </div>                                        

                                            
											</div>
										
										</div>
										
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