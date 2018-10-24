<?php
session_start();
error_reporting(0);
{?>
<!DOCTYPE html>
<html>
<title>Form</title>
<body>
<form action="" method="post">
<input type="text" name="otpvalue"/>
<input type="submit" value="submit" name="sub" />
<?php
//$url='127.0.0.1:3306';
	if($_POST['sub'])
	{
	
		$rno=$_SESSION['otp'];
		$urno=$_POST['otpvalue'];
		if(!strcmp($rno,$urno))
		{
		header( "Location: success.php" );
		}
		else if($urno=="")
		{
			   echo "<script>alert('Enter the OTP');</script>";
		}
		else
		{
			
            echo "<script>alert('WRONG OTP');</script>";
		}
	}
?>
</form>
</body>
</html>
<?php } ?>