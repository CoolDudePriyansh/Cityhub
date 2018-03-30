<?php 
	$pk_email_id=$_REQUEST["id"];

	require 'admindatabase.php';
	$obj=new database();
	$res=$obj->userDel($pk_email_id);
	if($res==1)
	{
		header('Location:userdis.php');
		
	}
	else
		echo"NOt deleted";

?>