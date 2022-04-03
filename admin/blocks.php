<?php
session_start();
include ("connect.php");

//prevent going back after logging out!
if (!isset($_SESSION['userid']) || (trim ($_SESSION['userid']) == '')){
	
	header("location: login.php");
	?>
	
	<?php
	exit();
}



    $id=$_SESSION['userid'];
	$fname=$_SESSION['fname'];
	$lname=$_SESSION['lname'];
	$username=$_SESSION['username'];
	$email=$_SESSION['email'];
	$pnumber=$_SESSION['pnumber'];


?>
<!doctype html>
<html lang="en">

<head>
	<title>Laundry Blocks | LaundryBase</title>
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
				
				    <h3 class="page-title">Laundry Blocks</h3>
					<div class="row">
						<div class="col-md-8">
						
						
						<!-- MODAL BUTTONS -->
					<form action="block_action.php" method="post" enctype="multipart/form-data">
					<div class="box-body">
                     <button data-toggle="modal" type="button" data-target="#addLaundry" class="btn btn-success"> New Laundry Block <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button>
                     <button data-toggle="modal" type="button" data-target="#blockInfo" class="btn btn-primary"><i class="fa fa-refresh"></i> Update Block Info</button>
                     <input type="submit" name="delete" class="btn btn-danger" value="Delete Block"><br>
					</div><!-- /.box-body --><br>
					
					   <!--// MODAL BUTTONS -->
						
						
							<!-- LAUNDRY BLOCKS -->
							
						
							<!-- TABLE STRIPED -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Laundry Blocks</h3>
								</div>
								<div class="panel-body">
									<table id="myTable" class="table table-striped">
										<thead>
											<tr>
											    <th></th>
												<th>S/N</th>
												<th>Laundry Name</th>
												<th>Address</th>
												<th>Contact</th>
											</tr>
										</thead>
										
										<?php
										$i = 0;
										$sql = 'SELECT * from laundryblock';
 
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
											    <td><input type="checkbox" name="id[]" onclick="toggle_highlight(this)" value="<?php echo $row['B-ID']?>"></td>
											    <td><?php echo ++$i; ?></td>
								                <td><?php echo $row['NAME']; ?></td>
												<td><?php echo $row['ADDRESS']; ?></td>
												<td><?php echo $row['CONTACT']; ?></td>
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
							<!-- END TABLE STRIPED -->
						</div>
							
							<!-- END LAUNDRY BLOCK -->
						</div>
						</form>
						
						
						<div class="modal fade" id="blockInfo">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Update Block Info</h4><p><small>Fill only fields you wish to Update</small></p>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-type" action="block_action.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" id="type-type" value="insert">
					<input type="hidden" id="type-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Laundry Block</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="name" onchange="blockdetails(this.value)">
					  <option>Select Block to Edit</option>
								<?php 
								        $sql = 'SELECT * from laundryblock ';
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) { 
										?>
										<option value="<?php echo $row['B-ID']?>" required><?php echo $row['NAME']?><br>
										<?php
 
                                        $count++;
 
                                        }
										}
										?>
                                </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mobile Number</label>
				    <div class="col-sm-9"> 
				      <input type="number" id="contact" class="form-control" name="number" placeholder="Enter Mobile Contact">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Address</label>
				    <div class="col-sm-9"> 
				      <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <input type="submit" name="bupdate" class="btn btn-info" value="Update">
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
						
						
						
						
						<!--ADD LAUNDRY BLOCK-->
					
					<div class="modal fade" id="addLaundry">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Add Laundry Block</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-type" action="block_action.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" id="type-type" value="insert">
					<input type="hidden" id="type-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Laundry Block Name</label>
				    <div class="col-sm-9">
				      <input type="text" class="form-control" name="name" placeholder="Enter name of laundry block" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mobile Number</label>
				    <div class="col-sm-9"> 
				      <input type="number" class="form-control" name="number" placeholder="Enter Mobile Contact" required>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Address</label>
				    <div class="col-sm-9"> 
				      <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <input type="submit" name="add" class="btn btn-success" value="Add">
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

               <!--// ADD LAUNDRY BLOCK-->
						
						
						<!--UPDATE BLOCK INFO-->
			   
			   
			   
			   <!--//UPDATE BLOCK INFO-->
				
						<div class="col-md-4">
							<!-- PANEL NO PADDING -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Panel No Padding</h3>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding bg-primary text-center">
									<div class="padding-top-30 padding-bottom-30">
										<i class="fa fa-thumbs-o-up fa-5x"></i>
										<h3>No Content Padding</h3>
									</div>
								</div>
							</div>
							<!-- END PANEL NO PADDING -->
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
	
	
	<script>
	  function blockdetails(str){
		 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function(){ 
				 if (this.readyState == 4 && this.status == 200){
					 var data = JSON.parse(this.responseText); //JSON.parse converts the json string to a javascript object
					 document.getElementById("contact").value = data.number;
					 document.getElementById("address").value = data.address;
				}
			};
		 xmlhttp.open("GET", "blajax.php?q="+str, true);
		 xmlhttp.send();
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
