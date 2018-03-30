<?php 

	$pk_city_id=$_POST["txtcityid"];
	$city_name=$_POST["txtcityname"];
	require 'admindatabase.php';
	$obj=new Database();
	$res=$obj->cityEdit($pk_city_id,$city_name);
	if($res==1)
	{
		header('Location:citydis.php');
	}
	else
	{
		echo"NOt updated";
	}
?>