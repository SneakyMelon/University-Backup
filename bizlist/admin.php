
	<?php
		include "functions.php";
		
		//gets user_level of session, or if no session, sets it as -1
		$isAdmin   = isset($_SESSION['user_level'])  ? $_SESSION['user_level'] : -1;
	
	if ($isAdmin != 1) //admin level is 1 as set in DB
	{
		//log error that invalid session -- if someone types in admin.php into website
		echo "ERROR:__SESSION<br />Permission Denied :: Invalid Session";
		
	}
	else
	{
		//updating records, if admin accepts pending values 
		$list_id   = isset($_GET['lid'])     ? $_GET['lid'] : -1;
		$action    = isset($_GET['action'])  ? $_GET['action'] : -1;
		$sql       = null;
		

		if ($list_id > 0 && action != "")
		{
			try //update the DB with the  now authoirsed listing
			{
				$sql = "UPDATE listings
							SET authorised = 1
							WHERE listing_id = ?";
				
				$conn = DB_CONNECT();
			
				$result = $conn->prepare($sql);
				
				$result->bindParam(1, $list_id, PDO::PARAM_INT);
				$result->execute();			

			}
			//catch any errors
			catch(PDOException $e)
			{
				echo "Connection failed: " . $e->getMessage();
			}	
		$conn = null;
		}	
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php
			$title = "Bob's Listings :: ADMIN";
			include_once "header.php";
		?>
	</head>
	<body id="page-top" class="index">
		<?php 
			$page = "admin";
			include_once "nav.php";
		?>
		
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center buffer-top">
						<h2>Admin Page</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 text-left">
						<p>
							Welcome <br>
							Here you can view pending transactions and listings ready
							to be added to the website, as well as tracks current payments.							
						</p>
					</div>
				</div>
			</div>	
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Premium Transactions</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row buffer-top">
					<div class="col-lg-12 text-left">
						<?php
							//draws table with premium
							adminPanel("premium");
						?>
					</div>
				</div>
			</div>	
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Business Transactions</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 text-left">
						<?php
							//draws table with business
							adminPanel("business");
						?>
					</div>
				</div>
			</div>	
		</section>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Payments</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12 text-left">
						<?php
							//draws table with payments
							drawPayments();
						?>
					</div>
				</div>
			</div>
		</section>
		<?php
			//include_once "listings.php";
			include_once "footer.php";
		?>
	</body>
</html>
<?php
	}
?>
