<?php 
include('connection.php');
session_start();
if(!$_SESSION['id1']){
    echo "<script>window.open('index.php','_self');</script>";
	session_destroy();
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
								
								    <h4><b>Welcome Mr. <?php echo ucwords($_SESSION['name']);?></b></h4>
								    <hr/>
								    
									<div class="col-md-offset-3">
											<h4>Select your choice </h4>								
										<h5> <a href="Enquiry.php" type="submit" name="1" class="btn btn-default ">Balance Enquiry</a></Button></h5>
										<h5> <a href="Withdraw.php"type="submit" name="2" class="btn btn-default " >Withdraw Money</a></h5>
										<h5> <a href="pinchange.php" type="submit" name="3"class="btn btn-default">Pin Change</a></h5>
										<h5> <a href="check.php" type="submit" name="3"class="btn btn-default">Mini Statement</a></h5>
									</div>
								</div>
							</div>
                        </div>
						
					</form>	
                </div>
            </div>
        </div>
		 
	</body>
</html>
<?php  /* */} ?>