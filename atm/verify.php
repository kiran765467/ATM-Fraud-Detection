<?php 
include('conn.php');
session_start();
error_reporting(0);
if(!$_SESSION['id']){
    echo "<script>window.open('verify.php','_self');</script>";
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
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> OTP Verification 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:0px 0px; ">
								<div class="well well-sm" style="border-radius:0px;">
								<hr/>
								    
									<div class="col-md-offset-1">
									
									<h5><input type="text" required="" name="otpvalue"  placeholder="Enter the OTP..." class="form-control"/><br/></h5>
									</div>
									<div class="col-md-offset-4">
		                              <button type="submit" name="sub"  class="btn btn-primary btn-custom"><span class="glyphicon glyphicon-thumbs-up"></span> Verify </button>
  									</div>
								</div>
							</div>
                        </div>
                      <?php
					  	//
								
                          if(isset($_POST['sub']))
                            {
								$rno=$_SESSION['otp'];
								$urno=$_POST['otpvalue'];
								if(!strcmp($rno,$urno))
								{
									$id=$_SESSION[id];
									//$query_id ="select * from user where bankcode='$id'";
									
							//$rup1=$_POST['amt'];
							$id=$_SESSION[id];
							$q=mysqli_query($con,"select * from user  where id='$id'");
							$u = mysqli_fetch_array($q);
							
							$a=mysqli_query($con,"select bankcode as max from user where id='$id'");
							//$w=mysqli_query($con,"select id  from tran  where id='$id'");
							$z=mysqli_fetch_array($a);
							$t= $z['max'];
						//	session_unset();
							$_SESSION['id1'] = $t['id'];
							$_SESSION['name1']=$t['name'];
                //$_SESSION['id1'] = $run_id2['name'];
/*							
                $query_id ="select * from user where bankcode='$id'";
                $run_id = mysqli_query($con,$query_id);
                $run_id2 = mysqli_fetch_array($run_id);
				 session_regenerate_id(FALSE);
				//session_unset();
                $_SESSION['id1'] = $run_id2['id'];
                $_SESSION['name1'] = $run_id2['name'];*/
								echo "<script>window.open('home.php','_self');</script>";
								}
								
								else
								{
									echo "<script>alert('WRONG OTP');</script>";
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