<?php
class Database
{


	/*private static $host='priyansh.db.9462939.hostedresource.com';
	private static $uname='priyansh';
	private static $pwd='Demo9@1212';
	private static $con=NULL;*/
	
	private static $host='localhost';
	private static $uname='root';
	private static $pwd='';
	private static $con=NULL;
	
	
	
	public static function connect()
	{
		self::$con=mysql_connect(self::$host,self::$uname,self::$pwd);
		mysql_select_db('cityhub',self::$con);
		return self::$con;
	}
	
	public function getimage()
	{
		$con=database::connect();
		$res=mysql_query("select * from image_tbl",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function checkpromo($promo)
	{
		$con=database::connect();
		$res=mysql_query("select * from offer_tbl where offer_promocode='$promo'",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function addpayment($email,$cardnumber,$date,$cvv)
	{
		$con=database::connect();
		$res=mysql_query("insert into payment_tbl values('Null','$email','$cardnumber','$date','$cvv')",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function bookticket($email,$event_id,$no,$amnt1,$dis,$date1)
	{
		$con=database::connect();
		$res=mysql_query("insert into book_tbl values('Null','$email','$event_id','$no','$amnt1','$dis','$date1')",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function getWalletDetail($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from wallet_tbl where fk_email_id='$email'",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function signupcheck($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
		return $res;
	database::disconnect();
	
	}
	public function profiledetail($email)
	{
		$con=database::connect();
		$res=mysql_query("select u.*,c.* from user_tbl as u,city_tbl as c where u.pk_email_id='$email' and u.fk_city_id=c.pk_city_id",$con);
		return $res;
	database::disconnect();
	
	}
	public function editprofile($email,$user_mobile_no,$user_name,$city,$photo)
	{
		$con=database::connect();
		$res=mysql_query("update user_tbl set user_name='$user_name',user_mobile_no='$user_mobile_no',user_photo='$photo',fk_city_id='$city' where pk_email_id='$email'",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function getpastbookevent($email)
	{
		$con=database::connect();
		$res=mysql_query("select b.*,e.*,v.*,c.* from book_tbl as b,event_tbl as e,venue_tbl as v,city_tbl as c  where b.fk_email_id='$email' and b.fk_event_id=e.pk_event_id and v.pk_venue_id=e.fk_venue_id and v.fk_city_id=c.pk_city_id ",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function getCatByEvent($cat_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from event_tbl where fk_cat_id=$cat_id and flag=1 ORDER BY pk_event_id DESC;",$con);
		return $res;
	database::disconnect();
	
	}
	public function insertcomment($event_id,$email,$comment,$date)
	{
		$con=database::connect();
		$res=mysql_query("insert into comment_tbl values('null','$event_id','$email','$comment','$date')",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function maindis()
	{
		$con=database::connect();
		$res=mysql_query("select e.*,c.city_name from event_tbl as e,city_tbl as c,venue_tbl as v where e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c.pk_city_id and e.flag=1 ORDER BY pk_event_id DESC;",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function citywisedis($city)
	{
		$con=database::connect();
		$res=mysql_query("select e.*,c.* from event_tbl as e,city_tbl as c,venue_tbl as v where e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c.pk_city_id and c.pk_city_id='$city' and e.flag=1 ORDER BY pk_event_id DESC;",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function catdis()
	{
		$con=database::connect();
		$res=mysql_query("select * from cat_tbl where flag=1",$con);
		return $res;
	database::disconnect();
	
	}
	public function eventbyiddis($id)
	{
		$con=database::connect();
		$res=mysql_query("select e.*,v.*,c.* from event_tbl as e,venue_tbl as v,city_tbl as c where pk_event_id='$id' and v.pk_venue_id=e.fk_venue_id and v.fk_city_id=c.pk_city_id and e.flag=1 ",$con);
		return $res;
	database::disconnect();
	
	}
	public function updatevenue($venue_id,$venue_name,$venue_add,$pincode,$city_id)
	{
		$con=database::connect();
		$res=mysql_query("update venue_tbl set venue_name='$venue_name',venue_address='$venue_add',pincode='$pincode',fk_city_id='$city_id' where pk_venue_id='$venue_id' ",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function updateevent($event_id,$event_des,$event_name,$event_date,$event_time,
		$event_ticket,$event_price)
	{
		$con=database::connect();
		$res=mysql_query("update event_tbl set event_name='$event_name',
			event_date='$event_date',event_time='$event_time',
			event_ticket='$event_ticket',event_price='$event_price' where pk_event_id='$event_id'",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function getAllUserBookById($id)
	{
		$con=database::connect();
		$res=mysql_query("select b.*,u.* from book_tbl as b,user_tbl as u where fk_event_id='$id' and u.pk_email_id=b.fk_email_id",$con);
		return $res;
		database::disconnect();
	}
	
	
	public function getEventByUser($email)
	{
		$con=database::connect();
		$res=mysql_query("select e.*,v.*,c.* from event_tbl as e,venue_tbl as v,city_tbl as c where e.fk_email_id='$email'  and v.pk_venue_id=e.fk_venue_id and v.fk_city_id=c.pk_city_id and e.flag=1 ",$con);
		return $res;
	database::disconnect();
	
	}
	
	public function getBookcntByEvent($event_id)
	{
		$con=database::connect();
		$res=mysql_query("select sum(ticket_cnt)'cnt' from book_tbl where fk_event_id='$event_id' group by(fk_event_id) ",$con);
		return $res;
	database::disconnect();
	
	}
	public function checkadmin($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from event_tbl where fk_email_id='$email'",$con);
		return $res;
	database::disconnect();
	}
	
	public function offerdis()
	{
		$con=database::connect();
		$res=mysql_query("select * from offer_tbl",$con);
		return $res;
	database::disconnect();
	}
	public function getuserdetail($email)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
		return $res;
	database::disconnect();
	}
	public function getallvenue()
	{
		$con=database::connect();
		$res=mysql_query("select * from venue_tbl ORDER BY pk_venue_id DESC;",$con);
		return $res;
	database::disconnect();
	}
	
	public function createvenue($venue_name,$venue_add,$city,$pincode)
	{	$venue_id="null";
		$con=database::connect();
		$res=mysql_query("insert into venue_tbl values('$venue_id','$venue_name','$venue_add','$city','$pincode')",$con);
		return $res;
	database::disconnect();
	}
	
	public function changePassword($email,$pass)
	{		$con=database::connect();
			$res=mysql_query("update user_tbl set user_password='$pass' where pk_email_id='$email' ",$con);
			return $res;
			database::disconnect();
	}
	
	public function createevent($pk_event_id,$event_name,$event_logo,$event_image,
								$event_des,$fk_venue_id,$event_date,
								$event_time,$event_ticket,$event_price,$fk_cat_id,
								$fk_email_id,$fk_offer_id,$event_cnt,$flag,$event_last_date)
	{
		$con=database::connect();
		$res=mysql_query("insert into event_tbl values('$pk_event_id','$event_name','$event_logo','$event_image',
								'$event_des','$fk_venue_id','$event_date',
								'$event_time','$event_ticket','$event_price','$fk_cat_id',
								'$fk_email_id','$fk_offer_id','$event_cnt','$flag','$event_last_date')",$con);		
		return $res;
	database::disconnect();
	}
	
	
	public function getAllOffer()
	{
		$con=database::connect();
		$res=mysql_query("select * from offer_tbl",$con);
		return $res;
	database::disconnect();
	}
	public function getAllCity()
	{
		$con=database::connect();
		$res=mysql_query("select * from city_tbl",$con);
		return $res;
	database::disconnect();
	}
	
	public function getAllCat()
	{
		$con=database::connect();
		$res=mysql_query("select * from cat_tbl",$con);
		return $res;
	database::disconnect();
	}
	
	public function getcomment($event_id)
	{
		$con=database::connect();
		$res=mysql_query("select c.*,u.* from comment_tbl as c,user_tbl as u where c.fk_event_id='$event_id' and c.fk_email_id=u.pk_email_id ",$con);
		return $res;
	database::disconnect();
	}
	public function pageview($event_id)
	{
		$con=database::connect();
		$res=mysql_query("update event_tbl set event_cnt=event_cnt+1 where pk_event_id='$event_id' ",$con);
		return $res;
	database::disconnect();
	}
	public function addlike($event_id)
	{
		$con=database::connect();
		$res=mysql_query("update like_tbl set likecnt=likecnt+1 where fk_event_id='$event_id' ",$con);
		return $res;
	database::disconnect();
	}
	public function adddislike($event_id)
	{
		$con=database::connect();
		$res=mysql_query("update like_tbl set dislikecnt=dislikecnt+1 where fk_event_id='$event_id' ",$con);
		return $res;
	database::disconnect();
	}
	public function likedetail($event_id)
	{
		$con=database::connect();
		$res=mysql_query("select * from like_tbl where fk_event_id='$event_id' ",$con);
		return $res;
	database::disconnect();
	}
	
	public function signup($email,$pwd,$mobile,$name,$city,$type,$photo)
	{
		$con=database::connect();
		$res=mysql_query("insert into user_tbl values('$email','$pwd','$mobile','$name','$city','$type','$photo')",$con);
		return $res;
	database::disconnect();
	}
	public function login($email,$password)
	{
		$con=database::connect();
		$res=mysql_query("select * from user_tbl where pk_email_id='$email' and user_password='$password'",$con);
		return $res;
	database::disconnect();
	}
	public static function disconnect()
	{
		mysql_close(self::$con);
		self::$con=NULL;
	}
}
?>