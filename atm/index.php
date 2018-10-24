<?php 
include('conn.php');
session_start();
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
                    <a class="navbar-brand" href="index.php"><strong><i class="glyphicon glyphicon-list-alt"></i> UNC Bank (ATM)</strong></a>
     			</div>
			</div>
		</nav>	
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel panel-login" style="border-radius:0px; box-shadow:2px 2px 2px 0px;">
                                <div class="panel-heading" id="signin_panel_header">
                                    <p align="center"><img src="admin/person-man.png" style="width: 45%;border-radius: 50%;text-align: center;margin: auto;"/> </p>
                                    <h4 align="center">User Login</h4>
                                    <hr/>
                                </div>
                                <div class="panel-body" style="margin-top:-25px;">
                                    <div class="form-group">
                                        <label>CardNumber</label>
                                        <input type="text" name="email" class="form-control" placeholder="CardNumber.." required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" placeholder="Password.." required=""/>
                                    </div>
                                </div>
                                <div class="panel-footer footer-login">
                                    <center>
                                        <button type="submit" name="login" class="btn btn-primary btn-custom" style="padding:12px 35px;"><i class="glyphicon glyphicon-log-in"></i> Login</button>
                                    </center>
                                </div>
                            </div>         
                        </form>
                    </div>
                </div> 
            </div> 
             <?php
        if(isset($_POST['login'])){
            $user = mysqli_real_escape_string($con, $_POST['email']);
            $pass = mysqli_real_escape_string($con, $_POST['pass']);
            $query ="select * from user where bankcode='$user' and pass='$pass' ";
            $run = mysqli_query($con,$query);
            if(mysqli_num_rows($run)==1)
            {
                $query_id ="select * from user where bankcode='$user'";
                $run_id = mysqli_query($con,$query_id);
                $run_id2 = mysqli_fetch_array($run_id);
                $_SESSION['id'] = $run_id2['id'];
                $_SESSION['name'] = $run_id2['name'];
				
                echo "<script>window.open('otp.php','_self');</script>";
            }
            else
            {
                echo "<script>alert('** Please Enter Correct Information **')</script>";
            }   
        }
    ?>      
      	</body>
</html>