<?php 
	$pk_cat_id=$_REQUEST["id"];

	require 'admindatabase.php';
	$obj=new database();
	$res=$obj->catDel($pk_cat_id);
	if($res==1)
	{
		header('Location:catdis.php');
		
	}
	else
		echo"NOt deleted";

?>