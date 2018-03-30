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
	public function signup($email,$pwd,$mobile,$name,$city,$type,$photo)
	{
		$con=database::connect();
		$res=mysql_query("insert into user_tbl values('$email','$pwd','$mobile','$name','$city','$type','$photo')",$con);
		return $res;
	database::disconnect();
	}
	
	public function getAllUsersAndCity()
	{		$con=database::connect();
			$res=mysql_query("select c.*,u.* from user_tbl as u,city_tbl as c where u.fk_city_id=c.pk_city_id",$con);
			return $res;
			database::disconnect();
	}
	public function getAllVenueAndCity()
	{		$con=database::connect();
			$res=mysql_query("select c.*,v.* from venue_tbl as v,city_tbl as c where v.fk_city_id=c.pk_city_id",$con);
			return $res;
			database::disconnect();
	}
	public function getAllUsers()
	{		$con=database::connect();
			$res=mysql_query("select * from user_tbl",$con);
			return $res;
			database::disconnect();
	}

	public function getAllEvents()
	{		$con=database::connect();
			$res=mysql_query("select * from event_tbl",$con);
			return $res;
			database::disconnect();
	}
	
	public function getAllEventByDate($d)
	{	
			$con=database::connect();
			$res=mysql_query("select c1.*,c.*,v.*,e.* from cat_tbl as c1,event_tbl as e,venue_tbl as v,city_tbl as c where event_date='$d' and e.fk_venue_id=v.pk_venue_id and e.fk_cat_id=c1.pk_cat_id and v.fk_city_id=c.pk_city_id",$con);
			return $res;
			database::disconnect();
	}
	
	public function getAllEventByBookDisApprove()
	{	
			$con=database::connect();
			$res=mysql_query("select c.*,v.*,e.* from event_tbl as e,venue_tbl as v,city_tbl as c where e.flag='0' and e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c.pk_city_id",$con);
			return $res;
			database::disconnect();
	}
	public function getAllEventByApprove()
	{	
			$con=database::connect();
			$res=mysql_query("select c.*,v.*,e.* from event_tbl as e,venue_tbl as v,city_tbl as c where e.flag='1' and e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c.pk_city_id",$con);
			return $res;
			database::disconnect();
	}
	
	public function getAllEventByBookDate($d)
	{	
			$con=database::connect();
			$res=mysql_query("select b.*,u.*,e.* from event_tbl as e,book_tbl as b,user_tbl as u where e.pk_event_id=b.fk_event_id and u.pk_email_id=b.fk_email_id and b.book_date='$d'",$con);
			return $res;
			database::disconnect();
	}
	public function getAllOffers()
	{		$con=database::connect();
			$res=mysql_query("select * from offer_tbl",$con);
			return $res;
			database::disconnect();
	}
	public function getAllImageByEvent()
	{		$con=database::connect();
			$res=mysql_query("select e.*,i.* from image_tbl as i,event_tbl as e where i.fk_event_id=e.pk_event_id",$con);
			return $res;
			database::disconnect();
	}
	public function getOfferById($pk_offer_id)
	{		$con=database::connect();
			$res=mysql_query("select * from offer_tbl where pk_offer_id='$pk_offer_id'",$con);
			return $res;
			database::disconnect();
	}

	public function getAllCity()
	{		$con=database::connect();
			$res=mysql_query("select * from city_tbl where flag=1",$con);
			return $res;
			database::disconnect();
	}
	public function getAllEventByFlag()
	{		$con=database::connect();
			$res=mysql_query("select e.*,v.*,c.*,c1.* from city_tbl as c1,event_tbl as e,cat_tbl as c,venue_tbl as v where e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c1.pk_city_id and e.fk_cat_id=c.pk_cat_id and e.flag=0",$con);
			return $res;
			database::disconnect();
	}
	public function getAllEventByDisApproved()
	{		$con=database::connect();
			$res=mysql_query("select e.*,v.*,c.*,c1.* from city_tbl as c1,event_tbl as e,cat_tbl as c,venue_tbl as v where e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c1.pk_city_id and e.fk_cat_id=c.pk_cat_id and e.flag=2",$con);
			return $res;
			database::disconnect();
	}
	public function getAllEventJoin()
	{		$con=database::connect();
			$res=mysql_query("select e.*,v.*,c.*,c1.* from city_tbl as c1,event_tbl as e,cat_tbl as c,venue_tbl as v where e.fk_venue_id=v.pk_venue_id and v.fk_city_id=c1.pk_city_id and e.fk_cat_id=c.pk_cat_id",$con);
			return $res;
			database::disconnect();
	}
	public function getEventById($pk_event_id)
	{		$con=database::connect();
			$res=mysql_query("select * from event_tbl where pk_event_id='$pk_event_id'",$con);
			return $res;
			database::disconnect();
	}
	public function getAllActiveEvent()
	{		$con=database::connect();
			$res=mysql_query("select * from event_tbl where flag=1",$con);
			return $res;
			database::disconnect();
	}
	public function getAllBook()
	{		$con=database::connect();
			$res=mysql_query("select * from book_tbl",$con);
			return $res;
			database::disconnect();
	}
	public function getAllBookByToday($d)
	{		$con=database::connect();
			$res=mysql_query("select * from book_tbl where book_date='$d'",$con);
			return $res;
			database::disconnect();
	}	
	
	public function getAllBookEvent($pk_event_id)
	{		$con=database::connect();
			$res=mysql_query("select e.*,b.*,u.* from event_tbl as e,book_tbl as b,user_tbl as u where e.pk_event_id=b.fk_event_id and b.fk_email_id=u.pk_email_id and b.fk_event_id='$pk_event_id'",$con);
			return $res;
			database::disconnect();
	}
	public function getAllBookEventByDate($d)
	{		$con=database::connect();
			$res=mysql_query("select e.*,b.*,u.* from event_tbl as e,book_tbl as b,user_tbl as u where e.pk_event_id=b.fk_event_id and b.fk_email_id=u.pk_email_id and b.book_date='$d'",$con);
			return $res;
			database::disconnect();
	}
	public function getAllCommentEvent($pk_event_id)
	{		$con=database::connect();
			$res=mysql_query("select e.*,c.*,u.* from event_tbl as e,comment_tbl as c,user_tbl as u where e.pk_event_id=c.fk_event_id and c.fk_email_id=u.pk_email_id and c.fk_event_id='$pk_event_id'",$con);
			return $res;
			database::disconnect();
	}

	public function getAllVenue()
	{		$con=database::connect();
			$res=mysql_query("select * from venue_tbl",$con);
			return $res;
			database::disconnect();
	}

	public function getAllPayment()
	{		$con=database::connect();
			$res=mysql_query("select * from payment_tbl",$con);
			return $res;
			database::disconnect();
	}
	public function addCat($cat)
	{		$con=database::connect();
			$res=mysql_query("insert into cat_tbl(cat_name,flag) values('$cat',1)",$con);
			return $res;
			database::disconnect();
	}
	public function addCity($city)
	{		$con=database::connect();
			$res=mysql_query("insert into city_tbl(city_name,flag) values('$city',1)",$con);
			return $res;
			database::disconnect();
	}
	public function addImage($image_id,$image_photo,$fk_event_id)
	{		$con=database::connect();
			$res=mysql_query("insert into image_tbl(image_id,image_photo,fk_event_id) values('$image_id','$image_photo','$fk_event_id')",$con);
			return $res;
			database::disconnect();
	}
	public function userdetail($email)
	{		$con=database::connect();
			$res=mysql_query("select * from user_tbl where pk_email_id='$email'",$con);
			return $res;
			database::disconnect();
	}
	public function addOffer($pk_offer_id,$fk_email_id,$offer_price,$offer_promocode,$offer_photo,$fk_event_id,$offer_name)
	{		$con=database::connect();
			$res=mysql_query("insert into offer_tbl values('$pk_offer_id','$fk_email_id','$offer_price','$offer_promocode','$offer_photo','$fk_event_id','$offer_name')",$con);
			return $res;
			database::disconnect();
	}
	public function catDel($pk_cat_id)
	{		$con=database::connect();
			$res=mysql_query("update cat_tbl set flag=0 where pk_cat_id='$pk_cat_id'",$con);
			return $res;
			database::disconnect();
	}
	public function cityDel($pk_city_id)
	{		$con=database::connect();
			$res=mysql_query("update city_tbl set flag=0 where pk_city_id='$pk_city_id'",$con);
			return $res;
			database::disconnect();
	}
	public function imageDel($image_id)
	{		$con=database::connect();
			$res=mysql_query("delete from image_tbl where image_id='$image_id'",$con);
			return $res;
			database::disconnect();
	}
	public function eventDel($pk_event_id)
	{		$con=database::connect();
			$res=mysql_query("delete from event_tbl where pk_event_id='$pk_event_id'",$con);
			return $res;
			database::disconnect();
	}
	public function bookDel($fk_event_id)
	{		$con=database::connect();
			$res=mysql_query("delete from book_tbl where fk_event_id='$fk_event_id'",$con);
			return $res;
			database::disconnect();
	}
	public function venueDel($pk_venue_id)
	{		$con=database::connect();
			$res=mysql_query("delete from venue_tbl where pk_venue_id='$pk_venue_id'",$con);
			return $res;
			database::disconnect();
	}
	
	public function offerDel($pk_offer_id)
	{		$con=database::connect();
			$res=mysql_query("delete from offer_tbl where pk_offer_id='$pk_offer_id'",$con);
			return $res;
			database::disconnect();
	}
	public function userDel($pk_email_id)
	{		$con=database::connect();
			$res=mysql_query("delete from user_tbl where pk_email_id='$pk_email_id'",$con);
			return $res;
			database::disconnect();
	}
	
	public function eventApprove($pk_event_id)
	{		$con=database::connect();
			$res=mysql_query("update event_tbl set flag='1' where pk_event_id='$pk_event_id'",$con);
			return $res;
			database::disconnect();
	}

	public function eventDisApprove($pk_event_id)
	{		$con=database::connect();
			$res=mysql_query("update event_tbl set flag='2' where pk_event_id='$pk_event_id'",$con);
			return $res;
			database::disconnect();
	}

	public function catEdit($pk_cat_id,$cat_name)
	{		$con=database::connect();
			$res=mysql_query("update cat_tbl set cat_name='$cat_name' where pk_cat_id='$pk_cat_id'",$con);
			return $res;
			database::disconnect();
	}
	
	public function catEdit1($pk_cat_id)
	{		$con=database::connect();
			$res=mysql_query("select * from cat_tbl where pk_cat_id='$pk_cat_id'",$con);
			return $res;
			database::disconnect();
	}
	public function cityEdit($pk_city_id,$city_name)
	{		$con=database::connect();
			$res=mysql_query("update city_tbl set city_name='$city_name' where pk_city_id='$pk_city_id'",$con);
			return $res;
			database::disconnect();
	}
	
	public function cityEdit1($pk_city_id)
	{		$con=database::connect();
			$res=mysql_query("select * from city_tbl where pk_city_id='$pk_city_id'",$con);
			return $res;
			database::disconnect();
	}
	
		
	public function offerEdit($pk_offer_id,$offer_price,
	$offer_promocode,$fk_event_id,$offer_name)
	{		$con=database::connect();
			$res=mysql_query("update offer_tbl set offer_price='$offer_price',offer_name='$offer_name',offer_promocode='$offer_promocode',fk_event_id='$fk_event_id' where pk_offer_id='$pk_offer_id'",$con);
			return $res;
			database::disconnect();
	}
	
	public function offerEdit1($pk_offer_id)
	{		$con=database::connect();
			$res=mysql_query("select * from offer_tbl where pk_offer_id='$pk_offer_id'",$con);
			return $res;
			database::disconnect();
	}
	public function getAllWallet()
	{		$con=database::connect();
			$res=mysql_query("select * from wallet_tbl",$con);
			return $res;
			database::disconnect();
	}
	public function getAllCat()
	{		$con=database::connect();
			$res=mysql_query("select * from cat_tbl where flag=1",$con);
			return $res;
			database::disconnect();
	}

}
?>