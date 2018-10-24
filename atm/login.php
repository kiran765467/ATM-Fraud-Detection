
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,intial-scale=1">
<title>Grid</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="button.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	<div col-md-3 offset-md-4>
	<?php
	if(isset($_POST['login']))
	{
	require('textlocal.class.php');
	require('credentila.php');
	$textlocal=new Textlocal(false,false,API_KEY);
	$numbers=array(MOBILE);
	$sender='TXTLCL';
	$otp=mt_rand(10000,99999);
	$message="Hello" . $_POST ['uname']."  This is your otp" . $otp;
	
	try
	{
		$result=$textlocal->sendSms($numbers,$message,$sender);
		setcookie('otp',$otp);
		echo"OTP sent";
	}
	catch(Exception $e)
	{
		die('Error:' .$e->getMessage());
	}
	}
?>								
	</div>
		<div class="col-md-3 offset-md-4">
				<h1>Signup</h1>
				<br/>

				<form  method="post">
					<div class="form-group">
						<label fpr="InputUsername">Username</label>login
						<input class="form-control" placeholder="Login Username"  type="text" name="uname" required>
					</div>	
					<div class="form-group">
						<label fpr="Password">Phone</label>
						<input class="form-control" placeholder="Login Password" type="text" name="mobile" required>
					</div>
					
					<div class="col-md-3 offset-md-4" >
						<button type="submit" name="login" class="login" >Sent otp</button>
					</div>
				
					<div class="form-group">
						<label fpr="OTP">OTP</label>
						<input class="form-control" placeholder="Enter OTP" type="text" name="otp">
					</div>					
					</br>
					<div class="col-md-3 offset-md-4" >
						<button type="submit" class="verify" name="verify" >verify</button>
					</div>
				</form>
			</div>
	</div>	
</body>
</html>
