<?php

	/*
		buy.php
				?view=business
				?view=premium
	*/
	
	include "functions.php";
	
	if (isset($_GET['buy'])) //if decided to buy listing, take you to pay.php
	{
		$product = $_GET['buy'];
		$id = isset($_SESSION['id']) ? $_SESSION['id'] : -1;
		$cid  = isset($_SESSION['cid']) ? ($_SESSION['cid']): -1;
		
		if ($id > 0 && $cid > 0) // more than 0 as admin is 0, and admin cant purchase his own products
		{
			header("location: pay.php?product=" . $product);
		}
		else
		{
			//error :: session not set :: not logged in
			header("location: buy.php?session_error");
		}
	}
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

			//VISUAL GLITCH FIXES
			$page = "buy";
			include_once "nav.php";

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
			//depending on what product you view, decides what funcion is called
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