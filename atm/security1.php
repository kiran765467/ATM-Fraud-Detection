<?php 
include('conn.php');
session_start();
if(!$_SESSION['id1']){
    echo "<script>window.open('index.php','_self');</script>";
}else{
	
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
            </br>
			</br>
			</br>
			<div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-10px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> Security Pannel
                            </div>
                            
                            <div class="panel-body" style="margin:-20px 0px; ">
							<div class="well well-sm" style="border-radius:0px;">
								<div class="form-group">
                                    <hr/>
									<h4 align="center">Please Enter Your **Security PIN**  </h4>
									<hr/>
								</div>
							</div>
							<input type="text" name="pass" class="form-control" placeholder="Secret PIN.." required=""/>
							<br/>
								
                            </div>
                            <div class="panel-footer" align="center">
							<button type="submit" name="sub" class="btn btn-primary btn-custom"><span class="glyphicon glyphicon-thumbs-up"></span> Check</button>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['sub']))
                            {
								$id=$_SESSION['id1'];
								$x=$_POST['pass'];
							/*
								$pass = mysqli_real_escape_string($con, $_POST['pass']);
								$query ="select * from user where pass='$pass' ";*/
								$a=mysqli_query($con,"select secure as max from user where id='$id'");
								$z=mysqli_fetch_array($a);
								$t=$z['max'];
								if($t==$x)
								{
									//echo "right user name password";
								$_SESSION['id2'] = $t['id'];
								echo "<script>window.open('security.php?r','_self');</script>";

								}
								else
								{
									if(isset($_SESSION['count']))
										{ 
											//$id1=$_SESSION['id1'];
											 $_SESSION['count'];
											$_SESSION['count']++;
											if($_SESSION['count']==2)
											{
												
												
												mysqli_query($con,"update user set pass=2 where id='$id'");
												$_SESSION['count']=0;
												//echo "<script>alert('** Your Account is Blocked**')</script>";
												echo "<script>window.open('splash3.php?r','_self');</script>";
											}
											else
											{
												echo "<script>alert('** Please Enter Correct Security PIN**')</script>";
											}
		
										}
										else
										{
											$_SESSION['coun']=1;
											echo"Session Doesnot Exit"; 
										}	

									}   
			                }
                            
                        ?>
                    </form>	
                </div>
            </div>
			</br>
			</br>
			</br>
			</br>
			</br>
        </div>
		
	</body>
</html>
<?php } ?>