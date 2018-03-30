<?php 
	session_start();
	require 'database.php';
	$obj=new database();
	$email=$_SESSION["email"];
	$pk_event_id=$_REQUEST["id"];
?>

<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

	<title>
		Event Report 
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
		if(isset($_SESSION["email"])!="")
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
	
	
	
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-3 col-sm-3">
		
		
		<table>
		<tr>
			<td><a href="dashboard.php"><font size=6>Organizer View</font></a>
		</tr>
		<tr>
			<td>&nbsp;
		</tr>
		<tr>
			<td><hr>
		</tr>
		
		<tr>
			<td><a href="upcomingevent.php"><font size=6>Upcoming events</font></a>
		</tr>
		<tr>
			<td>&nbsp;
		</tr>
		<tr>
			<td><hr>
		</tr>
		<tr>
			<td><a href="pastevent.php"><font size=6>Past events</font></a>
		</tr>
		<hr>
		</table>

		
	</div>

	
	<div class="col-md-9 col-sm-9">
		<center><font size="10" color="red"> Event Report </font></center>
		</br>
	<?php 
	$obj1=new database();
	$res=$obj1->getAllUserBookById($pk_event_id);
	$totqty=0;
	$totamnt=0;
	$totpaid=0;
	while($row=mysql_fetch_assoc($res))
	{
		$ticket_cnt=$row["ticket_cnt"];
		$amnt=$row["ticket_amnt"];
		$totqty=$ticket_cnt+$totqty;
		$totamnt=$amnt+$totamnt;
		
	}
	?>
	<center>
	<table class="table" border="1" style="width:650px;">
		<tr>
			<td><b><center>Total Quantity</center>
			<td><b><center>Total Amount</center>
			<td><b><center>Total Discount</center>
			<td><b><center>Total Paid</center>
			
		</tr>
		<tr>
			<td><center><?php echo "$totqty";?></center>
			<td><center><?php echo "$totamnt";?></center>
			<td><center><?php echo "$totamnt";?></center>
			<td><center><?php echo "$totamnt";?></center>
			
		</tr>
	
	</table>
		</center>
	
	</div>
	
	
	<div class="col-md-9 col-sm-9">
		<h2 ><font color="red"><center>Details</center></font></h2>
		</br>
		<table class="table">
			<tr>
			<td><b><center>Sr No.</center>
			<td><b><center>Date</center>
			<td><b><center>User Name</center>
			<td><b><center>User Email Id</center>
			<td><b><center>User Contact Number</center>
			<td><b><center>Qty</center>
			<td><b><center>Amount</center>
			<td><b><center>Paid</center>
			</tr>
	
	<?php 
	$obj=new database();
	$res=$obj->getAllUserBookById($pk_event_id);
	$sr=1;
	while($row=mysql_fetch_assoc($res))
	{
		$user_mobile_no=$row["user_mobile_no"];
		$ticket_cnt=$row["ticket_cnt"];
		$amnt=$row["ticket_amnt"];
		
		$user_name=$row["user_name"];
		$pk_email_id=$row["pk_email_id"];
		
		echo '
			<tr>
				<td><center>'.$sr.'
				<td><center>'.$row["book_date"].'
				<td><center>'.$user_name.'
				<td><center>'.$pk_email_id.'
				<td><center>'.$user_mobile_no.'
				<td><center>'.$ticket_cnt.'
				<td><center>'.$amnt.'
				<td><center>'.$amnt.'
			</tr>
			
		
		';
		$sr=$sr+1;
	}
	
	?>	
	</table>
	<center>
	</br>
	<form method="post" action="mail1.php?id=<?php echo $pk_event_id; ?>">
	<input type="submit" name="submit" value="Send Reminder" class="btn btn-danger">
	</center>
	</form>
	
</br></br>
	</div>

<div class="row">
	<div class="col-md-12 col-sm-12">
	<?php 
		require 'footer.php';
	?> 
	</div>
	</div>		
</body>
</html>