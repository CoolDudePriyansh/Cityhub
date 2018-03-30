<?php
	session_start(); 
	include 'database.php';
?>
<!DOCTYPE html>
<html>
<head>

<link href="Content/bootstrap.css" rel="stylesheet"/>
<script src="Scripts/jquery-1.9.1.js"></script>
<script src="Scripts/bootstrap.js"></script>

<title>Feedback Form</title>

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
<form action="feedbackform.php" method="post">
<body>

<div class="row">
<div class="col-md-12 col-sm-12">
<?php 
require 'catheader.php';
?> 
</div>
</div>

<div class="container"> 
<div class="row">
		<h1 style="color:blue; font-size:50px;"><center>Feedback Form</center></h1>
	
	</div>
</div>

<center>

<h3><font color="orange"> We would love to hear your thoughts, concern or problems with anything so we can improve. </font></h3></br>
<form action="contactus.php" method="post">

<table>
<tr>
	<p><h4 style="color:blue">1. From where  have you heard about this website ?</h4></p>
		
		<label>
			<p><input type="radio" name="options" id="option1"  autocomplete="off">Social Media</p>
		</label></br>
		<label>
			<p><input type="radio" name="options" id="option2" style="text-align: center;" autocomplete="off"> Advertising</p>
		</label></br>
		<label>
			<p><input type="radio" name="options" id="option2"  autocomplete="off" style="text-align: center;"> Search Engine</p>
		</label></br>
		<label>
			<p><input type="radio" name="options" id="option2" autocomplete="off"> Friend</p>
		</label></br>
		<label>
			<p><input type="radio" name="options" id="option2" autocomplete="off"> Other</p>
		</label></br>
	
</br>
</tr>
	<p> <h4 style="color:blue">2. What browser do you use ?</h4></p>
	
	<label>
		<p><input type="radio" name="options1" id="option1" autocomplete="off">Google Chrome</p>
	</label></br>
	<label>
		<p><input type="radio" name="options1" id="option2" autocomplete="off"> Firefox</p>
	</label></br>
	<label>
		<p><input type="radio" name="options1" id="option2" autocomplete="off"> IE</p>
	</label></br>
	<label>
		<p><input type="radio" name="options1" id="option2" autocomplete="off"> Safari</p>
	</label></br>
	<label>
		<p><input type="radio" name="options1" id="option2" autocomplete="off"> Opera</p>
	</label></br>
</br>

	<p> <h4 style="color:blue">3. Which device did you use to access the website ?</h4></p>
	<label>
		<p><input type="radio" name="options2" id="option1" autocomplete="off">Desktop/Laptop</p>
	</label></br>
	<label>
		<p><input type="radio" name="options2" id="option2" autocomplete="off"> Pad Device</p>
	</label></br>
	<label>
		<p><input type="radio" name="options2" id="option2" autocomplete="off"> Mobile</p>
	</label></br>
</br>

	<p> <h4 style="color:blue">4. Did our Website meet your expectations ?</h4></p>
	<label>
		<p><input type="radio" name="options3" id="option1" autocomplete="off"> Yes</p>
	</label></br>
	<label>
		<p><input type="radio" name="options3" id="option2" autocomplete="off"> No</p>
	</label></br>
</br>

	<p> <h4 style="color:blue">5. Did you find our work technically sound ?</h4></p>
	<label>
		<p><input type="radio" name="options4" id="option1" autocomplete="off"> Yes</p>
	</label></br>
	<label>
		<p><input type="radio" name="options4" id="option2" autocomplete="off"> No</p>
	</label></br>
</br>

	<p> <h4 style="color:blue">6. Are you satisfied with our website ?</h4></p>
	<label>
		<p><input type="radio" name="options5" id="option1" autocomplete="off">Very Satisfied</p>
	</label><br>
	<label>
		<p><input type="radio" name="options5" id="option2" autocomplete="off"> Satisfied</p>
	</label><br>
	<label>
		<p><input type="radio" name="options5" id="option2" autocomplete="off"> Neutral</p>
	</label><br>
	<label>
		<p><input type="radio" name="options5" id="option2" autocomplete="off"> Unsatisfied</p>
	</label><br>
	<label>
		<p><input type="radio" name="options5" id="option2" autocomplete="off"> Very Unsatisfied</p>
	</label>
</br>

</table>
</center>
</br>
</br>

<center>
	<div>
		<a href="feedbackform.php"><input type="submit" name="btnupdate" value="Submit" class="btn btn-warning"></a>
	</div>
</center>
<br>
<br>

<?php include'footer.php'; ?>
</form>

</body>
</html>