<?php 

	require 'admindatabase.php';
	$pk_offer_id=$_POST["txtofferid"];
	$offer_name=$_POST["txtoffername"];
	$offer_price=$_POST["txtofferprice"];
	$offer_promocode=$_POST["txtofferpromocode"];
	$fk_event_id=$_POST["txteventname"];
																
	$obj=new Database();
	$res=$obj->OfferEdit($pk_offer_id,$offer_price,
	$offer_promocode,$fk_event_id,$offer_name);
																
	if($res==1)
	{
		header('location:offerdis.php');
	}

?>