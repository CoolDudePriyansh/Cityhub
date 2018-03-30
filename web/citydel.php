<?php 
	$pk_city_id=$_REQUEST["id"];

	require 'admindatabase.php';
	$obj=new database();
	$res=$obj->cityDel($pk_city_id);
	if($res==1)
	{
		header('Location:citydis.php');
		
	}
	else
		echo"NOt deleted";

?>