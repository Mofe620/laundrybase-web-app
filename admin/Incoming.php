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
	<title>Incoming | LaundryBase</title>
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
				
				<h3 class="page-title">New Requests</h3>
				
				<!-- MODAL BUTTONS -->
				<form action="request_action.php" method="post" enctype="multipart/form-data">
				<input type="submit" name="update" class="btn btn-info" value="Update">
				<button data-toggle="modal" type="button" data-target="#editRequest" id ="editModal" class="btn btn-warning"><i class="fa fa-refresh"></i> Edit Request</button>
				<input type="submit" name="delete" class="btn btn-danger" value="Delete"><br>
				
				
				<!--// MODAL BUTTONS -->
				
				
				<!-- ORDER TABLE-->
							
						    <div class="col-md-12">
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Incoming Requests -- awaiting pickup</h3>
								</div>
								<div class="panel-body">
									<table class="table table-hover" id="myTable">
										<thead>
											<tr><input type="checkbox" name="all" onclick="toggle(this)"  >Select All
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
												<th>Status</th>
												<th>Fee</th>
											</tr>
										</thead>
										
										<?php
										$i = 0;
										$sql = 'SELECT * from clients WHERE `STATUS` = 0';
 
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
											    <td><input type="checkbox" name="id[]" onclick="toggle_highlight(this)" value="<?php echo $row['O-ID']?>">
												    <a data-toggle="modal" href="#editRequest" data-info="<?php echo $row['O-ID']?>"><span class="lnr lnr-pencil"></span></a>
												</td>
											    <td><?php echo ++$i; ?></td>
								                <td><?php echo $row['NAME']; ?></td>
												<td><?php echo $row['EMAIL']; ?></td>
												<td><?php echo $row['PNUMBER']; ?></td>
												<td><?php echo $row['ADDRESS']; ?></td>
												<td><?php echo $row['PICKUP']; ?></td>
												<td><?php echo $row['ITEMS']; ?></td>
												<td><?php echo $row['SERVICE']; ?></td>
												<td><?php echo $row['RETURN']; ?></td>
												<td style="text-align:center;"><?php echo $row['STATUS']; ?></td>
												<td>N<?php echo $row['PAYMENT']; ?></td>
											</tr>
										</tbody>
										<?php
 
                                        $count++;
 
                                        }
 
                                    } else {
 
                                       echo '</br> No incoming laundry order';
 
                                    }
 
                                    ?>
									</table>
								</div>
							</div>
							<!-- END TABLE HOVER -->
						</div><br>
						
						</form>
						
						
						<!--UPDATE STATUS--
			   
			   <div class="modal fade" id="orderStatus">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Update Request Status as Picked</h4>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-type" action="request_status.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" id="type-type" value="insert">
					<input type="hidden" id="type-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Request ID</label>
				    <div class="col-sm-9">
					  <?php /*
								        $sql = $sql = 'SELECT * from clients WHERE status = 0';
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) { 
										?>
										<input type="checkbox" name="id[]" value="<?php echo $row['O-ID']?>"><?php echo $row['O-ID']?>
										<?php
 
                                        $count++;
 
                                        }
										}else { echo ('<span class="text-info">'.'*All Requests have been Picked*'.'</span>');}*/
										?>
				    </div>
				  </div>
				  <div class="form-group">
				     <div class="col-sm-2"></div>
				     <div class="col-sm-8">
				      <input type="checkbox" name="check" required>
					  <span class="text-default" >Selected Requests have been picked and are ready for Laundry</span>
				     </div>	
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <input type="submit" name="update" class="btn btn-info" value="Update">
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
</div>
</div>
			   
			   <!--//UPDATE STATUS-->
							
			   
			   <!--EDIT REQUEST-->
			   
			  <div class="modal fade" id="editRequest">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Edit Request</h4><p><small>Fill only fields you wish to Edit - Client will receive e-mail alerts of any change in their request</small></p><br>
				<small class="text-info">Ensure at least 2 days interval between pickup and return</small><br>
			</div>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-type" action="editRequest.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" id="type-type" value="insert">
					<input type="hidden" id="type-id">
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Client's Name</label>
				    <div class="col-sm-9">
				      <select class="form-control" name="name"  onchange="request(this.value)">
					  <option>Choose Client Request to Edit</option>
								<?php 
								        $sql = 'SELECT * from clients where status < 2 ';
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) { 
										?>
										<option value="<?php echo $row['O-ID']?>" required><?php echo $row['NAME']?><br>
										<?php
 
                                        $count++;
 
                                        }
										}
										?>
                                </select>
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Email</label>
				    <div class="col-sm-9"> 
				      <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mobile Number</label>
				    <div class="col-sm-9"> 
				      <input type="number" class="form-control" name="pnumber" id="contact" placeholder="Enter Mobile Contact">
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Pickup Date</label>
				    <div class="col-sm-9"> 
				      <input id="datepicker1" type="date" class="form-control" name="pickup" placeholder="Enter Date">
				    </div>
				  </div>
				  <div class="row">
						<div class=" col-sm-4">
                      <label for="shirt" class="col-form-label">Shirts</label>
                      <input type="number" class="form-control col-md-6"  name="shirts" >
                      </div>
					    <div class=" col-sm-4">
                      <label for="shirt" class="col-form-label">Trousers</label>
                      <input type="number" class="form-control col-md-6"  name="trousers" >
                      </div>
					  <div class=" col-sm-4">
                      <label for="shirt" class="col-form-label">Children</label>
                      <input type="number" class="form-control col-md-6"  name="children" >
                      </div>
					  </div>
					  <div class="row">
					   <div class=" col-sm-4">
                      <label for="shirt" class="col-form-label">Blouses</label>
                      <input type="number" class="form-control col-md-6"  name="blouses" >
                      </div>
					  <div class=" col-sm-4">
                      <label for="shirt" class="col-form-label">Skirts</label>
                      <input type="number" class="form-control col-md-6"  name="skirts" >
                      </div>
					  <div class=" col-sm-4">
                      <label for="shirt" class="col-form-label">Suits</label>
                      <input type="number" class="form-control col-md-6"  name="suits" >
                      </div>
					  </div>
				  <div class="form-group">
						<label class="control-label col-sm-3" for="">Select Service specified by Client</label>
							   <div class="col-sm-8">
							    <select class="form-control" id="service" name="service" >
								<option value="Wash and Fold">Wash and Fold<br>
                                <option value="Only Iron">Only Iron<br>
								<option value="Dry Clean">Dry Clean<br>
								</select>
							</div>
						</div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Return Date</label>
				    <div class="col-sm-9"> 
				      <input type="date" onchange="datefunction();" id="datepicker2" class="form-control" name="return" placeholder="Enter Date"><br>
				    <p class="text-danger" id="notice"></p>
					</div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Address</label>
				    <div class="col-sm-9"> 
				      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <input type="submit" name="edit" class="btn btn-warning" value="Edit">
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<!--EDIT REQUEST-->
				
				</div>
				</div>
			
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a href="https://bootstrapthemes.co">BootstrapThemes</a></p>
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
	function datefunction(){
		var pick = document.getElementById("datepicker1").value;
		var x = new Date(pick);
		var arr = pick.split("/");
		
		var mm = arr[0];
		var dd = arr[1];
		var yy = arr[2];
		
		var dd = parseInt(arr[1]) + 2;
				
		var z = mm + '/' + dd + '/' + yy;
		
		var okay = new Date(z);
		
		var input = document.getElementById("datepicker2").value;
		var select = new Date(input);
		
		if (okay > select){ document.getElementById("notice").innerHTML = "Please give at least 2 days interval for optimum service"}
		
		if (okay <= select){ document.getElementById("notice").innerHTML = ""}
		
        document.getElementById("datepicker2").value= pick;
	
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
	  function request(str){
		 
		  if (str.length == 0){
				 
			 }
			 if (window.XMLHttpRequest){
				 xmlhttp = new XMLHttpRequest();
			 } else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}//for IE6, IE5
			 
			 xmlhttp.onreadystatechange = function(){ 
				 if (this.readyState == 4 && this.status == 200){
					   
					
					 var data = JSON.parse(this.responseText);
					 document.getElementById("contact").value = data.number;
					 document.getElementById("address").value = data.address;
					 document.getElementById("email").value = data.email;
					 document.getElementById("service").value = data.service;
					 document.getElementById("datepicker1").value = data.pickup;
					 document.getElementById("datepicker2").value = data.return;
		 }
			 };
		 xmlhttp.open("GET", "edit-ajax.php?q="+str, true);
		 xmlhttp.send();
		 
	  }
	</script>
	
	<script>
	  
	</script>
	
	<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
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
