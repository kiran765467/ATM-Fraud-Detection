<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
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
            <div class="row">
			<br/>
			<br/>
			<br/>
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel" style="border-radius:0px; box-shadow:2px 2px 4px 0px;">
                            <div class="panel-heading" style="font-size:23px; margin-bottom:-10px; text-align:center;">
                                <i class="glyphicon glyphicon-copy"></i> OTP Pannel
                            </div>
                            <hr/>
                            <div class="panel-body" style="margin:-20px 0px; ">
                                
								<div class="well well-sm" style="border-radius:0px;">
                                
								<?php
									   
									$id=$_SESSION['id'];
									$cn=mysqli_query($con,"select * from user where id='$id'");
									$n = mysqli_fetch_array($cn);                                    
									?>
									<hr/>
                                    <h4 align="center">Click the below button to get the OTP  </h4>
									<hr/>
								</div>
                            </div>
                            <div class="panel-footer" align="center">
                             
                                <button type="submit" name="sub" class="btn btn-primary btn-custom">
								<span class="glyphicon glyphicon-thumbs-up"></span> Request </button>
                            </div>
                        </div>
                        <?php
                            //1st starts$id=$_SESSION['id'];
							
							if(isset($_POST['sub']))
							{
							//$rup1=$_POST['amt'];
							$q=mysqli_query($con,"select * from user  where id='$id'");
							$u = mysqli_fetch_array($q);
							
							$a=mysqli_query($con,"select phone as max from user where id='$id'");
							//$w=mysqli_query($con,"select id  from tran  where id='$id'");
							$z=mysqli_fetch_array($a);
							$t= $z['max'];
						//Your authentication key
							$authKey = "243366AXwYZgDV05bc848fc";
//Multiple mobiles numbers separated by comma
							$mobileNumber = $t;
//Sender ID,While using route4 sender id should be 6 characters long.
							$senderId = "ABCDEF";
//Your message to send, Add URL encoding here.
							$rndno=rand(1000, 9999);
							$message = urlencode("otp number.".$rndno);
//Define route 
							$route = "route=4";
//Prepare you post parameters
							$postData = array(
							'authkey' => $authKey,
							'mobiles' => $mobileNumber,
							'message' => $message,
							'sender' => $senderId,
							'route' => $route
							);
//API URL

//$url="http://control.msg91.com/api/sendotp.php?authkey=$authKey&sender=$senderId&mobile=$mobileNumber&message=$rndno";

// init the resource
						$curl = curl_init();
						curl_setopt_array($curl, array(
						CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?country=91&sender=$senderId&route=4&mobiles=$mobileNumber&authkey=$authKey&message=$message",
						CURLOPT_RETURNTRANSFER => true,
						CURLOPT_ENCODING => "",
						CURLOPT_MAXREDIRS => 10,
						CURLOPT_TIMEOUT => 30,
						CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						CURLOPT_CUSTOMREQUEST => "GET",
						CURLOPT_SSL_VERIFYHOST => 0,
						CURLOPT_SSL_VERIFYPEER => 0,
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);

						if ($err)
						{
							echo "cURL Error #:" . $err;
						} 
						else 
						{
						//  echo $response;
						}
						$_SESSION['phone']=$t;
						$_SESSION['otp']=$rndno;
						echo "<script>window.open('verify.php','_self');</script>"; 

						}
							
                            //amt zero
                        ?>
                    </form>
			
                </div>
            </div>
			<br/>
			<br/>
			
        </div>
		
	</body>
</html>
<?php } ?>