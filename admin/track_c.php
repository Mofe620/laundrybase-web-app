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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.css" />
		
	<style>
		@media (max-width:400px) {
			.col-md-12 {
				padding: 0em !important;
			}
		}
	</style>
</head>

<body>

<script type="text/javascript">
$(function(){
	$(".chzn-select").chosen();
});
</script>

<script type="text/javascript">
	$("#myselect").select2();
        </script>


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
					<div class="panel panel-profile">
						<div class="clearfix">
							
						
							
							
							<!--SEARCH BAR-->
							
							
                           <form class="navbar-form navbar-left" method="post" enctype="multipart/form-data">
						   Search Important Client Info
							  <select class="form-control" id="myselect"  name="clients" onchange="showResult(this.value)">
							      <option value="">Clients</option>
							      <?php 
								        $sql = 'SELECT * from clients where status > 0';
                                        $result = mysqli_query($conn, $sql);
                                        $count = 0;
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
							   </select><br>
                                <div id="result"></div>							   
				           </form>
							
							<!--//SEARCH BAR-->
							
							
							<form action="finish.php" method="post" enctype="multipart/form-data">
							<div style="margin-top: 1.5em; margin-left: 1em;">
								<input type="submit" class="btn btn-primary" name="finish" value="Return">
							</div>
							<br>
							<!-- ORDER TABLE-->
							
						    <div class="col-md-12">
							
							<!-- TABLE HOVER -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">All Clients' Orders<br>
									<?php
                               
							        $sql = "SELECT * FROM CLIENTS where `STATUS` < 4 ";
                                    if ($result = mysqli_query ($conn, $sql)){
	                                $rowcount = mysqli_num_rows ($result);
	                                echo ('<small>'.$rowcount." Orders pending".'</small>');
							   }
							    ?>
									</h3>
								</div>
								<div class="panel-body table-responsive">
									<table class="table table-hover" id="myTable" >
										<thead>
											<tr>
											    <th></th>
												<th>S/N</th>
												<th>Client Name</th>
												<th>Email</th>
												<th>P-Number</th>
												<th>Items</th>
												<th>Block</th>
												<th>Tag</th>
												<th>Return</th>
												<th>Fee</th>
												<th>Status</th>
											</tr>
										</thead>
										
										<?php
										$i = 0;
										$sql = 'SELECT * FROM clients LEFT JOIN TAGGING ON clients.`O-ID` = tagging.`O-ID` AND tagging.`ITEMS` order by status;';
 
                                            if (mysqli_query($conn, $sql)) {
 
                                              echo "";
 
                                            } 
 
                                        $count=1;
 
                                        $result = mysqli_query($conn, $sql);
 
                                        if (mysqli_num_rows($result) > 0) {
                                        while($row = mysqli_fetch_assoc($result)) { 
										$status = $row['STATUS'];
										$date = $row['RETURN'];
										$return = date( 'Y-m-d', strtotime($date ));
								        $now = date('Y-m-d')
                                        ?>
										
										<tbody>
											<tr>
											    <td><input type="checkbox" name="id[]" onclick="toggle_highlight(this)" value="<?php echo $row['O-ID']?>" <?php if ($status != 3) echo "disabled"; ?> ></td>
											    <td><?php echo ++$i; ?></td>
								                <td><?php echo $row['NAME']; ?></td>
												<td><?php echo $row['EMAIL']; ?></td>
												<td><?php echo $row['PNUMBER']; ?></td>
												<td><?php echo $row['ITEMS']; ?></td>
												<td><?php echo $row['BLOCK']; ?></td>
												<td><b><?php echo $row['TAG']; ?></b></td>
												<td><?php echo $row['RETURN']; ?></td>
												<td><?php echo "N".$row['PAYMENT']; ?></td>
												<td><span class="<?php if($now >= $return && $status < 4){echo "label label-danger";} else{
												
												               if ($status == 4){echo "label label-success";}
															   if ($status == 3){echo "label label-primary";}
															   if ($status == 2){echo "label label-warning";}
															   if ($status == 1){echo "label label-info";}																   
												}	  										   
												?>"><?php 
												     if ($status == 0){echo '<a href="Incoming.php">'.'<b>'."Incoming Request".'</b>'.'</a>';}
												     if ($status == 1){echo '<b>'."Picked".'</b>';}
													 if ($status == 2){echo '<b>'."Assigned".'<b>';}
												     if ($status == 3){echo '<b>'."Retrieved".'<b>';}
													 if ($status == 4){echo '<b>'."Completed".'<b>';}
												    ?>
												</span>
												</td>
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
						</form>
							
							
							
							
							
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
		 function showResult(str){
			 
			 if (str.length == 0){
				 document.getElementById("result").style.border = "0px";
				 return;
			 }
			 if (window.XMLHttpRequest){
				 xmlhttp = new XMLHttpRequest();
			 } else { xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");}//for IE6, IE5
			 
			 xmlhttp.onreadystatechange = function(){
				 if (this.readyState == 4 && this.status == 200){
					 document.getElementById("result").innerHTML = this.responseText;
					 
					 document.getElementById("result").style.border = "1px solid #A5ACB2";
				 }
		 }
		 xmlhttp.open("GET", "search.php?q="+str, true);
		 xmlhttp.send();
		 }
		</script>
		 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
		<script type="text/javascript">
	$(".myselect").select2();
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
