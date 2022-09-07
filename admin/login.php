<?php
session_start();
include ("connect.php");
?>
<!DOCTYPE html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | LaundryBase</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
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
							<!-- PANEL DEFAULT -->
							<h1 class="text-center" style="margin-top: -2em;">LaundryBase Admin</h1>
							<div class="panel">
								<div class="panel-heading">
									<h4 class="lead">Login to your account</h4>
									<form action="log.php" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="signin-name" class="control-label sr-only">Admin Name</label>
								  <div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="text" class="form-control" id="signin-name" name= "username" placeholder="Admin Username">
								  </div>
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" class="form-control" name="password" id="signin-password"  placeholder="Admin Password">
								    </div>
								</div>
								<div class="form-group clearfix">
									<label class="fancy-checkbox element-left">
										<input type="checkbox" name="remember">
										<span>Remember me</span>
									</label>
								</div>
								<?php 
								    if (isset($_SESSION["error"])){ ?>
                                        <div><?php foreach ($_SESSION['error'] as $error) {
                                        ?><p class = "error" style="color:red; text-align: center;"> <?php	echo $error;?> </p><?php
                                        }  ?></div>
                                      <?php
								    }
								?>
								<input type="submit" name="login" class="btn btn-primary btn-lg btn-block" value="LOGIN">
								<div class="bottom">
									<span class="helper-text"><i class="fa fa-question-circle"></i> <a href="#">Forgot password?</a></span>
								</div>
								
								</div>
							</form>
							</div>
							<!-- END PANEL DEFAULT -->
						</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
