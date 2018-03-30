<nav class="navbar navbar-default ">
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
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style=" margin-top:20px;">
		 <ul class="nav navbar-nav" >
        <li ><a href="index.php"  ><font size="15" color="red">CityHub</font></a> </li>
		</ul>
		<form class="navbar-form navbar-left" style="margin-left:100px;" method="post" >
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search By Event Id" id="test" name="search">
        </div>
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
	  <li style="margin-top:-12px;" ><a href="login.php?id=0"><button type="button" class="btn btn-default navbar-btn">Login</button></a></li>
      <li style="margin-top:-12px;"><a href="create.php"><button type="button" class="btn btn-danger navbar-btn">Create An Event</button></a></li>
	  
	  
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