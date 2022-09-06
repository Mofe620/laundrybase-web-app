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
	<link href="css/style.css?v=<?php echo time(); ?>" rel='stylesheet' type='text/css' />
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
			<nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="index.php">
					<i class="fab fa-empire"></i><h1>LaundryBase</h1>
				</a>
				<button class="navbar-toggler ml-md-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				    aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mx-auto text-center">
						<li class="nav-item ">
							<a class="nav-link" href="index.php">Home
							</a>
						</li>
						<li class="nav-item dropdown mr-3">
							<a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
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
						<li class="nav-item active  mr-3">
							<a class="nav-link" href="contact_us.php">Contact Us
							<span class="sr-only">(current)</span>
							</a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- //header -->
	
	<!--start carousel-->
	
	  <div id= "slide" class= "carousel slide" data-ride="carousel">
	  <!---->
	  <ul class="carousel-indicators">
	    <li data-target="#slide" data-slide-to="0" class="active"></li>
		<li data-target="#slide" data-slide-to="1" class="active"></li>
		<li data-target="#slide" data-slide-to="2" class="active"></li>
		<li data-target="#slide" data-slide-to="3" class="active"></li>
	  </ul>
	  
	  <!--slideshow-->
	  <div class="carousel-inner">
	    <div class="carousel-item active">
		   <img src="images/g2.jpg" width="100%">
		</div>
		<div class="carousel-item">
		   <img src="images/g3.jpg" width="100%">
		</div>
		<div class="carousel-item">
		   <img src="images/g8.jpg" width="100%">
		</div>
		<div class="carousel-item">
		   <img src="images/g9.jpg" width="100%">
		</div>
	   </div>
	   
	   <!--left and right controls-->
	   <a class="carousel-control-prev" href="#slide" data-slide="prev">
	       <span class="carousel-control-prev-icon"></span>
	   </a>
	   <a class="carousel-control-next" href="#slide" data-slide="next">
	       <span class="carousel-control-next-icon"></span>
	   </a>
	  </div>
	  
	  <!--//end of carousel-->
   
   <!-- contact -->
   
	<section class="wthree-row py-5 w3-contact" id="contact">
		<div class="container py-md-5">
			<h3 class="w3ls-title text-center text-capitalize pb-md-5 pb-4">contact us</h3>
			 <p>At LaundryBase, we promise a fantastic laundry experience. Premium Quality, Affordability and Respect for All are the Hallmarks of our services. Feel free to contact us and we promise you won't regret your decision.</p>
			 <p class="" >Fill the form below and we'll be sure to get back to you. Cheers!
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
							<input type = "submit" class=" btn btn-info" value="Send">
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
				<h5 class="agile-title text-capitalize pt-4">Give us a try, Get your Clothings a new lease of life.</h5>
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
			<div class="fv3-contact cpy-right text-center pt-5">
				<p>© 2018 LaundryBase. 
					<a href="http://w3layouts.com" style="visibility:hidden;"> W3layouts.</a>All Rights Reserved
				</p>
			</div>
			<!-- //copyright -->
		</div>
	</footer>
	<!-- //footer -->
	
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
				autoPlay: false,
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
	
</body>

</html>