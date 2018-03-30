<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
require_once "phpmailer/class.phpmailer.php";
$email=$_POST["txtemail"];

include 'database.php';
$obj=new database();
$res=$obj->profiledetail($email);
$cnt=mysql_num_rows($res);
if($cnt==1)
{
	while($row=mysql_fetch_assoc($res))
	{
		$pass=$row["user_password"];
	}
}
else
{
	echo '<script>alert("Your email id is wrong");</script>';
}
$message = "<h1>CityHub</h1></br>
			Your Password is ".$pass;
        

$mail = new PHPMailer(true);

$mail->IsSMTP();

$mail->SMTPDebug = 0;

$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';

$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->Username = 'maildemo254@gmail.com';

$mail->Password = 'maildemo1234';
$mail->Subject = ' Password ';
$mail->SetFrom('4197ritu@gmail.com', 'shah Ritu');
$mail->AddAddress($email);

// if your send to multiple person add this line again
//$mail->AddAddress('tosend@domain.com');

// if you want to send a carbon copy
//$mail->AddCC('tosend@domain.com');


// if you want to send a blind carbon copy
//$mail->AddBCC('tosend@domain.com');

// add message body
$mail->MsgHTML($message);


// add attachment if any
//$mail->AddAttachment('time.png');

try {
    // send mail
	
	
    $mail->Send();
    $msg = "Mail send successfully";
	echo '<script>alert("Successfully sent your password to your email id");
	window.location.href="login.php?id=0";</script>';
} catch (phpmailerException $e) {
    $msg = $e->getMessage();
	echo $msg.'in 1';
} catch (Exception $e) {
    $msg = $e->getMessage();
	echo $msg.'in 2';
}
?>
