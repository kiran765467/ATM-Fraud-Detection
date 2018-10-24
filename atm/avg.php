<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
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
        <!--
            ====================
                Main Section Starts
            ====================
        -->
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
			<br/>
            <div class="row">
			
                <div class="col-md-4 col-md-offset-4">
            
					<form method="post" action="">
					<br/>
					<div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-20px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> ATM Machine 
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
                                <div class="well well-sm" style="border-radius:0px;">
                                    <?php
									   
									$id=$_SESSION['id'];
									$cn=mysqli_query($con,"select * from tran where uid='$id'");
									$n = mysqli_fetch_array($cn);                                    
									?>
                                    <hr/>
									
									<hr/>
								</div>
                            </div>
                            <div class="panel-footer" align="center">
							
                                <button type="submit" name="sub" class="btn btn-primary btn-custom"><span class="glyphicon glyphicon-thumbs-up"></span> Cashout </button>
                            </div>
                        </div>
                        
							<?php
								$id=$_SESSION['id'];
							if(isset($_POST['sub']))
							{
							//$rup1=$_POST['amt'];
							$q=mysqli_query($con,"select * from tran  where uid='$id'");
							$u = mysqli_fetch_array($q);
							
							$a=mysqli_query($con,"select avg(amt) as max from tran where uid='$id'");
							$w=mysqli_query($con,"select uid  from tran  where uid='$id'");
							$z=mysqli_fetch_array($a);
							echo round($z['max']);
							$t=$z['max'];
						
$result = mysqli_query($con,"select count(amt) FROM tran where uid='$id'");
$row = mysqli_fetch_array($result);

$total = $row[0];
echo "Total rows: " . $total;
if($total>=10)
{
	echo "yes";
}
else
{
echo"no";	
}


							}
							?>
							
							
                    </form>	
                </div>
            </div>
			<br/>
			<br/>
			<br/>
			<br/>
        </div>
		
	</body>
</html>
<?php } ?>