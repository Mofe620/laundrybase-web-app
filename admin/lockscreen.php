<?php
session_start();
include ("connect.php");


//prevent going back after logging out!
if (!isset($_SESSION['admin_id']) || (trim ($_SESSION['admin_id']) == '')){
	
	header("location: login.php");
	?>
	
	<?php
	exit();
}



    $id=$_SESSION['admin_id'];
	$fname=$_SESSION['fname'];
	$lname=$_SESSION['lname'];
	$username=$_SESSION['username'];
	$email=$_SESSION['email'];
	$pnumber=$_SESSION['pnumber'];
	$pwd = $_SESSION['pwd'];

// UNSET SESSION FOR Lockscreen
unset($_SESSION['admin_id']);

?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Lockscreen | LaundryBase</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
	
	<div class="row"><br><br><br><br><br><br><br><br><br>
	                      <div class="col-md-4"></div>
						<div class="col-md-4">
							<?php 
								$prev_page  = $_SERVER['HTTP_REFERER'];
								$pieces = explode("/", $prev_page);
							?>
							<!-- PANEL DEFAULT -->
							<div class="panel">
								<div class="panel-heading">
									<h4 class="lead">Enter Password to Continue</h4>
								</div>
								
								<div class="user text-center">
							    <img src="assets/img/user-medium.png" class="img-circle" alt="Avatar">
							    <h2 class="name"><?php echo $fname; ?> <?php echo $lname; ?></h2>
						        </div>
								
								<form action="lockscreen_action.php" method="POST" enctype="multipart/form-data">
									<div class="input-group">
										<input type="text" hidden name="prev_page" value="<?php echo end($pieces) ?>">
										<input type="password" class="form-control" name="password" placeholder="Enter your password ...">
										<span class="input-group-btn"><input type="submit" name="continue" class="btn btn-primary"><i class="fa fa-arrow-right"></i></button></span> 
									</div>
						        </form>
								
							</div>
							<!-- END PANEL DEFAULT -->
						</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
