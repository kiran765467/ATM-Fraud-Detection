<?php 
include('conn.php');
session_start();
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
		<link rel="stylesheet" href="../css/bootstrap.min.css"/>
		<link rel="stylesheet" href="../css/custom.css"/>
		<!--
            ============================
                Bootstrap + Custom + Jquery
            ============================
        -->
		<script src="../js/jquery_library.js"></script>
		<script src="../js/bootstrap.min.js"></script>
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
                    <a class="navbar-brand" href="index.php"><strong><i class="glyphicon glyphicon-list-alt"></i> ABC Bank (ATM)</strong></a>
     			</div>
			</div>
		</nav>	
        <!--
            ======================
                Main Section Starts 
            ======================
        -->
        <div class="container-fluid" style="background:#ddd; margin-top:50px;">
            <br/>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="">
                        <div class="panel panel-login" style="border-radius:0px; box-shadow:2px 2px 2px 0px;">
                                <div class="panel-heading" id="signin_panel_header">
                                    <p align="center"><img src="../admin/user.png" style="width: 45%;border-radius: 50%;text-align: center;margin: auto;"/> </p>
                                    <h4 align="center">Manager Login</h4>
                                    <hr/>
                                </div>
                                <div class="panel-body" style="margin-top:-25px;">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="email" class="form-control" placeholder="Username.." required=""/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="pass" class="form-control" placeholder="Password.." required=""/>
                                    </div>
                                </div>
                                <div class="panel-footer footer-login">
                                    <center>
                                        <button type="submit" name="login" class="btn btn-success btn-custom" style="padding:12px 35px;"><i class="glyphicon glyphicon-log-in"></i> Login</button>
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
            $query ="select * from manager where user='$user' and pass='$pass' ";
            $run = mysqli_query($con,$query);
            if(mysqli_num_rows($run)==1)
            {
                $query_id ="select * from manager where user='$user'";
                $run_id = mysqli_query($con,$query_id);
                $run_id2 = mysqli_fetch_array($run_id);
                $_SESSION['id'] = $run_id2['id'];
                $_SESSION['name'] = $run_id2['name'];
                echo "<script>window.open('home.php','_self');</script>";
            }
            else
            {
                echo "<script>alert('** Please Enter Correct Information **')</script>";
            }   
        }
    ?>      
            <!--
                ======================
                    Footer  Starts 
                ======================
            -->
            <div class="container-fluid" style="background:#555; color:#fff; padding:10px 0px">
                    <h4 align="center">Copyrights &copy; 2017</h4>
                    <h4 align="center">System Developed by Aqib Sattar</h4>
            </div>
	</body>
</html>