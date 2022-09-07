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



if(isset($_POST['delete'])){	

if (is_array($_POST['id'])){
	
	foreach ($_POST['id'] as $id){
		
		$sql="delete from clients where `O-ID` = '$id'";
		
		    if ($conn->query($sql) === TRUE) {
				
              	header("location: laundry_admin.php");

		}

		
	}

}

}
?>
<!doctype html>
<html lang="en">

<head>
	<title>Laundry Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="assets/vendor/toastr/toastr.min.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<style>
		@media (max-width:400px) {
			.col-md-12 {
				padding: 1em 0em !important;
			}
		}
	</style>
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!----><?php include ("navbar.php");?>
		<!-- LEFT SIDEBAR -->
		<?php include ("sidebar.php");?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			     <!-- Start creating your amazing application! -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title">Laundry Management</h3>
					
				
					<form action="" method="post" enctype="multipart/form-data">
					<div class="box-body pull-right" style="align-items:right; margin-bottom: 1em;">
                     <input type="submit" class="btn btn-danger" value="Delete" name="delete">
					</div><!-- /.box-body --><br>
					
							<!-- ORDER TABLE-->
							
						    <div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">All Orders (picked)</h3>
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-hover" id="myTable">
										<thead>
											<tr>
											    <th></th>
											    <th>S/N</th>
												<th>Client Name</th>
												<th>Email</th>
												<th>P-Number</th>
												<th>Address</th>
												<th>Pickup</th>
												<th>Items</th>
												<th>Service</th>
												<th>Return</th>
												<th>Fee</th>
												<th>Status</th>
											</tr>
										</thead>
										
										<?php
										$i = 0;
										$sql = 'SELECT * from clients WHERE `STATUS` != 0 order by status';
 
                                            if (mysqli_query($conn, $sql)) {
 
                                              echo "";
 
                                            } else {
 
                                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 
                                            }
 
                                        $count=1;
 
                                        $result = mysqli_query($conn, $sql);
 
                                        if (mysqli_num_rows($result) > 0) {
 
                                        // output data of each row
 
                                        while($row = mysqli_fetch_assoc($result)) { 
                                        ?>
										
										<tbody>
											<tr>
											    <td><input type="checkbox" name="id[]" onclick="toggle_highlight(this)" value="<?php echo $row['O-ID']?>"></td>
											    <td><?php echo ++$i; ?></td>
								                <td><?php echo $row['NAME']; ?></td>
												<td><?php echo $row['EMAIL']; ?></td>
												<td><?php echo $row['PNUMBER']; ?></td>
												<td><?php echo $row['ADDRESS']; ?></td>
												<td><?php echo $row['PICKUP']; ?></td>
												<td><?php echo $row['ITEMS']; ?></td>
												<td><?php echo $row['SERVICE']; ?></td>
												<td><?php echo $row['RETURN']; ?></td>
												<td><?php echo "N".$row['PAYMENT']; ?></td>
												<td style="text-align:center;"><?php echo $row['STATUS']; ?></td>
											</tr>
										</tbody>
										<?php
 
                                        $count++;
 
                                        }
 
                                    } else {
 
                                       echo '0 results';
 
                                    }
 
                                    ?>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div><br>
							<!--END ORDER TABLE-->
							
						</form>
							
							<br>
							<!-- STATUS -->
							
							<div class="row">
						<div class="col-md-3">
							<!-- BORDERED TABLE -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">STATUS DESCRIPTION</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover">
										<thead>
											<tr>
												<th style="text-align:center;">STATUS</th>
												<th style="text-align:center;">DESCRIPTION</th>
											</tr>
										</thead>
										
										<?php
										$sql = 'SELECT * from status';
 
                                            if (mysqli_query($conn, $sql)) {
 
                                              echo "";
 
                                            } else {
 
                                              echo "Error: " . $sql . "<br>" . mysqli_error($conn);
 
                                            }
 
                                        $count=1;
 
                                        $result = mysqli_query($conn, $sql);
 
                                        if (mysqli_num_rows($result) > 0) {
 
                                        // output data of each row
 
                                        while($row = mysqli_fetch_assoc($result)) { 
                                        ?>
										
										
										<tbody>
											<tr>
											    <td style="text-align:center;"><?php echo $row['STATUS']; ?></td>
								                <td style="text-align:center;"><?php echo $row['DESCRIPTION']; ?></td>
											</tr>
										</tbody>
										<?php
 
                                        $count++;
 
                                        }
 
                                    } else {
 
                                       echo '0 results';
 
                                    }
 
                                    ?>
									</table>
								</div>
							</div>
							<!-- END BORDERED TABLE -->
						</div>
							
							<!-- END STATUS -->
									
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/toastr/toastr.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	
	
	<script>
  function toggle_highlight(inputTagReference)
{
	var is_checked = inputTagReference.checked; //true or false
	if(is_checked)
	{
		inputTagReference.parentNode.parentNode.style.backgroundColor="pink";
	}
	else
	{
		inputTagReference.parentNode.parentNode.style.backgroundColor="";
	}
}
  </script>
	
	
	
	
</body>

</html>