<?php

	/*
		buy.php
				?view=business
				?view=premium
	*/
	include "functions.php";
	
	if (isset($_GET['buy']))
	{
		$product = $_GET['buy'];
		$id = isset($_SESSION['id']) ? $_SESSION['id'] : -1;
		//$cid = null;
		
		if ($id > 0) //logged in
		{
			//DB_CONNECT, get company_ID from userOwnsCompany
			//works up to here
			
			$servername	 = "lochnagar.abertay.ac.uk";
			$username	 = "sql0706008";
			$password	 = "qOJdFuXG";
			$dbname 	 = "sql0706008";
	
			try 
			{
				//database connection with credentials
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
				//$conn->beginTransaction();
				
				$sql = "SELECT company_id FROM userOwnsCompany
						WHERE user_id = ?";
				
				$result = $conn->prepare($sql);
				
				$result->bindParam(1, $id, PDO::PARAM_INT);
				
				$result->execute();		
				//$conn->commit();	
				
				if($result->rowCount() > 0) //logged in
				{
					$row = $result->fetch(PDO::FETCH_ASSOC);
					$cid = $row['company_id'];
					
					header("location: pay.php?UID=" . $id . "&CID=" . $cid. "&product=" . $product );
				}
				else
				{
					//ERROR :: incorrect USER_ID in userOwnsCompany
					
					echo "cid: $cid and id: $id";
					
				}	
			}
			//catch any errors
			catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}	
			
			$conn = null;	
		}	
		else
		{
			//error :: session not set :: not logged in
			header("location: /bizlist/buy.php?session_error");
		}
	}
?>

<!DOCTYPE html>
	<html lang="en">

	<head>
		<?php
			$title = "Buy Bob's Listings";
			//include_once "header.php";
		?>
		
	</head>

	<body id="page-top" class="index">

		<?php 

			$page = "buy";
			//include_once "nav.php";
		?>
		
		<?php
			$bg = "success";
			$buffer = true;
			
			//include_once "listings.php";
		
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
			//include_once "footer.php";
		?>

	</body>
</html>