<?php
	include "functions.php";
?>

<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php
			$title = "Search Bob's Listings";
			include_once "header.php";
		?>
		
	</head>
	<body id="page-top" class="index">

		<?php
			$page = "view";
			include_once "nav.php";
			//colour glitch
			$bg = "success";
			$buffer = true;
			
			//include premium listings
			include_once "listings.php";
		?>	
	<section class="" id="business">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<h2>View our Trusted Business Traders</h2>
					<?php
					//draw <HR />
						drawHR($c = "primary", $page);
					?>
				</div>
			</div>
		</div>
		<div class="container">
			<?php
				//add search bar
				searchBar();
			?>
			<div class="row buffer-top">
				<div class="col-lg-12 text-center">
					<?php
					//add search function
						search();
					?>
				</div>
			</div>
		</div>
	</section>
		<?php
		//add footer to page
			include_once "footer.php";
		?>
	</body>
</html>