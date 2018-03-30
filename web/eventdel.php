<?php 
	$pk_event_id=$_REQUEST["id"];
	require 'admindatabase.php';
		
	$obj1=new database();
	$res1=$obj1->getEventById($pk_event_id);
	
	while($row=mysql_fetch_assoc($res1))
	{
		$fk_venue_id=$row["fk_venue_id"];
		$event_image=$row["event_image"];
		$event_logo=$row["event_logo"];
	}
	
	$event_image="../".$event_image;
	unlink($event_image);
	
	$event_logo="../".$event_logo;
	unlink($event_logo);
	
	$obj2=new database();
	$res2=$obj1->venueDel($fk_venue_id);
	
	$obj3=new database();
	$res3=$obj3->bookDel($pk_event_id);
	
	$obj=new database();
	$res=$obj->eventDel($pk_event_id);
	
	
	
	if($res==1)
	{
		header('Location:pastevent.php');
	}
	else
	{
		echo "Event Not Deleted";
	}
	
?>