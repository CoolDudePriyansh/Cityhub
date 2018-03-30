
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
       <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-3" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
	  
    </div>
	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-3">
	<ul class="nav navbar-nav">
	<?php
		$obj=new database();
		$res=$obj->catdis();
		while($row=mysql_fetch_assoc($res))
		{
			echo '<li><a href="catdis.php?id='.$row["pk_cat_id"].'"><font size="4" color="white">'.$row["cat_name"].'</font></a></li>';
		}
	?>
		
	</ul>
        

      
    </div>  
    
  </div><!-- /.container-fluid -->
</nav>