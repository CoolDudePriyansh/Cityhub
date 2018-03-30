<?php 
	$image_id=$_REQUEST["id"];

	require 'admindatabase.php';
	$obj=new database();
	$res=$obj->imageDel($image_id);
	if($res==1)
	{
		header('Location:adddis.php');
		
	}
	else
		echo"Not deleted";

?>