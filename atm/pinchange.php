<?php 
include('conn.php');
session_start();
if(!$_SESSION['id1']){
    echo "<script>window.open('index.php','_self');</script>";
	session_destroy();
}else{
//error_reporting(0);
?>
<!DOCTYPE html>
<html>		    
	<head>
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Atm System</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/custom.css"/>
		<script src="js/jquery_library.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
		
		</style>
	</head>
	<body>
	   <nav class="navbar navbar-default navbar-fixed-top" style="background:">
			<div class="container">
				<div class="navbar-header">
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					  <a class="navbar-brand" href="home.php"><strong><i class="glyphicon glyphicon-list-alt"></i> UNC Bank (ATM)</strong></a>
     			</div>
                <div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php"><span class='glyphicon glyphicon-log-out'></span>  Logout</a></li>
                    </ul>
			</div>
		</nav>	
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
			<br/>
			<br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="get" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> ATM Machine 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
								<div class="well well-sm" style="border-radius:0px;">
								    <h4><b><h4>Pin Change </h4></b></h4>
								    <hr/>
								    
									<div class="col-md-offset-1">
									
										<h5>Pin :<input type="text" name="pin" required="" placeholder="Enter  Pin..." class="form-control"/><br/></h5>
										<h5>Conform Pin :<input type="text" required="" name="cpin" required="" placeholder="Conform Pin..." class="form-control"/><br/></h5>
									</div>
									<div class="col-md-offset-4">
		                              <button type="submit" name="sub"  class="btn btn-primary btn-custom"><span class="glyphicon glyphicon-thumbs-up"></span> Change </button>
  									</div>
								</div>
							</div>
                        </div>
                      <?php
					  	//
								
                          if(isset($_GET['sub']))
                            {//1st starts
                                $r1=$_GET['pin'];
								$r2=$_GET['cpin'];
								$id=$_SESSION['id'];
							
								if($r1==$r2)
								{
									if($r1>1000 && $r1<=9999)
									{
										
									mysqli_query($con,"update user set pass='$r1' where id='$id'");
										
								echo "<script>window.open('splash2.php?r=$rup','_self');</script>";

	
									//echo "<script>alert('PIN and Conform PIN is mis-matching');</script>";
									}
									else
									{
										echo "<script>alert('minimu length required');</script>";
									}
								}
								else
								{								
									echo "<script>alert('PIN and Conform PIN is mis-matching');</script>";
									
				    		//mysqli_query($con,"update user set pass='$r1' where id='$id'");
	                    		
								}
							}
                           
                        ?>
  
						
					</form>	
                </div>
            </div>
			<br/>
			<br/>
        </div>
		 
	</body>
</html>
<?php  } ?>