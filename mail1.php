<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/class.phpmailer.php";
$id=$_REQUEST["id"];
include 'database.php';
$obj=new database();
$res=$obj->eventbyiddis($id);
while($row=mysql_fetch_assoc($res))
{
	$name=$row["event_name"];
	$date=$row["event_date"];
	$add=$row["venue_name"];
	$add2=$row["venue_address"];
	
}
$message = "<h1>CityHub</h1></br><h2>You have booked ticket for a ".$name.".
			</br>Event is on ".$date.".</br>
			Event Address : ".$add.",".$add2."
							</h2>";
        

$mail = new PHPMailer(true);


$mail->IsSMTP();


$mail->SMTPDebug = 0;


$mail->SMTPAuth = true;


$mail->SMTPSecure = 'ssl';


$mail->Host = 'smtp.gmail.com';


$mail->Port = 465;


$mail->Username = 'maildemo254@gmail.com';


$mail->Password = 'maildemo1234';


$mail->Subject = 'Reminder';


$mail->SetFrom('4197ritu@gmail.com', 'shah Ritu');
include 'database.php';
$obj=new database();
	$res=$obj->getAllUserBookById($id);
	
	while($row=mysql_fetch_assoc($res))
	{
		$mail->addAddress($row["fk_email_id"],$row["user_name"]);
		
	}
$mail->MsgHTML($message);




try {
    // send mail
	
	
    $mail->Send();
    $msg = "Reminder send successfully";
	echo '<script>alert("'.$msg.'");window.location.href="dashboard.php";</script>';
	
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
	echo $msg.'in 1';
} catch (Exception $e) {
    $msg = $e->getMessage();
	echo $msg.'in 2';
}
?>
