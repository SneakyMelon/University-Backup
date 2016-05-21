<?php

	/*
		buy.php
				?view=business
				?view=premium
	*/
	include "functions.php";
?>

<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php
			$title = "Buy Bob's Listings";
			include_once "header.php";
		?>
		
	</head>

	<body id="page-top" class="index">

		<?php 

			$page = "buy";
			include_once "nav.php";
		?>
		
		<?php
			$bg = "success";
			$buffer = true;
			
			include_once "listings.php";
		
		$view = null;
		
		if (isset($_GET['view']))
		{
			$view = $_GET['view'];
		}
		?>	
		
		
	<section class="" id="view">
		<div class="container">

			<?php 
				switch ($view) 
				{
					case "business":
							drawBusiness();
							break;
					case "premium":
							drawPremium();
							break;
					default:
							drawBusiness();
							drawPremium();
							break;
				}
			 ?>	
		</div>
	</section>
			
		
		<!-- PREMIUM full-page include data (included in footer) -->
		<?php
			include_once "footer.php";
		?>

	</body>
</html>