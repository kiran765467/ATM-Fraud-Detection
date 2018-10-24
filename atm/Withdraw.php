<?php 
include('conn.php');
session_start();
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
                                        $amt=mysqli_fetch_array(mysqli_query($con,"select * from user where id='$id'"));
                                    ?>
                                    <hr/>
									<h4 align="center">Account Balance : Rs. <?php echo $amt['amt']; ?>  </h4>
									<hr/>
								</div>
                            </div>
                            <div class="panel-footer" align="center">
                                <input type="text" name="amt" required="" placeholder="Enter Amount..." class="form-control"/><br/>
                                <button type="submit" name="sub" class="btn btn-primary btn-custom"><span class="glyphicon glyphicon-thumbs-up"></span> Cashout </button>
                            </div>
                        </div>
                        <?php
                            if(isset($_POST['sub']))
                            {//1st starts
                                $rup=$_POST['amt'];
								$_SESSION['count'] = 0;
								$counter = $_SESSION['count']; 
								$counter = (int)$counter;
								
								/* Counting no of rows*/
								$result = mysqli_query($con,"select count(amt) FROM tran where uid='$id'");
								$row = mysqli_fetch_array($result);
								$total = $row[0];
								
								/* Taking average of previous transactions*/
								$q=mysqli_query($con,"select * from tran  where uid='$id'");
								$u = mysqli_fetch_array($q);
								$a=mysqli_query($con,"select avg(amt) as max from tran where uid='$id'");
								//$w=mysqli_query($con,"select uid  from tran  where uid='$id'");
								$z=mysqli_fetch_array($a);
								$t=round($z['max']);
								
								/* proces*/
                               
							   if($amt['g_amt']==0){
                                    echo "<script>alert('Please Recharge your Account! Thank you');</script>";
                                }
                                else if($rup<100 || $rup>49000)
                                {
									echo "<script>alert('You Can withdraw mininum 100 and maximum 49000');</script>";
                                }
								else if($rup>$t && $total>=10)
								{
									
								echo "<script>window.open('security1.php?r','_self');</script>";
								}
                                else if($rup<=$amt['g_amt']){
                                        $amnt = $amt['g_amt'];
                                    $amnt = $amnt - $rup;
                                    $id=$_SESSION['id'];
                                    $date = date('d/M/y h:i a');
                                    $t_date = date('M/y');
                                    mysqli_query($con,"update user set amt='$amnt',lt='$date' where id='$id'");
                                    mysqli_query($con,"insert into tran (uid,dte,amt,month) values('$id','$date','$rup','$t_date')");                                   
                                    echo "<script>window.open('splash.php?r','_self');</script>";
                                }
								else
								{
				    				echo "<script>alert('Withdraw amount is greater then your balance.');</script>";
                                }
                            }
                            //amt zero
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