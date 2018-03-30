<?php 
session_start();
$event_id=$_REQUEST["id"];
$no=$_POST["no"];
$promo=$_POST["promo"];
	if(isset($_SESSION["email"]))
	{
		$email=$_SESSION["email"];
	}
	else{
		
		header('Location:login.php?id='.$event_id.'');
	}
	$email=$_SESSION["email"];
	require 'database.php';
	$obj=new database();
	$event_id=$_REQUEST["id"];
	$res=$obj->eventbyiddis($event_id);
	while($row=mysql_fetch_assoc($res))
	{
		$photo=$row["event_image"];
		$event_name=$row["event_name"];
		$venue_name=$row["venue_name"];
		$city_name=$row["city_name"];
		$event_date=$row["event_date"];
		$event_time=$row["event_time"];
		$event_price=$row["event_price"];
	}
	$amnt=$no*$event_price;
	$amnt1=$amnt;
	$dis=0;
	if($promo!="")
	{
	$res1=$obj->checkpromo($promo);
	$cnt=mysql_num_rows($res1);
	if($cnt==1)
	{
			if($promo=="b1g1")
			{
				if($no%2==0)
				{
				$amnt1=$amnt/2;
				$dis=$amnt/2;
				}
			}
			else if($promo=="put10")
			{
				$dis=($amnt*10)/100;
				$amnt1=$amnt-$dis;
			}
			else if($promo=="dis40")
			{
				$dis=($amnt*40)/100;
				$amnt1=$amnt-$dis;
			}
		
	}
	else{
		echo '<script>alert("Promocode is wrong");</script>';
	}
	}
	
	

 ?>
<!DOCTYPE html>
<html>
<head>
<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
	    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<title>
		Payment Page
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

<script type="text/javascript">
$(document).ready(function(){
$("#test4").keyup(function() {
    var val = $("#test4").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test4").val("");
        $("#test4").focus();
    }
});
});
</script>


<script type="text/javascript">
$(document).ready(function(){
$("#test5").keyup(function() {
    var val = $("#test5").val();
    if (parseInt(val) < 0 || isNaN(val)) {
        alert("Please Enter Only Numeric Values");
        $("#test5").val("");
        $("#test5").focus();
    }
});
});
</script>

  <script type="text/javascript">
        function numberOnly(txt, e) {
            var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
            var code;
            if (window.event)
                code = e.keyCode;
            else
                code = e.which;
            var char = keychar = String.fromCharCode(code);
            if (arr.indexOf(char) == -1)
                return false;
            
        }
    </script>


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
			
			uname.value="";
			uname.focus();
			alert('Owner Name must have Alphabetic characters only');
			return false;
	}
}
function passid_validation(passid,mx,my)
{
	mx=16;
	my=16;
	var pl=passid.value.length;
	if(pl==0 || pl!=my || pl!=mx)
	{
		alert("Card Number should be of 16 digits only ");
		passid.value="";
		passid.focus();
		return false;
	}
	return true;
}

</script>
<?php 
	
		if(isset($_POST["confirm"]))
		{
			$m1=date("m");
			$cardnumber=$_POST["cardnumber"];
			$cvv=$_POST["cvv"];
			$month=$_POST["month"];
			if($month>$m1)
			{
				
				$year=$_POST["year"];
				$date=$month."-".$year;
				$res=$obj->addpayment($email,$cardnumber,$date,$cvv);
				if($res==1)
				{
						$date1=date("d-m-Y");
						$res=$obj->bookticket($email,$event_id,$no,$amnt1,$dis,$date1);
						if($res==1)
						{
							echo '<script>alert("Successfull Booked Your ticket");
							window.location.href="index.php";
							
							</script>';
							
							
						}
				}
				else
				{
					echo '<script>alert("something went wrong");</script>';
				}
			}
			else
			{
				echo '<script>alert("Invalid Expiration Month")</script>';
			}
			
		}
	
	
	?>

</head>

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

	<div class="container-fluid">
<div class="row" style="color:white;">
<div class="col-md-12 col-sm-12">
<center>
<div class="alert alert-danger alert-dismissible" role="alert">
<?php 
echo ' 

		<font size=7 color="red">'.$event_name.' - '.$city_name.'</font>
		</br>
		
		
		<font size=4 color="red">Date : '.$event_date.' | Time : '.$event_time.'</font>
		
		
		';

?>
</div>
</center>
</div>
</div>
</div>

	<div class="container-fluid">
	<div class="row">
	<div class="col-md-3 col-sm-3">
	
	</div>
	</div>
	</div>

	<center>
	<div class="container-fluid">
	<div class="row">
	<div class="col-md-8 col-sm-8">
	
		 <div class="creditCardForm">
            <div class="heading">
                <h1>Confirm Purchase</h1>
            </div>
            <div class="payment">
                <form method="post" action="payment.php?id=<?php echo $event_id; ?>">
                    <div class="form-group owner">
                        <label for="owner">Name</label>
                        <input type="text" class="form-control"  name="owner" onblur="return allLetter(owner);" required/> 
						<!--onkeypress="return numberOnly(this, event)" >-->
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="password" class="form-control" id="test4" name="cvv" maxlength="3" required/>
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="test5" name="cardnumber" onblur="return passid_validation(cardnumber);" maxlength="16" required/>
                    </div>
                    <div class="form-group" id="expiration-date" >
                        <label>Expiration Date</label>
                        <select name="month">
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="year">
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
							<option value="2022">2022</option>
                        </select>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="assets/images/visa.jpg" id="visa">
                        <img src="assets/images/mastercard.jpg" id="mastercard">
                        <img src="assets/images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <button type="submit" class="btn btn-default" name="confirm" id="confirm-purchase">Confirm</button>
                    </div>
                
            </div>
        </div>

	</div>
	<input type="hidden" name="no" value="<?php echo $no; ?>">
	<input type="hidden" name="promo" value="<?php echo $promo; ?>">
	
		<div class="col-md-4 col-sm-4">
		<div class="thumbnail" style="margin-top:90px">
		<img src="<?php echo $photo; ?>" height=700 width=700 />
		<div class="caption">
		<p><font size=5>Payment Summary</font></p>
		<h3 style="margin-right:100px">No Of Ticket  <?php echo '<i style="margin-left:20px">'.$no.'</i>'; ?></h3>
		<h3>Amount <?php echo '<i style="margin-left:70px;">INR '.$amnt.'</i>'; ?></h3>
		<h3>Discount <?php echo '<i style="margin-left:70px;">INR '.$dis.'</i>'; ?></h3>
		<hr>	
		<h3>Total Amount <?php echo '<i style="margin-left:30px">INR '.$amnt1.'</i>'; ?> </h3>
		</div>
		</div>
		</div>
	</div>
	</div>
	</form>
	</center>
	
	
</body>
</html>