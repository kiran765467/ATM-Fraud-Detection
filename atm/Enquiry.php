<?php 
include('conn.php');
session_start();
error_reporting(0);
if(!$_SESSION['id1']){
    echo "<script>window.open('index.php','_self');</script>";
	session_destroy();
}else{
?>
<!DOCTYPE html>
<html>		    
	<head>
        <!--
            ==============================================
                Mobile + Desktop + Browser Responsive Tags
            ==============================================
        -->
        <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bank Atm System</title>
        <!--
            ============================
                Bootstrap + Custom + Css
            ============================
        -->
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" href="css/custom.css"/>
		<!--
            ============================
                Bootstrap + Custom + Jquery
            ============================
        -->
		<script src="js/jquery_library.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
	   <!--
            ====================
                Navbar Starts
            ====================
        -->
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
        <!--
            ====================
                Main Section Starts
            ====================
        -->
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
			<br/>
			<br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> ATM Machine 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
								<div class="well well-sm" style="border-radius:0px;">
								   <h3 align="center">Your Account Balance </h3>
									<?php
									$id=$_SESSION['id'];
									$amt=mysqli_fetch_array(mysqli_query($con,"select * from user where id='$id'"));
									$a=mysqli_query($con,"select name from user where id='$id'");
									$z=mysqli_fetch_array($a);
									$t= $z['max'];
									echo $t;
									?>
									<hr>
									<h4 align="center">{ Rs. <?php echo $amt['amt']; ?> }</h4>
									<hr>								</div>
							</div>
							
						</div>
					</form>	
				</div>
				
			</div>
			<br/>
			<br/>
			<br/>
		</div>
        
	</body>
</html>
<?php } ?>