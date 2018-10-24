<?php 
include('conn.php');
session_start();
if(!$_SESSION['id1']){
    echo "<script>window.open('index.php','_self');</script>";
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
       <div class="container-fluid" style="background:#eee; margin-top: 50px; border-radius: 0px;">
            <div class="row">
                <br/>
                <div class="col-sm-12" style="text-align:center;">
                    <div class="panel">
                        <div class="panel-body"  style="border-radius:0px; box-shadow:2px 2px 2px 0px; padding-bottom:0px;">
                            <table align="center" class="table table-bordered table-hover table-striped">
                        <tr>
                            <?php
							 include("conn.php");
							$id=$_SESSION['id'];
							$cn=mysqli_query($con,"select * from user where id='$id'");
							$n = mysqli_fetch_array($cn);
							
							?>
							   <td colspan="3" align="left"  style="background:#444; color:#fff; font-size:20px;">Mr.<?php echo ($n['name']); ?> ( Money Transfer/Cashout Details of <?php echo date('M/Y'); ?> )</td>
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
							
							$t=$t+$u['amt'];
							
							?>
							<tr>	
								<td ><?php echo $i ?></td>
								<td colspan="" align="center"><?php echo $u['amt'];?></td>
								<td colspan="" align="center"><?php echo $u['dte'];?></td>
							</tr>
							<?php  }?>
							<tr>	
								<td colspan="" class="bg-danger" ><h5 align="center">Given Blance: <?php echo $n['g_amt']; ?> </h5></td>
								<td colspan="" class="bg-success" ><h5 align="center">Remaing Amount: <?php echo $n['amt'];?></h5></td>
								<td colspan="" class="bg-info" ><h5 align="center">Total widthdraw Amount: <?php echo $t?></h5></td>
							</tr>
                        </table>
                        
                        </div>
                    </div>    
                    
                
                </div>
            </div>	
		</div>
        
	</body>
</html>
<?php } ?>