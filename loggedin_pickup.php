<?php
session_start();
include("connect.php");

$id = $_SESSION['userid'];
$name = $_SESSION['name'];
$address = $_SESSION['address'];
$email = $_SESSION['email'];
$pnumber = $_SESSION['pnumber'];

//prevent going back after logging out!
if (!isset($_SESSION['userid']) || (trim($_SESSION['userid']) == '')) {
	header("location: index.php");
	exit();
}

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
		addEventListener("load", function() {
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
	<link href="css/style.css?v=<?php echo time(); ?>" rel='stylesheet' type='text/css' />
	<link href="css/logged-in.css?v=<?php echo time(); ?>" rel='stylesheet' type='text/css' />
	<!-- font-awesome icons -->
	<link href="css/fontawesome-all.min.css" rel="stylesheet">
	<!-- //Custom Theme files -->
	<!--webfonts-->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<!--//webfonts-->
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.js ">
	</script>
	<!-- //Bootstrap Core JavaScript -->
</head>

<body id="bootstrap-overrides">
	<!-- header -->
	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="index.php">
					<i class="fab fa-empire"></i>
					<h1>LaundryBase</h1>
				</a>
				<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto text-center">
						<li class="nav-item ">
							<a class="nav-link" href="index.php">Home
							</a>
						</li>
						<li class="nav-item dropdown mr-3 active">
							<a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								About Us<span class="sr-only">(current)</span>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="team.php">Our Team</a>
								<a class="dropdown-item" href="pricing.php">Order Laundry</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="testimonial.php">Testimonials</a>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="services.php">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="contact_us.php">Contact Us

							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="logout.php">Logout

							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- //header -->



	<!---------->
	<div class="text-center">
		<div class="hero pt-5">
			<h1>Welcome <?php echo $name; ?></h1>
			<h2>Request PickUp</h1><br><br>
				<button type="button" class="btn btn-info btn-lg-block w3ls-btn px-4 text-uppercase font-weight-bold" data-toggle="modal" aria-pressed="false" data-target="#LaundryModal">
					PickUp
				</button><br><br>
		</div>


		<div class="row p-5">
			<!-- PREVIOUS LAUNDRY ORDERS -->
			<div class="col-md-12">
				<!-- TABLE HOVER -->
				<div class="panel">
					<div class="panel-heading text-center w-100">
						<h3 class="panel-title my-3">Your Previous Laundry Orders</h3>
					</div>
					<div class="panel-body table-responsive my-3">
						<table class="table table-hover" id="myTable">
							<thead>
								<tr>
									<th>S/N</th>
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Address</th>
									<th>Laundry Items</th>
									<th>Laundry Service</th>
									<th>Pickup Date</th>
									<th>Return Date</th>
									<th>Fee</th>
									<th>Status</th>
								</tr>
							</thead>

							<?php
							$i = 0;
							$sql = "SELECT * from clients WHERE `EMAIL` = '$email' AND `PNUMBER` = '$pnumber' ";

							if (mysqli_query($conn, $sql)) {

								echo "";
							} else {

								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}

							$count = 1;

							$result = mysqli_query($conn, $sql);

							if (mysqli_num_rows($result) > 0) {

								// output data of each row

								while ($row = mysqli_fetch_assoc($result)) {
							?>

									<tbody>
										<tr>
											<td><?php echo ++$i; ?></td>
											<td><?php echo $row['NAME']; ?></td>
											<td><?php echo $row['EMAIL']; ?></td>
											<td><?php echo $row['PNUMBER']; ?></td>
											<td><?php echo $row['ADDRESS']; ?></td>
											<td><?php echo $row['ITEMS']; ?></td>
											<td><?php echo $row['SERVICE']; ?></td>
											<td><?php echo $row['PICKUP']; ?></td>
											<td><?php echo $row['RETURN']; ?></td>
											<td>N<?php echo $row['PAYMENT']; ?></td>
											<td style="text-align:center;"><?php echo $row['STATUS']; ?></td>
										</tr>
									</tbody>
							<?php

									$count++;
								}
							} else {
								echo "</br> You haven't requested any laundry service yet.";
							}

							?>
						</table>
					</div>
				</div>
				<!-- END TABLE HOVER -->
			</div>
		</div>


		<div class="row row-2">
			<!-- PRICE LIST -->
			<div class="col-sm-10">

				<div class="price_list">

					<div class="col-md-12">
						<!-- TABLE HOVER -->
						<div class="panel mb-3">
							<div class="panel-heading">
								<h3 class="panel-title my-4">Laundry Price List<br></h3>
							</div>
							<div class="panel-body table-responsive">
								<table class="table table-hover table-bordered price-table">
									<thead>
										<tr>
											<th>Items</th>
											<th>Wash and Fold</th>
											<th>Iron Only</th>
											<th>Dry Cleaning</th>
										</tr>
									</thead>

									<?php
									$sql = 'SELECT * from prices';

									if (mysqli_query($conn, $sql)) {

										echo "";
									} else {

										echo "Error: " . $sql . "<br>" . mysqli_error($conn);
									}

									$count = 1;

									$result = mysqli_query($conn, $sql);
									if (mysqli_num_rows($result) > 0) {
										while ($row = mysqli_fetch_assoc($result)) {
									?>

											<tbody>
												<tr>
													<td><span class="text-info"><?php echo $row['ITEMS']; ?></span></td>
													<td><span class="text-primary">N<?php echo $row['W-F']; ?></span></td>
													<td><span class="text-warning">N<?php echo $row['IRON']; ?></span></td>
													<td><span class="text-primary">N<?php echo $row['D-C']; ?></span></td>
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
				</div>
			</div>
		</div>

		<div class="text-center w-100">
			<h2 class="my-4">Price Estimator</h2>
			<span>Add Laundry Items to see Estimated Fee</span><br>
			<span>Prices may vary from time to time</span><br><br>
		</div>

		<div class="w-100 d-flex justify-content-around mb-4 estimate-btn-group">
			<button class="btn btn-secondary">Delivery Fee: N<span id="del">200</span>.00
				<button class="btn btn-primary">Laundry Fee: N<span id="LaundryFee">0</span>.00</button>
				<button class="btn btn-warning btn-lg">Estimated Total: N<span id="total">200</span>.00</button>
		</div><br><br>

		<div class="row px-5">
			<!-- PRICE ESTIMATOR -->
				<!--ITEM 1-->
				<div class="col-sm-4">
					<div class="card display"><br><br>
						<div><img src="images/c2.jpg" class="" width="50%" height="50%"></div>

						<span class="item-desc">Women Blouses</span>

						<p class="price">N<span id="unit"><?php $sql = "SELECT * from prices where `ITEMS` = 'Blouses' ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																while ($row = mysqli_fetch_assoc($result)) {
																	echo $row['W-F'];
																}
															}
															?></span>.00</p>
						<span><small>Wash &amp; Fold</small></span><br>

						<p class="quantity">
							<button class="btn btn-danger" id="minus" onclick="minus()">-</button> <span id="input">0</span> added
							<button class="btn btn-info" id="plus" onclick="plus()">+</button>
						</p>
					</div>
				</div>

				<!--ITEM2-->
				<div class="col-sm-4">
					<div class="card"><br><br>
						<div><img src="images/okay/g2.jpg" class="" width="50%" height="50%"></div>



						<span class="item-desc">All Shirts</span>


						<p class="price"> N<span id="unit0"><?php $sql = "SELECT * from prices where `ITEMS` = 'Shirts' ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																while ($row = mysqli_fetch_assoc($result)) {
																	echo $row['W-F'];
																}
															}
															?></span>.00</p>
						<span><small>Wash &amp; Fold</small></span><br>



						<p class="quantity">
							<button class="btn btn-danger" id="minus0" onclick="minus0()">-</button> <span id="input0">0</span> added
							<button class="btn btn-info" id="plus0" onclick="plus0()">+</button>
						</p>
					</div>
					<div class="clear"></div>
				</div>

				<!--ITEM 3-->
				<div class="col-sm-4">
					<div class="card"><br><br>
						<div><img src="images/trousers.jpg" class="" width="50%" height="50%"></div>

						<span class="item-desc">All Trousers</span>

						<p class="price"> N<span id="unit1"><?php $sql = "SELECT * from prices where `ITEMS` = 'Trousers' ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																while ($row = mysqli_fetch_assoc($result)) {
																	echo $row['W-F'];
																}
															}
															?></span>.00</p>
						<span><small>Wash &amp; Fold</small></span><br>


						<p class="quantity">
							<button class="btn btn-danger" id="minus1" onclick="minus1()">-</button><span id="input1">0</span> added
							<button class="btn btn-info" id="plus1" onclick="plus1()">+</button>
						</p>
					</div>
				</div>

				<!--ITEM 4-->
				<div class="col-sm-4">
					<div class="card"><br><br>
						<div><img src="images/w1.jpg" class="" width="50%" height="50%"></div>
						<span class="item-desc">Skirts</span>
						<p class="price">N<span id="unit2"><?php $sql = "SELECT * from prices where `ITEMS` = 'Skirts' ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																while ($row = mysqli_fetch_assoc($result)) {
																	echo $row['W-F'];
																}
															}
															?></span>.00 </p>
						<span><small>Wash &amp; Fold</small></span> <br>

						<p class="quantity">
							<button class="btn btn-danger " id="minus2" onclick="minus2()">-</button> <span id="input2">0</span> added
							<button class="btn btn-info" id="plus2" onclick="plus2()">+</button>
						</p>
					</div>
				</div>

				<!--ITEM 5-->
				<div class="col-sm-4">
					<div class="card"><br><br>
						<div><img src="images/g6.jpg" class="" width="50%" height="50%"></div>

						<span class="item-desc">Children Clothing</span>

						<p class="price"> N<span id="unit3"><?php $sql = "SELECT * from prices where `ITEMS` = 'Children Wears' ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																while ($row = mysqli_fetch_assoc($result)) {
																	echo $row['W-F'];
																}
															}
															?></span>.00</p>
						<span><small>Wash &amp; Fold</small></span><br>


						<p class="quantity">
							<button class="btn btn-danger" id="minus3" onclick="minus3()">-</button><span id="input3">0</span> added
							<button class="btn btn-info" id="plus3" onclick="plus3()">+</button>
						</p>
					</div>
				</div>

				<!--ITEM 6-->
				<div class="col-sm-4">
					<div class="card"><br><br>
						<div><img src="images/g5.jpg" class="" width="50%" height="50%"></div>
						<span class="item-desc">Suits and Blazers</span>
						<p class="price">N<span id="unit4"><?php $sql = "SELECT * from prices where `ITEMS` = 'Suits and Blazers' ";
															$result = mysqli_query($conn, $sql);
															if (mysqli_num_rows($result) > 0) {
																while ($row = mysqli_fetch_assoc($result)) {
																	echo $row['W-F'];
																}
															}
															?></span>.00 </p>
						<span><small>Wash &amp; Fold</small></span> <br>

						<p class="quantity">
							<button class="btn btn-danger " id="minus4" onclick="minus4()">-</button> <span id="input4">0</span> added
							<button class="btn btn-info" id="plus4" onclick="plus4()">+</button>
						</p>
					</div>
				</div>
			
		</div>
	</div>



	<!-- slide -->
	<section class="wthree-row py-sm-5 py-3 slide-bg bg-dark text-left">
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
					<a href="http://w3layouts.com" style="visibility:hidden;"> W3layouts.</a> All Rights Reserved
				</p>
			</div>
			<!-- //copyright -->
		</div>

	</footer>
	<!-- //footer -->

	<!-- order modal -->
	<div class="modal fade" id="LaundryModal" tabindex="-1" role="dialog" aria-labelledby="LaundryModalLabel1" aria-hidden="true" style="text-align:left;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-capitalize" id="LaundryModalLabel1" style="color:white;">Request PickUp <br>
						<small>You pay on Delivery</small><br>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="pickup.php" method="post" class="p-3" enctype="multipart/form-data">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Your Name</label>
							<input type="text" class="form-control" value="<?php echo $name; ?>" placeholder=" " name="name" id="recipient-name" required="">
						</div>
						<div class="form-group">
							<label for="recipient-name1" class="col-form-label">Your Email</label>
							<input type="email" class="form-control" value="<?php echo $email; ?>" placeholder=" " name="email" id="recipient-name1" required="">
						</div>
						<div class="form-group">
							<label for="recipient-name2" class="col-form-label">Phone</label>
							<input type="text" class="form-control" value="<?php echo $pnumber; ?>" placeholder=" " name="pnumber" id="recipient-name2" required="">
						</div>
						<div class="form-group">
							<label class="mr-2 col-form-label">Pick Up</label>
							<input id="datepicker1" name="pickup" type="text" value="mm/dd/yyyy" class="form-control" required="">
						</div>
						<div class="form-group">
							<label class="mr-2 col-form-label">Delivery </label>(Minimum of 2 days interval)
							<input id="datepicker2" name="return" onchange="myfunction();" type="text" value="MM/DD/YYYY" class="form-control" required="">
							<p class="text-danger" id="notice"></p>
						</div>
						<div class="row">
							<div class=" col-sm-4">
								<label for="shirt" class="col-form-label">Shirts</label>
								<input type="number" class="form-control col-md-6" name="shirts">
							</div>
							<div class=" col-sm-4">
								<label for="shirt" class="col-form-label">Trousers</label>
								<input type="number" class="form-control col-md-6" name="trousers">
							</div>
							<div class=" col-sm-4">
								<label for="shirt" class="col-form-label">Children</label>
								<input type="number" class="form-control col-md-6" name="children">
							</div>
						</div>
						<div class="row">
							<div class=" col-sm-4">
								<label for="shirt" class="col-form-label">Blouses</label>
								<input type="number" class="form-control col-md-6" name="blouses">
							</div>
							<div class=" col-sm-4">
								<label for="shirt" class="col-form-label">Skirts</label>
								<input type="number" class="form-control col-md-6" name="skirts">
							</div>
							<div class=" col-sm-4">
								<label for="shirt" class="col-form-label">Suits</label>
								<input type="number" class="form-control col-md-6" name="suits">
							</div>
						</div>
						<label><b>Choose Service Type</b>
							<div class="form-check">
								<label class="form-check-label col-form-label" for="l1">
									<input type="radio" name="service" class="form-check-input" value="Wash and Fold" id="l1">Wash & Fold
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label col-form-label" for="l2">
									<input type="radio" name="service" class="form-check-input" value="Only Iron" id="l2">Only Iron
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label col-form-label" id="l3">
									<input type="radio" name="service" class="form-check-input" value="Dry Clean" id="13">Dry Clean
								</label>
							</div>
						</label>
						<div class="form-group">
							<label for="comment" class="col-form-label">Pickup Address:</label>
							<input class="form-control" rows="4" id="comment" name="address" value="<?php echo $address; ?>">
						</div>

						<div class="right-w3l">
							<input type="submit" name="submit" class="form-control" value="pick my laundry">
						</div><br>
						You can always track your laundry status in "Services"
					</form>

				</div>
			</div>
		</div>
	</div>
	<!-- //order modal -->


	<!-- js-->
	<script src="js/jquery-2.2.3.min.js"></script>
	<script src="js/price_estimate.js"></script>
	<!-- js-->
	<!-- Banner text Responsiveslides -->
	<script src="js/responsiveslides.min.js"></script>
	<script>
		// You can also use "$(window).load(function() {"
		$(function() {
			// Slideshow 4
			$("#slider3").responsiveSlides({
				auto: true,
				pager: true,
				nav: false,
				speed: 500,
				namespace: "callbacks",
				before: function() {
					$('.events').append("<li>before event fired.</li>");
				},
				after: function() {
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
		jQuery(document).ready(function($) {
			$(".scroll ").click(function(event) {
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
		$(document).ready(function() {
			/*
			 var defaults = {
				 containerID: 'toTop', // fading element id
				 containerHoverID: 'toTopHover', // fading element hover id
				 scrollSpeed: 1200,
				 easingType: 'linear' 
			 };
			 */

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
		jQuery(function($) {
			$(".swipebox").swipebox();
		});
	</script>
	<script src="js/jquery.adipoli.min.js"></script>
	<!-- effect -->
	<script>
		$(function() {
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
		$(function() {
			$("#datepicker1,#datepicker2").datepicker();
		});
	</script>
	<!-- // Date picker -->
	<!-- testimonials -->
	<link href="css/owl.carousel.css" rel="stylesheet">
	<script src="js/owl.carousel.js"></script>
	<script>
		$(document).ready(function() {
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
		function myfunction() {
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

			if (okay > select) {
				document.getElementById("notice").innerHTML = "Please give at least 2 days interval for optimum service"
			}

			if (okay <= select) {
				document.getElementById("notice").innerHTML = ""
			}



		}
	</script>


</body>

</html>