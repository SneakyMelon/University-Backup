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

			//$page
			include_once "nav.php";
		?>
		
		
		<!-- 

				BODY CONTENT
				
		-->
		
		
		<?php
			//$bg; 			//	success || ""
			//$buffer;		// 	   true || false
			include_once "listings.php";
		?>		
					
					
		<!-- PREMIUM full-page include data (included in footer) -->
		<?php
			include_once "footer.php";
		?>

	</body>
</html>