<?php 

	$pk_cat_id=$_POST["txtcatid"];
	$cat_name=$_POST["txtcatname"];
	require 'admindatabase.php';
	$obj=new Database();
	$res=$obj->catEdit($pk_cat_id,$cat_name);
	if($res==1)
	{
		header('Location:catdis.php');
		
	}
	else
	{
		echo"NOt updated";
	}
?>