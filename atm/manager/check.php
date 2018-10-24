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
		<div class="container-fluid" style="background:#f3f3f3; margin-top: 0px; border-radius: 0px;">
            <div class="row">
                <br/>
                <div class="col-sm-12" style="text-align:center;">
                    <div class="panel">
                        <div class="panel-body"  style="border-radius:0px; box-shadow:2px 2px 2px 0px; padding-bottom:0px;">
                            <table align="center" class="table table-bordered table-hover table-striped">
                        <tr>
                            <?php
							 include("conn.php");
							$id=$_GET['name'];
							$cn=mysqli_query($con,"select * from user where id='$id'");
							$n = mysqli_fetch_array($cn);
							
							?>
							   <td colspan="3" align="left"  style="background:#444; color:#fff; font-size:20px;">Mr.<?php echo ucwords($n[1]); ?> ( Money Transfer/Cashout Details of <?php echo date('M/Y'); ?> )</td>
							</tr>
							<tr>
								<td align="center"><b>Transection No.</b></td>
								<td align="center"><b>Transection Date</b></td>
								<td align="center"><b>Transection Amount</b></td>
							</tr>
							<?php
							include("conn.php");
							$d = date('M/y'); 
							$user=mysqli_query($con,"select * from tran where uid='$id' and month='$d'");
							$i=0;
							$t=0;
							while($u = mysqli_fetch_array($user)){
							
							$i++;
							
							$t=$t+$u[3];
							
							?>
							<tr>	
								<td ><?php echo $i ?></td>
								<td colspan="" align="center"><?php echo $u[2];?></td>
								<td colspan="" align="center">Rs. <?php echo $u[3];?> /=</td>
							</tr>
							<?php  }?>
							<tr>	
								<td colspan="" class="bg-danger" ><h5 align="center">Given Blance: <?php echo $n['g_amt']; ?> </h5></td>
								<td colspan="" class="bg-success" ><h5 align="center">Remaing Amount: <?php echo $n['amt'];?></h5></td>
								<td colspan="" class="bg-info" ><h5 align="center">Total widthdraw Amount: Rs. <?php echo $t?> /=</h5></td>
							</tr>
                                <tr>
                                    <td colspan="9">
                                        <a href="home.php" class="btn btn-info btn-custom">Back</a>
                                    </td>
                                </tr>
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

<?php } ?>