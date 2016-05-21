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

			$page = "view";
			include_once "nav.php";
		?>
		
		<?php
		//visual glitches fix
			$bg = "success";
			$buffer = true;
			
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
						//paginate the resutlts
						
						//if page isnt defined, define it as 1 :: set default
						$pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
						$perPage = 4;
						
						paginate($pageNumber, $perPage);
					?>
				</div>
			</div>
		</div>
	</section>
	
					
					
		<!-- PREMIUM full-page include data (included in footer) -->
		<?php
			include_once "footer.php";
		?>

	</body>
</html>