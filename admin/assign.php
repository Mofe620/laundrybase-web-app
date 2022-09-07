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
	<title>Assign - LaundryBase</title>
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
		<?php include ("sidebar.php");?>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<h3 class="page-title" id="u">Assign Laundry to Blocks</h3>
					
					<!-- MODAL BUTTONS -->
					
					<div class="box-body">
					 
					</div><!-- /.box-body --><br>
					
					<!--// MODAL BUTTONS -->
					
					
					<div class="row">
						<div class="col-md-12">
							
						<form name="table" action="assign_order2.php" method="post" enctype="multipart/form-data">	
						<!-- UNTAGGED TABLE-->
							
						    <div class="col-md-7">
							<button type="button" style="margin-bottom: 1em;" data-toggle="modal"  data-target="#assignOrder" class="btn btn-warning"><i class="fa fa-refresh"></i> Assign Orders</button>
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Unassigned Orders</h3><br>
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-hover" id="myTable" >
										<thead>
											<tr><input type="checkbox" name="all" onclick="toggle(this)">Select All<br>
											    <th></th>
												<th>S/N</th>
												<th>Items</th>
												<th>Service</th>
												<th>Due Date </th>
											</tr>
										</thead>
										
										<?php
										$i = 0;
										$sql = 'SELECT * from clients where status = 1';
 
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
												<td><?php echo $row['ITEMS']; ?></td>
												<td><?php echo $row['SERVICE']; ?></td>
												<td><?php echo $row['RETURN']; ?></td>
											</tr>
										</tbody>
										<?php
 
                                        $count++;
 
                                        }
 
                                    } else {
 
                                       echo '0 Unassigned Orders'.'<br>';
 
                                    }
 
                                    ?>
									</table>
									<p id="ff"></p>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div>	
						
							
							<!-- END UNTAGGED TABLE -->
							
														
							
						</div>
					</div>
					
							<!-- ASSIGN ORDER -->
			   
		    <div class="modal fade" id="assignOrder">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title">Assign Orders</h4>
							</div>
							<div class="modal-body">
								<form class="form-horizontal" role="form" id="form-type" action="assign_order2.php" method="post" enctype="multipart/form-data" >
										
								  <div class="form-group">
										<label class="control-label" for="">Select Laundry Block you wish to assign to</label>
											   <div class="">
												<select class="form-control" name="block">
												<?php 
												        $sql = 'SELECT * from laundryblock ';
				                                        $result = mysqli_query($conn, $sql);
				                                        if (mysqli_num_rows($result) > 0) {
				                                        // output data of each row
				                                        while($row = mysqli_fetch_assoc($result)) { 
														?>
														<option value="<?php echo $row['NAME']?>" required><?php echo $row['NAME']?><br>
														<?php
				 
				                                        $count++;
				 
				                                        }
														}
														?>
				                                </select>
											</div>
										</div>
										
										<div class="form-group">
										<label class="control-label col-md-6" for="">Select Service specified by Client</label>
											   <div class="">
											    <select class="form-control" name="service" >
												<option value="Wash and Fold">Wash and Fold<br>
				                                <option value="Only Iron">Only Iron<br>
												<option value="Dry Clean">Dry Clean<br>
												</select>
											   </div>
										</div>
										
										<div class="form-group">
								    <label class="control-label" for="">Tag</label>
								    <div class="">
								      <input type="text" class="form-control" id="unique" name="tag" placeholder="Tag the Order" required>
									  <input type="checkbox" onchange="random()"><small>Generate Unique Tag</small><p id="u"></p>
								    </div>
								  </div>
								  
								  <div class="form-group"> 
								    <div class="">
								      <input type="submit" name="assign" class="btn btn-warning" value="Assign">
								    </div>
								  </div>
										
								  
								</form>
							</div>
							<div class="modal-footer">
							</div>
						</div>
					</div>
			</div></form>
			   
			   <!--// ASSIGN ORDER -->
			   
							
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
	<script src="assets/scripts/klorofil-common.js"></script>
	
	
	<!--Unique tag-->
	<script>
	    function random(){
			
				var myElement = document.getElementById("unique");
			 myElement.value = Math.random().toString(36).substr(2, 3);
			
		}
	</script>	
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