<?php 
	$pk_offer_id=$_REQUEST["id"];
	require 'admindatabase.php';
	
	$obj1=new database();
	$res=$obj1->getOfferById($pk_offer_id);
	while($row=mysql_fetch_assoc($res))
	{
		$offer_photo=$row["offer_photo"];
	}
	$offer_photo="../".$offer_photo;
	unlink($offer_photo);
	$obj=new database();
	$res=$obj->offerDel($pk_offer_id);
	
	if($res==1)
	{
		header('Location:offerdis.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>