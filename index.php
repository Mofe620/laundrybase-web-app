<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['submit'])){	

	
$name = mysqli_escape_string($conn, $_POST['name']);
$email = mysqli_escape_string($conn, $_POST['email']);
$number = mysqli_escape_string($conn, $_POST['pnumber']);
$address = mysqli_escape_string($conn, $_POST['address']);
//$items = mysqli_escape_string($conn, $_POST['items']);
$pickup = mysqli_escape_string($conn, $_POST['pickup']);
$return = mysqli_escape_string($conn, $_POST['return']);
$service = mysqli_escape_string($conn, $_POST['service']);
$message = "You have successfully requested our Laundry service. Our PickUp team will be at your specified address in no time!";
$shirts = mysqli_escape_string($conn, $_POST['shirts']);
$trousers = mysqli_escape_string($conn, $_POST['trousers']);
$children = mysqli_escape_string($conn, $_POST['children']);
$blouses = mysqli_escape_string($conn, $_POST['blouses']);
$skirts = mysqli_escape_string($conn, $_POST['skirts']);
$suits = mysqli_escape_string($conn, $_POST['suits']);

if ($service == "Wash and Fold"){ $sql = 'select  `W-F` from prices where `ITEMS` = "Shirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u1 = $row['W-F'];
										$p1 = (int)$u1 * (int)$shirts;
										
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Skirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u2 = $row['W-F'];
										$p2 = (int)$u2 * (int)$skirts;
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Trousers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u3 = $row['W-F'];
										$p3 = (int)$u3 * (int)$trousers;
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Blouses" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u4 = $row['W-F'];
										$p4 = (int)$u4 * (int)$blouses;
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Suits and Blazers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u5 = $row['W-F'];
										$p5 = (int)$u5 * (int)$suits;
										
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Children Wears" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u6 = $row['W-F'];
										$p6 = (int)$u6 * (int)$children;
										
										if ($shirts != 0){ $c1 = $shirts."Shirts";} else { $c1 = "";};
										if ($skirts != 0){ $c2 = $skirts."Skirts";} else { $c2 = "";};
										if ($suits != 0){ $c3 = $suits."Suits";} else { $c3 = "";};
										if ($blouses != 0){ $c4 = $blouses."Blouses";} else { $c4 = "";};
										if ($trousers != 0){ $c5 = $trousers."Trousers";} else { $c5 = "";};
										if ($children != 0){ $c6 = $children."Children Wears";} else { $c6 = "";};
										
									
 $price = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6; 
 $items = $c1."".$c2."".$c3."".$c4."".$c5."".$c6; 
                                      

$sql = "INSERT INTO clients (`NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `ITEMS`, `PICKUP`,  `SERVICE`, `RETURN`, `PAYMENT` )
VALUES ('$name','$email','$number','$address', '$items', '$pickup', '$service', '$return', '$price' ); "; 

   
if ($conn->query($sql) === TRUE) {
	
	} else { echo mysqli_error($conn);
	//die();
}
			$sql = "INSERT INTO notifications (`NAME`, `SERVICE`, `TIME` )
VALUES ('$name','$service', now() ); ";

      if ($conn->query($sql) === TRUE) {
		  
	
	?>
	<script>
	  alert("Cheers! You've Requested Laundry Service. Our PickUP Staff will be with you shortly.");
	  window.location = "index.php";
	  $('#successModal').modal('show');
	</script>
	<?php
              die();	  
		 
  } 






									}}							}}}
									}					
								  }
	
	
if ($service == "Only Iron"){ $sql = 'select  `IRON` from prices where `ITEMS` = "Shirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u1 = $row['IRON'];
										$p1 = (int)$u1 * (int)$shirts;
										
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Skirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u2 = $row['IRON'];
										$p2 = (int)$u2 * (int)$skirts;
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Trousers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u3 = $row['IRON'];
										$p3 = (int)$u3 * (int)$trousers;
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Blouses" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u4 = $row['IRON'];
										$p4 = (int)$u4 * (int)$blouses;
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Suits and Blazers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u5 = $row['IRON'];
										$p5 = (int)$u5 * (int)$suits;
										
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Children Wears" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u6 = $row['IRON'];
										$p6 = (int)$u6 * (int)$children;
										
										if ($shirts != 0){ $c1 = $shirts."Shirts";} else { $c1 = "";};
										if ($skirts != 0){ $c2 = $skirts."Skirts";} else { $c2 = "";};
										if ($suits != 0){ $c3 = $suits."Suits";} else { $c3 = "";};
										if ($blouses != 0){ $c4 = $blouses."Blouses";} else { $c4 = "";};
										if ($trousers != 0){ $c5 = $trousers."Trousers";} else { $c5 = "";};
										if ($children != 0){ $c6 = $children."Children Wears";} else { $c6 = "";};
										
									
 $price = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6; 
 $items = $c1."".$c2."".$c3."".$c4."".$c5."".$c6; 
                                      

$sql = "INSERT INTO clients (`NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `ITEMS`, `PICKUP`,  `SERVICE`, `RETURN`, `PAYMENT` )
VALUES ('$name','$email','$number','$address', '$items', '$pickup', '$service', '$return', '$price' ); "; 

   
if ($conn->query($sql) === TRUE) {
	} else { echo mysqli_error($conn);
	//die();
}
			$sql = "INSERT INTO notifications (`NAME`, `SERVICE`, `TIME` )
VALUES ('$name','$service', now() ); ";

      if ($conn->query($sql) === TRUE) {
		  
	
	?>
	<script>
	  alert("Cheers! You've Requested Laundry Service. Our PickUP Staff will be with you shortly.");
	  window.location = "index.php";
	  $('#successModal').modal('show');
	</script>
	<?php
              die();	  
		 
  } 






									}}							}}}
									}					
								  }

if ($service == "Dry Clean"){ $sql = 'select  `D-C` from prices where `ITEMS` = "Shirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u1 = $row['D-C'];
										$p1 = (int)$u1 * (int)$shirts;
										
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Skirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u2 = $row['D-C'];
										$p2 = (int)$u2 * (int)$skirts;
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Trousers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u3 = $row['D-C'];
										$p3 = (int)$u3 * (int)$trousers;
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Blouses" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u4 = $row['D-C'];
										$p4 = (int)$u4 * (int)$blouses;
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Suits and Blazers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u5 = $row['D-C'];
										$p5 = (int)$u5 * (int)$suits;
										
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Children Wears" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u6 = $row['D-C'];
										$p6 = (int)$u6 * (int)$children;
										
										if ($shirts != 0){ $c1 = $shirts."Shirts";} else { $c1 = "";};
										if ($skirts != 0){ $c2 = $skirts."Skirts";} else { $c2 = "";};
										if ($suits != 0){ $c3 = $suits."Suits";} else { $c3 = "";};
										if ($blouses != 0){ $c4 = $blouses."Blouses";} else { $c4 = "";};
										if ($trousers != 0){ $c5 = $trousers."Trousers";} else { $c5 = "";};
										if ($children != 0){ $c6 = $children."Children Wears";} else { $c6 = "";};
										
									
 $price = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6; 
 $items = $c1."".$c2."".$c3."".$c4."".$c5."".$c6; 
                                      

$sql = "INSERT INTO clients (`NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `ITEMS`, `PICKUP`,  `SERVICE`, `RETURN`, `PAYMENT` )
VALUES ('$name','$email','$number','$address', '$items', '$pickup', '$service', '$return', '$price' ); "; 

   
if ($conn->query($sql) === TRUE) {
	} else { echo mysqli_error($conn);
	//die();
}
			$sql = "INSERT INTO notifications (`NAME`, `SERVICE`, `TIME` )
VALUES ('$name','$service', now() ); ";

      if ($conn->query($sql) === TRUE) {
		  
	
	?>
	<script>
	  alert("Cheers! You've Requested Laundry Service. Our PickUP Staff will be with you shortly.");
	  window.location = "index.php";
	  $('#successModal').modal('show');
	</script>
	<?php
              die();	  
		 
  } 






									}}							}}}
									}					
								  }								  
								  
} 
$conn->close();
?>
<!DOCTYPE HTML>
<html lang="eng">

<head>
	<title>LaundryBase</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<meta name="keywords" content="Go Laundry Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>

	<!-- Bootstrap Core CSS -->
	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- gallery css -->
	<link rel="stylesheet" href="css/swipebox.css">
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- font-awesome icons -->
	<link href="css/fontawesome-all.min.css" rel="stylesheet">
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<!--//webfonts-->
</head>

<body id="bootstrap-overrides">
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light py-4">
				<a class="navbar-brand" style="display: block; align-items:center;" href="index.php">
					<h1 style="color: #000066;">LaundryBase</h1>
				</a>
				<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto text-center">
						<li class="nav-item active  mr-3">
							<a class="nav-link" href="index.php">Home
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item dropdown mr-3">
							<a class="nav-link " id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
							    aria-expanded="false">
								About Us
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="team.php">Our Team</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="testimonial.php">Testimonials</a>
							</div>
		                </li>
						<li class="nav-item">
							<a class="nav-link" href="services.php">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact_us.php">Contact Us</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#login" data-toggle="modal" data-target="#login">Login</a>
						</li>
					</ul>
					<button type="button" id="orderBtn" style="margin-left: 7.5em;" class="btn btn-info w3ls-btn px-4 text-uppercase font-weight-bold"  data-toggle="modal"
					    aria-pressed="false" data-target="#LaundryModal">
						PickUp
					</button>
                    
				</div>
			</nav>
		</div>
	</header>
	<!-- //header -->
	<!-- banner -->
	<div class="banner" id="home">
		<div class="container">
			<div class="banner-text text-center">
				<div class="callbacks_container">
					<ul class="rslides" id="slider3">
						<li>
							<div class="slider-info">
								<h3 class="text-capitalize">We care for all your valued garments </h3>
								<a class="btn btn-primary  mt-4 text-capitalize scroll" href="#about" role="button">read more</a>
							</div>
						</li>
						<li>
							<div class="slider-info">
								<h3 class="text-capitalize">Trust Us, We Save Your Time.</h3>
								<a class="btn btn-primary  mt-4 text-capitalize scroll" href="#about" role="button">read more</a>
							</div>
						</li>
						<li>
							<div class="slider-info">
								<h3 class="text-capitalize">we offer the best laundry services</h3>
								<a class="btn btn-primary  mt-4 text-capitalize scroll" href="#about" role="button">read more</a>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about -->
	<section class="about-w3ls" id="about">
		<div class="container">
			<div class="jumbotron text-center pt-0">
				<img src="images/w.jpg" alt="" class="img-fluid rounded-circle">
				<h1 class="ab-title my-5">We Promise Highest Quality Care</h1>
				<h2 class="lead">With Excellent Facilities and Staff, you can rest assured that your articles and clothings receive maximal care and cleaning. </h2>
				<span class="lead">We are committed to ensuring that your valued clothings are delivered to your doorstep in the best possible condition.</span>
				<p class="lead">
					<a class="btn btn-primary btn-lg mt-3" href="services.php" role="button">Learn more</a>
				</p>
			</div>
		</div>
	</section>
	<!-- //about -->
	<!--services-->
	<div class="agileits-services py-md-5 py-3" id="services">
		<div class="container">
			<h3 class="w3ls-title text-center text-capitalize pb-md-5 pb-4">what we do</h3><br><br/>
			<div class="agileits-services-row row py-md-5 pb-5">
				<div class="col-lg-3 col-md-6 agileits-services-grids">
					<span class="fab fa-uniregistry p-4"></span>
					<h4 class="mt-2 mb-3">Commercial Service</h4>
					<p>We render services to Institutions, Offices and Corporate Agencies</p>
				</div>
				<div class="col-lg-3 col-md-6 agileits-services-grids mt-md-0 mt-3">
					<span class="fab fa-jenkins p-4"></span>
					<h4 class="mt-2 mb-3">Self Service</h4>
					<p>We render services to Individuals and Families as well</p>
				</div>

				<div class="col-lg-3 col-md-6 agileits-services-grids mt-lg-0 mt-3">
					<span class="fab fa-schlix p-4"></span>
					<h4 class="mt-2 mb-3">Faster Service</h4>
					<p>Quick and Reliable. We deliver your cleaned clothings in time and with a SMILE</p>
				</div>
				<div class="col-lg-3 col-md-6 agileits-services-grids mt-lg-0 mt-3">
					<span class="fas fa-magic p-4"></span>
					<h4 class="mt-2 mb-3">Stain Removal</h4>
					<p>Bring those stubborn stains to us. We assure you won't find them afterwards</p>
				</div>
			</div>
		</div>
	</div>
	<!-- //services-->
	<!-- stats -->
	<section class="agile_stats text-center py-5">
		<div class="container pt-sm-5">
			<div class="stats_agile mb-sm-5 mb-3">
				<h3 class="stat-title text-capitalize pb-md-5 pb-4">let us do your laundry</h3>
				<h4 style="color:white;" >You pay on Delivery</h4>
			</div>
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="counter pt-5 px-3 pb-3">
						<i class="far fa-smile fa-2x"></i>
						<div class="timer count-title count-number mt-2" data-to="5100" data-speed="15000"></div>
						<p class="count-text text-capitalize">happy customers</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mt-md-0 mt-sm-5 mt-3">
					<div class="counter  pt-5 px-3 pb-3">
						<i class=" fab fa-stack-overflow fa-2x"></i>
						<div class="timer count-title count-number mt-2" data-to="4783" data-speed="30000"></div>
						<p class="count-text text-capitalize">dry clean</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mt-lg-0 mt-sm-5 mt-3">
					<div class="counter  pt-5 px-3 pb-3">
						<i class="fas fa-eraser fa-2x"></i>
						<div class="timer count-title count-number mt-2" data-to="2184" data-speed="30000"></div>
						<p class="count-text text-capitalize">ironing</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 mt-lg-0  mt-sm-5 mt-3">
					<div class="counter  pt-5 px-3 pb-3">
						<i class="fas fa-exclamation fa-2x"></i>
						<div class="timer count-title count-number mt-2" data-to="1084" data-speed="30000"></div>
						<p class="count-text text-capitalize">stain removal</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //stats -->
	
	<!-- gallery -->
	<div class="gallery  py-md-5 py-3" id="gallery">
		<div class="container">
			<h3 class="w3ls-title text-center text-capitalize py-md-4 py-3">Inside LaundryBase</h3>
			<div class="gallery_gds row pt-md-5 pt-3">
				<div class="col-4 gal-w3l">
					<div class="agileits-img">
						<a href="images/g1.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img class="img-responsive img-style row2" src="images/g1.jpg" alt="" />
						</a>
					</div>
				</div>
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g2.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g2.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g3.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g3.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
			</div>
			<div class="gallery_gds row">
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g4.jpg" class="swipebox" title="Praesent non purus fermentum, eleifend velit non Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis.">
							<img src="images/g4.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g5.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g5.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g6.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g6.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
			</div>
			<div class="row pb-md-5 pb-3">
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g7.jpg" class="swipebox" title="Praesent non purus fermentum, eleifend velit non Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis.">
							<img src="images/g7.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g8.jpg" class="swipebox" title="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus tortor diam, ac lobortis justo rutrum quis. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g8.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
				<div class="col-4  gal-w3l">
					<div class="agileits-img">
						<a href="images/g9.jpg" class="swipebox" title="Duis maximus tortor diam, ac lobortis justo rutrum quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent non purus fermentum, eleifend velit non">
							<img src="images/g9.jpg" alt="" class="img-responsive img-style row2" />
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //gallery -->
	
	
	<!-- contact -->
	<section class="wthree-row py-5 w3-contact" id="contact">
		<div class="container py-md-5">
			<h3 class="w3ls-title text-center text-capitalize pb-md-5 pb-4">contact us</h3>
			<div class="row contact-form py-3">
				<div class="col-lg-6 wthree-form-left">
					<!-- contact form grid -->
					<div class="contact-top1">
						<form action="contact.php" method="post" class="f-color" enctype="multipart/form-data">
							<div class="form-group">
								<label for="contactusername">Name</label>
								<input type="text" class="form-control" name="name" id="contactusername" required>
							</div>
							<div class="form-group">
								<label for="contactemail">Email</label>
								<input type="email" class="form-control" name="email" id="contactemail" required>
							</div>
							<div class="form-group">
								<label for="contactcomment">Your Message</label>
								<textarea class="form-control" rows="5" id="contactcomment" name="message" required></textarea>
							</div>
							<input type = "submit" class=" btn btn-success" value="Send">
						</form>
					</div>
					<!--  //contact form grid ends here -->
				</div>
				<!-- contact details -->
				<!-- contact map grid -->
				<div class="col-lg-6  mt-lg-0 mt-5 map contact-right">
					<iframe class="h-50" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.9503398796587!2d-73.9940307!3d40.719109700000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a27e2f24131%3A0x64ffc98d24069f02!2sCANADA!5e0!3m2!1sen!2sin!4v1441710758555"
					    allowfullscreen></iframe>
					<div class="address mt-3">
						<h5 class="pb-3 text-capitalize">Contact info</h5>
						<address>
							<p class="c-txt">90 Street, Asaba, Delta State.</p>
							<p>
								+234 808 234 5678</p>
							<p>
								<p>
									<a href="mailto:info@laundrybase.com">info@laundrybase.com</a>
								</p>
						</address>
					</div>
				</div>
				<!--//contact map grid ends here-->
			</div>
			<!-- //contact details container -->
		</div>
	</section>
	<!-- //contact -->
	<!-- slide -->
	<section class="wthree-row py-sm-5 py-3 slide-bg bg-dark">
		<div class="container py-md-5 py-3">
			<div class="py-lg-5 bg-pricemain">
				<h3 class="agile-title text-capitalize text-white">LaundryBase!</h3>
				<span class="w3-line"></span>
				<h5 class="agile-title text-capitalize pt-4">trust us, we save your time.</h5>
				<p class="text-light py-sm-4 py-2">Get some more hours on family time during the weekends and all through the week. Leave that Laundry to us and you won't regret it a bit.
				</p>
			</div>
		</div>
	</section>
	<!--//slide-->
	<!-- footer -->
	<footer class="py-md-5 pt-5 pb-4">
		<div class="container">
			<!-- footer grid top -->
			<div class="footerv2-w3ls text-center">
				<h4 class="w3ls-title text-capitalize pb-3">Meet Us on Social Media</h4>
				<ul class="social-iconsv2 agileinfo mt-3">
					<li>
						<a href="#">
							<i class="fab fa-facebook-f"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-twitter"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-google-plus-g"></i>
						</a>
					</li>
					<li>
						<a href="#">
							<i class="fab fa-linkedin-in"></i>
						</a>
					</li>
				</ul>
				<div class="fv3-contact mt-3">
					<span class="fas fa-envelope-open mr-2"></span>
					<p>laundrybase.com</a>
					</p>
				</div>
				<div class="fv3-contact">
					<span class="fas fa-phone-volume mr-2"></span>
					<p>+456 123 7890</p>
				</div>
			</div>
			<!-- copyright -->
			<div class="cpy-right text-center pt-5">
				<p>© 2018 LaundryBase. 
					<a href="http://w3layouts.com" style="visibility:hidden;"> W3layouts.</a>All Rights Reserved
				</p>
			</div>
			<!-- //copyright -->
		</div>
	</footer>
	<!-- //footer -->
	<!-- order modal -->
	<div class="modal fade" id="LaundryModal" tabindex="-1" role="dialog" aria-labelledby="LaundryModalLabel1" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-capitalize" id="LaundryModalLabel1">Request PickUp <br>
					<small><h6>You pay on Delivery</h6></small>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="p-3" id="pickup_form" enctype="multipart/form-data" >
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Your Name</label>
							<input type="text" class="form-control" placeholder=" " id="name" name="name" id="recipient-name" required="">
						</div>
						<div class="form-group">
							<label for="recipient-name1" class="col-form-label">Your Email</label>
							<input type="email" class="form-control" placeholder=" " name="email" id="recipient-name1" required="">
						</div>
						<div class="form-group">
							<label for="recipient-name2" class="col-form-label">Phone</label>
							<input type="number" class="form-control" placeholder=" " name="pnumber" id="recipient-name2" required="">
						</div>
						<div class="form-group">
							<label class="mr-2 col-form-label">Pick Up</label>
							<input id="datepicker1" name="pickup"   type="text" value="MM/DD/YYYY"  class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="mr-2 col-form-label">Delivery </label>(Minimum of 2 days interval)
							<input id="datepicker2" name="return" onchange="myfunction();" type="text" value="MM/DD/YYYY" class="form-control" required=""><p class="text-danger" id="notice"></p>
						</div>
					<!--	<div class="form-group">
							<label for="recipient-item" class="col-form-label">Items</label>
							<input type="text" class="form-control"  placeholder="E.g 4 Shirts, 3 Trousers etc " id="name" name="items" id="recipient-name" >
						</div>-->
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
						<label><b>Choose Service Type</b>
						<div class="form-check">
							<label class="form-check-label col-form-label" for="l1">
								<input type="radio" name="service" class="form-check-input" value="Wash and Fold" id="service">Wash & Fold
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label col-form-label" for="l2">
								<input type="radio" name="service" class="form-check-input" value="Only Iron" id="service">Only Iron
							</label>
						</div>
						<div class="form-check">
							<label class="form-check-label col-form-label" id="l3">
								<input type="radio" name="service" class="form-check-input" value="Dry Clean" id="service">Dry Clean
							</label>
						</div>
						</label>
						<div class="form-group">
							<label for="comment" class="col-form-label">Pickup Address:</label>
							<textarea class="form-control" rows="4" id="comment" name="address" ></textarea>
						</div>

						<div class="right-w3l">
							<input type="submit" name="submit" class="form-control" id="post"  value="pick my laundry" >
						</div><br>
						<span>You can always track your laundry status in "Services"</span>
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- //order modal -->
	
	<!-- Successs modal -->
	
<div class="modal fade" id="successModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="text-capitalize">Success!</h4>
			</div>
			<div class="modal-body" style="font-family:verdana;">
                <p>You've  successfully requested our Laundry Service. Our PickUp Team will be at your specified address soon</p>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
	<!--// Success modal -->
	
	
	<!--LOGIN-->
			   
<div class="modal fade" id="login">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			    <i class="fab fa-empire"><h1>LaundryBase</h1></i><br>
			</div>
			<?php if (isset($error)){ echo $error ;} ?>
			<div class="modal-body">
				<form class="form-horizontal" role="form" id="form-type" action="client_login.php" method="post" enctype="multipart/form-data" >
					<input type="hidden" id="type-type" value="insert">
					<input type="hidden" id="type-id">
	              <div class="form-group">
				    <label class="control-label col-sm-3" for="">Email</label>
				    <div class="col-sm-9"> 
				      <input type="email" class="form-control" name="email" placeholder="Enter Email" required> 
				    </div>
				  </div>
				  <div class="form-group">
				    <label class="control-label col-sm-3" for="">Mobile Number</label>
				    <div class="col-sm-9"> 
				      <input type="number" class="form-control" name="pnumber" placeholder="Enter Mobile Contact" required>
				    </div>
				  </div>
				  <?php 
                        if (isset($script)){ echo $script ;}
					?>
				   <div class="form-group">
				    <label class="control-label col-sm-3" for=""></label>
				    <div class="col-sm-9"> 
				      <small><input type ="checkbox" name="remember">Remember Me</small>
				    </div>
				  </div>
				  <div class="form-group"> 
				    <div class="col-sm-offset-3 col-sm-9">
				      <input type="submit" name="login" class="btn btn-primary" value="Login">
				    </div>
				  </div>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>

<!--LOGIN-->
	

	<!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- js-->
	<!-- Banner text Responsiveslides -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function () {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function () {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function () {
					$('.events').append("<li>after event fired.</li>");
				}
			});

		});
	</script>
	<!-- //Banner text  Responsiveslides -->
	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js "></script>
	<script src="js/easing.js "></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll ").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			
			 var defaults = {
				 containerID: 'toTop', // fading element id
				 containerHoverID: 'toTopHover', // fading element hover id
				 scrollSpeed: 1200,
				 easingType: 'linear' 
			 };
			 

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<script src="js/SmoothScroll.min.js "></script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- gallery swipebox -->
	<script src="js/jquery.swipebox.min.js"></script>
	<script>
		jQuery(function ($) {
			$(".swipebox").swipebox();
		});
	</script>
	<script src="js/jquery.adipoli.min.js"></script>
	<!-- effect -->
	<script>
		$(function () {
			$('.row2').adipoli({
				'startEffect': 'overlay',
				'hoverEffect': 'sliceDown'
			});
		});
	</script>
	<!-- //swipe box js -->
	<!-- stats counter -->
	<script src="js/counter.js"></script>
	<!-- Date picker -->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker1,#datepicker2").datepicker();
		});
	</script>
	<!-- // Date picker -->
	<!-- testimonials -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function () {
			$("#owl-demo").owlCarousel({
				items: 1,
				lazyLoad: true,
				autoPlay: true,
				navigation: true,
				navigationText: true,
				pagination: true,
			});
		});
	</script>
	<!-- //for testimonials slider-js-script-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js ">
	</script>
	
	<!-- //Bootstrap Core JavaScript -->
	<script>
	function myfunction(){
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
		

	
	}
	</script>
	
	<script>
	// $.ajax({
	// 	type: "POST",
	// 	url: "index.php",
	// 	success: function(){
	// 		$("#successModal").modal('show');
	// 	}
	// })
	</script>

	
</body>

</html>