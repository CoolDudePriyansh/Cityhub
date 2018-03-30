<nav class="navbar navbar-default  ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      

	  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <img src="logo.png" height="100" width="150"></img>
    </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
	<?php 	
		$email=$_SESSION["email"];
		$obj=new database();
		$res=$obj->getuserdetail($email);
	

	?>	<ul class="nav navbar-nav" style=" margin-top:20px;" >
        <li ><a href="index.php"  ><font size="15" color="red">CityHub</font></a> </li>
		</ul>
		<form class="navbar-form navbar-left" style="margin-left:100px;" method="post" >
        <div class="form-group" style=" margin-top:20px;">
          <input type="text" class="form-control" placeholder="Search By Event Id" id="test" name="search">
        </div>
        <button type="submit" class="btn btn-default" name="submit" style=" margin-top:20px;">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right" style=" margin-top:5px;">
		
        <li ><a href="create.php"><button type="button" class="btn btn-danger navbar-btn" >Create An Event</button></a></li>
		<?php 
   $obj=new database();
		$res1=$obj->checkadmin($email);
		$cnt=mysql_num_rows($res1);
		if($cnt>=1)
		{
			echo '  <li ><a href="dashboard.php"><button type="button" class="btn btn-info navbar-btn">Dashboard</button></a></li>';
		}
   
   ?>
       <li  class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="<?php 
			while($row=mysql_fetch_assoc($res))
			{
				echo $row["user_photo"];
				$name=$row["user_name"];
			}
		
		?> "height=40px width=40px   class="img-circle" style="margin-top:5px;"/><font size="4" color="red" ><?php echo $name; ?></font> <span class="caret"></span></a>
		
		 <ul class="dropdown-menu">
            <li><a href="changepro.php">Change Your Profile</a></li> 
			<li><a href="changepass.php">Change Your Password</a></li>
			<li><a href="pasteventuser.php">Past Event</a></li>
            <li><a href="logout.php">Logout</a></li> 
			
          </ul>
        </li>
      </ul>
   
   </div>
  </div><!-- /.container-fluid -->
</nav>

<?php 
if(isset($_POST["submit"]))
{
	$id=$_POST["search"];
	header('Location:viewevent.php?id='.$id.'');
}

?>