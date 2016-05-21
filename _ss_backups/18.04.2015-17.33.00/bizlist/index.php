
	<!-- 
		Template from : 
				http://ironsummitmedia.github.io/startbootstrap-freelancer/ 
				http://bootstrapzero.com/
				https://onepagelove.com/freelancer
				http://startbootstrap.com/template-overviews/freelancer/
		
		Usage: 
				Freelance is a free to use, open source Bootstrap theme created by Start Bootstrap.
		
		About:	
				Freelancer is a free bootstrap theme created by Start Bootstrap. The download includes the 
				complete source files including HTML, CSS, and JavaScript as well as optional LESS s
				tylesheets for easy customization.

				Whether you're a student looking to showcase your work, a professional looking to attract clients,
				or a graphic artist looking to share your projects, this template is the perfect starting point!
				
		Notes: 
				edited by Allan Davidson, for the module Server Sided Programming, year 3, Abertay University, Dundee.
		
	-->

	<?php
		include "functions.php";
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php
			$title = "Bob's Merchant Listings";
			include_once "header.php";
		?>
	</head>
	<body id="page-top" class="index">
		<?php 
			$page = "index";
			include_once "nav.php";
		?>
		<header>
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<img class="img-responsive" src="img/profile.png" alt="">
						<div class="intro-text">
							<span class="name">Trusted Traders</span>
							<hr class="star-light">
							<span class="skills">Listings -  Growth -  Profit</span>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>About Bob's Merchants</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 text-left">
						<p>
							Grow your business today with out Basic Listing package. Basic listings allow companies to advertise
							themselves, with proven results, Growth, and Profit.
						</p>
					</div>
				</div>
				<div class="row buffer-top">
				  <div class="col-lg-8 col-lg-offset-2 text-left">
						<p>	Grow your business with a Premium Listing package. Premium listings are verified traders,
							that offer consistent, high quality work.
						</p>
					</div>
				</div>
			</div>
		</section>		
		<!-- About Section -->
		<section class="success" id="listings">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Premium Business Listings</h2>
						<hr class="star-light">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-lg-offset-2 text-left">
						<p>
							Grow your business today with out Basic Listing package. Basic listings allow companies to advertise
							themselves, with proven results, Growth, and Profit.
						</p>
					</div>
					<div class="col-lg-4 text-center">
						<a href="buy.php?view=business" class="btn btn-lg btn-outline">
							<i class="fa fa-download"></i> Listings from £10/week
						</a>
					</div>
				</div>
				<div class="row buffer-top">
				  <div class="col-lg-4 col-lg-offset-2 text-left">
						<p>	Grow your business with a Premium Listing package. Premium listings are verified traders,
							that offer consistent, high quality work.
						</p>

					</div>
					<div class="col-lg-4 text-center">
						<a href="buy.php?view=premium" class="btn btn-lg btn-outline">
							<i class="fa fa-download"></i> Premium from £50/week
						</a>
					</div>
				</div>
			</div>
		</section>
		<?php
			include_once "listings.php";
			include_once "footer.php";
		?>
	</body>
</html>
