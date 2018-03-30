<?php 
include 'database.php';
$obj=new database();
$event_id=$_REQUEST["id"];
$res=$obj->adddislike($event_id);
if($res==1)
{
	header('Location:viewevent.php?id='.$event_id.'');
}
else
{
	echo "error";
}

?>