<?php 
include('conn.php');
session_start();
if(!$_SESSION['id']){
	header('location: index.php');
}
else{
	include('conn.php');
    $u_id=$_SESSION['id'];
	$t_name = $_SESSION['name'];
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
        <meta http-equiv="refresh" content=""/>
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
        <nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="home.php"><i class="glyphicon glyphicon-list-alt"></i> ATM OS </a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav">
						<li><a href="add_cus.php"><span class='glyphicon glyphicon-copy'></span> Add Customer</a></li>
                        <li><a href="request.php"><span class='glyphicon glyphicon-edit'></span> Register Customer</a></li>
                    </ul>
                    <form action="search.php" class="navbar-form navbar-right" role="search" method="get">
                        <div class="form-group input-group">
                            <input type="text" id="search" name="search" class="form-control" placeholder="Search Customer Name..." required=""/>
                            <span class="input-group-btn">
                                <button class="btn btn-default s-btn" type="submit">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>        
                        </div>
                    </form>   
                   <ul class="nav navbar-nav navbar-right">
						<li><a href="../logout.php"><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!--
            ====================
                User info bar Starts
            ====================
        -->
		<div class="container-fluid" style="background:#eee; margin-top: 50px; border-radius: 0px;">
			<div class="container">
				<h4> Welcome <b> Manager <i class="glyphicon glyphicon-user"></i> <?php echo $t_name?></b><span class="pull-right" style="line-height:auto; margin-top: px;"><a></a><i class="glyphicon glyphicon-time	"></i> Date: <?php echo $date = date('d/M/y h:i a'); ?></span></h4> 
			</div>
		</div>
		<!--
            ====================
                Main Section starts
            ====================
        -->
        <div class="container-fluid" style="background: #f3f3f3;">		
            <div class="row">
                <br/>
                <div class="col-sm-12" style="text-align:center;">
                    <div class="panel">
                       <div class="panel-body" style="border-radius:0px; box-shadow:2px 2px 2px 0px;">
                           <table align="center" class="table table-bordered table-hover table-striped">
                               <tr>
                                   <td colspan="8" align="center" style="background:#444; color:#fff; font-size:22px; border-color:#444;">Requested Customers <b class="badge"> <?php echo $cus = mysqli_num_rows(mysqli_query($con,"select * from user where reg='no'")); ?> </b></td>
                               </tr>
                               <tr>
                                   <td align="center"><b>Id</b></td>
                                   <td align="center"><b>Name</b></td>
                                   <td align="center"><b>Password</b></td>
                                   <td align="center"><b>Bank Code</b></td>
                                   <td align="center"><b>Registered</b></td>
                                   <td align="center"><b>Delete</b></td>
                               </tr>
                               <?php
                                    include("conn.php");
                                    $user=mysqli_query($con,"select * from user where reg='no'");
                                    while($u = mysqli_fetch_array($user)){
                                ?>
                               <tr>	
                                   <td align="center"><?php echo $u[0];?></td>
                                   <td align="center"><?php echo ucwords($u[1]);?></td>
                                   <td align="center"><?php echo $u[2];?></td>
                                   <td align="center"><?php echo $u[3];?></td>
                                   <td align="center"><?php echo $u['reg']?></td>
                                   <td align="center"><a class="btn btn-danger btn-sm" href="request.php?del=<?php echo $u[0]?>"><i class="glyphicon glyphicon-trash" ></i></a></td>
                               </tr>
                               <?php } ?>
                           </table>
                        </div>
                    </div>
                </div>
            </div>	
        </div>
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

<?php } 
if(isset($_GET['del'])){
    $del = $_GET['del'];
    mysqli_query($con,"delete from user where id='$del'");
    echo "<script>window.open('request.php','_self')</script>";
}

?>