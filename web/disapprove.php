<?php 
	$pk_event_id=$_REQUEST["id"];
	require 'admindatabase.php';
	
	$obj=new Database();
	$res=$obj->eventDisApprove($pk_event_id);
																
	if($res==1)
	{
		header('location:appdis.php');
	}

?>