<?php 
	session_start();
	include 'admindatabase.php';
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Offer Details</title>
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
								<h3 class="inner-tittle two"><center><font size="10" color="#FF6347">Offer Display </font></center></h3>
									<div class="graph">
										<div class="tables">		
												
										<div>
											<a href="addoffer.php"><font size="5"><span style="color:#FF6347;" class="glyphicon glyphicon-plus" aria-hidden="true"></span></font></a>
										</div>		
																		
				<table class="table table-bordered" id="dataTable">
				<thead>
				<tr class="active">
					<th><font size="3" color="#FF6347"><b>Offer Name</b></font>
					<th><font size="3" color="#FF6347"><b>Offer Promodoe</b></font>
					<th><font size="3" color="#FF6347"><b>Offer Price</b></font>
					<th><font size="3" color="#FF6347"><b>Offer Photo</b></font>
					<th><font size="3" color="#FF6347"><b>Update</b></font>
					<th><font size="3" color="#FF6347"><b>Delete</b></font>
				</tr>
				</thead>
				
				<tbody>
				<?php
							

				$obj=new Database();
				$res=$obj->getAllOffers();
				while($row=mysql_fetch_assoc($res))
				{
					echo '<tr>';
					echo '<td><font size="3" color="black">'.$row["offer_name"].'</font>';
					echo '<td><font size="3" color="black">'.$row["offer_promocode"].'</font>';
					echo '<td><font size="3" color="black">'.$row["offer_price"].'</font>';
					echo '<td><center><img src="../'.$row["offer_photo"].'" height="100px" width="100px"></center>';
					echo '<td><a href="offeredit.php?id='.$row["pk_offer_id"].'"><button style="background-color: lightgreen" type="button" class="btn btn-info" aria-label="Left Align"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>';
					echo '<td><a href="offerdel.php?id='.$row["pk_offer_id"].'"><button style="background-color: #FF6347" type="button" class="btn btn-info" aria-label="Left Align"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>';
		
					echo '</tr>';
				}						
				
				?>
			</tbody>
			</table> 
			
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