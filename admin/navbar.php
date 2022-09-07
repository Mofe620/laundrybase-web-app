<style>
	@media (max-width:1024px) {
		.btn-toggle-fullwidth {
			transform: rotate(180deg);
		}
	}
</style>

<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="brand">
				<a href="dashboard.php"><img src="assets/img/logo-dark.png" alt="Klorofil Logo" class="img-responsive logo"></a>
			</div>
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<form class="navbar-form navbar-left" method="post" enctype="multipart/form-data">
					<div class="input-group">
						<input type="text" name="search" value="" size="30"  id="myInput"  onkeyup="myFunction()" class="form-control" placeholder="Search <?php 
						if (basename($_SERVER['PHP_SELF'], '.php')== 'dashboard')echo ("dashboard");
                        if (basename($_SERVER['PHP_SELF'], '.php')== 'Incoming')echo ("by Client Name");
                        if (basename($_SERVER['PHP_SELF'], '.php')== 'laundry_admin')echo ("by Client Name");						
                        if (basename($_SERVER['PHP_SELF'], '.php')== 'blocks')echo ("by Block Name");
                        if (basename($_SERVER['PHP_SELF'], '.php')== 'assign')echo ("by Service");
                        if (basename($_SERVER['PHP_SELF'], '.php')== 'track_b')echo ("by Tag");
                        if (basename($_SERVER['PHP_SELF'], '.php')== 'track_c')echo ("by Client Name");
                        ?>...">
						<span class="input-group-btn"><button type="button"  data-toggle="modal" data-target="#info" class="btn btn-primary">Go</button></span>
					</div>
				</form>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" onclick="hide()" class="dropdown-toggle icon-menu" data-toggle="dropdown">
								<i class="lnr lnr-alarm"></i>
								<span class="badge bg-danger" id="new" ><?php
                               
							   $sql = "SELECT * FROM notifications WHERE `VIEW` = 0";
                               if ($result = mysqli_query ($conn, $sql)){
	                           $rowcount = mysqli_num_rows ($result);
	                           echo $rowcount;
							   }
							    ?>
								</span>
							</a>
							<ul class="dropdown-menu notifications">
								<li><a href="#" class="notification-item"><span class="dot bg-success"></span>New Order from:</a></li>
					            <?php 
								        $sql = 'SELECT * from notifications where `VIEW` = 0 ';
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0) {
                                        // output data of each row
                                        while($row = mysqli_fetch_assoc($result)) { 
										echo '<ul>'.'<span class="dot bg-warning">'.'</span>'.'<b>'.$row['NAME'].'</b>'.'.'.$row['SERVICE'].'<br>'.'<em>'.$row['TIME'].'</em>'.'</ul>';
										}
										}
                                ?>
								<li><a href="incoming.php" class="more">See all incoming requests</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="lnr lnr-question-circle"></i> <span>Help</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#">Basic Use</a></li>
								<li><a href="#">Working With Data</a></li>
								<li><a href="#">Security</a></li>
								<li><a href="#">Troubleshooting</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="assets/img/user.png" class="img-circle" alt="Avatar"> <span><?php echo $fname; ?></span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="#"><i class="lnr lnr-user"></i> <span>My Profile</span></a></li>
								<li><a href="#"><i class="lnr lnr-envelope"></i> <span>Message</span></a></li>
								<li><a href="#"><i class="lnr lnr-cog"></i> <span>Settings</span></a></li>
								<li><a href="logout.php"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
						<!-- <li>
							<a class="update-pro" href="https://www.themeineed.com/downloads/klorofil-pro-bootstrap-admin-dashboard-template/?utm_source=klorofil&utm_medium=template&utm_campaign=KlorofilPro" title="Upgrade to Pro" target="_blank"><i class="fa fa-rocket"></i> <span>UPGRADE TO PRO</span></a>
						</li> -->
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		
		

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
	//hide notification
	 function hide(){
		 document.getElementById("new").style.display='none';
		 
		 var xmlhttp = new XMLHttpRequest();
		 xmlhttp.onreadystatechange = function(){
			 if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
				 //alert(xmlhttp.responseText);
		 }
	 };
	 xmlhttp.open("GET", "seen.php" , true);
	 xmlhttp.send();
	 }
</script>
        	