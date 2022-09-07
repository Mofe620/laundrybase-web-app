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




?>
<!doctype html>
<html lang="en">

<head>
	<title>Tracking | LaundryBase</title>
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
		<!----><?php include ("navbar.php");?>
		<!-- LEFT SIDEBAR -->
		<!-- LEFT SIDEBAR -->
		<?php include ("sidebar.php");?>
		<!-- END LEFT SIDEBAR -->
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					
					<h3 class="page-title" id="u">Tracking Laundry from Blocks</h3>
					
					<!-- BUTTONS -->
					<form action="retrieve.php" method="post" enctype="multipart/form-data">
					<div class="box-body">
					 <input type="submit" class="btn btn-success" value="Retrieve" name="retrieve">
					 <input type="submit" class="btn btn-primary" value="Remove" name="remove">
					</div><!-- /.box-body --><br>
					<p class="alert alert-warning">Retrieve Orders which have been taken care of. If you wish to cancel existing tags and re-assign to a new BLOCK, then "REMOVE"!!!</p>
					
					<!--// BUTTONS -->
					
					
					<div class="row">
						<div class="col-md-12">
						
						<!-- TRACK B TABLE-->
							
						    <div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Assigned Orders<br>
									<?php
                               
							        $sql = "SELECT * FROM trackb where `STATUS` = 'PENDING' ";
                                    if ($result = mysqli_query ($conn, $sql)){
	                                $rowcount = mysqli_num_rows ($result);
	                                echo ('<small>'.$rowcount."    Tags yet to be retrieved".'</small>');
							   }
							    ?>
									
									</h3>
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-hover" id="myTable">
										<thead>
											<tr><input type="checkbox" name="all" onclick="toggle(this)">Select All
											    <th></th>
											    <th>S/N</th>
												<th>Tag</th>
												<th>Block</th>
												<th>Items</th>
												<th>Retrieve</th>
												<th>Status</th>
											</tr>
										</thead>
										
										<?php
										$i = 0;
										$sql = 'SELECT * from trackb order by status';
 
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
										$status = $row['STATUS'];
										$retrieve = $row['RETRIEVE'];
                                        ?>
										
										<tbody>
											<tr>
											    <td><input type="checkbox" name="tag[]" onclick="toggle_highlight(this)" value="<?php echo $row['TAG']?>" <?php if ($status == "RETRIEVED" ) //echo "disabled"; ?> ></td>
											    <td><?php echo ++$i; ?></td>
											    <td><?php echo $row['TAG']; ?></td>
								                <td><?php echo $row['BLOCK']; ?></td>
												<td><?php echo $row['ITEMS']; ?></td>
												<td><?php echo $row['RETRIEVE']; ?></td>
												<td><span class="<?php $now = date('Y-m-d');
												                       if ($status == "PENDING"  && $now < $retrieve ){ echo "label label-warning";} 
												                       if ($status == "PENDING"  && $now >= $retrieve ){echo "label label-danger";}
																	   if ($status == "RETRIEVED"){ echo "label label-success";} 
												?>"><?php if ($status == "PENDING"  && $now > $retrieve ){ echo ("FAILED");}else{
													echo $row['STATUS']; 
												}if ($status == "PENDING"  && $now == $retrieve ){  echo ("--CRITICAL");}
												?></span></td>
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
						</div>
						</form>
							
							<!-- END TRACK B TABLE -->
							
							
							
							
							
					
					
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
	<script src="assets/scripts/klorofil-common.js"></script>
	
	
	<script>
	   function toggle(bx){
		   var form = bx.form;
		   var ischecked = bx.checked;
		   for (var i = 0; i< form.length; ++i){
			   if (form[i].type == 'checkbox'){
				   form[i].checked = ischecked;
			   }
		   }
	   }
	</script>
	
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
