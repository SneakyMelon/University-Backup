<!-- select DISTINCT *
	from 
	(listings l
LEFT JOIN userOwnsCompany u
on l.user_owns_company_id = u.userOwns_id)
LEFT JOIN payment p ON p.payment_id = l.payment_id
LEFT JOIN company c on u.company_id = c.company_id
WHERE authorised = 1
AND listing_id = 9
ORDER BY p.date
ASC-->

<?php
		include "functions.php";
	?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<?php
			$title = "Bob's Busienss Listings";
			include_once "header.php";
		?>
	</head>
	<body id="page-top" class="index">
		<?php 
			$page = "business";
			include_once "nav.php";

			$bg = "success";
			$buffer = true;
			
			include_once "listings.php";
		?>	
		
		
		<section id="about">
			<div class="container">
				<?php
					try 
					{
					
						//view the individual businesses, when you click a premium or business listing_id
						//it will take you here
						$view = $_GET['view'];
						
						if (isset($view))
						{
							$conn = DB_CONNECT();
							
							$sql = 	"select DISTINCT *
										from 
										(listings l
										LEFT JOIN userOwnsCompany u
										on l.user_owns_company_id = u.userOwns_id)
										LEFT JOIN payment p ON p.payment_id = l.payment_id
										LEFT JOIN company c on u.company_id = c.company_id
											 WHERE authorised = 1 
											 AND p.product <> ''
											 AND listing_id = ?
										ORDER BY p.date
										ASC";
												
							$result = $conn->prepare($sql);
							
								$result->bindParam(1, $view);
							
							$result->execute();		
							
								$row = $result->fetch(PDO::FETCH_ASSOC);
						
							$img = $row['image'];
							$cn  = $row['company_name'];
							$cd  = $row['company_description'];
							$ct  = $row['company_type'];
							$cu  = $row['company_website'];
							$cjd = $row['company_join_date'];
					

						//BELOW:: display the listing
					?>

					<div class="col-lg-8 col-lg-offset-2" style="color: #2c3e50;">
						<div class="modal-body">
								
							<?php echo '<h2 class="text-center">' . $cn. '</h2>'; ?>
							
							<hr class="star-primary">
						</div>
						<div class="row">
							<?php echo '<img src="' . $img . '" class="img-responsive img-centered" alt="">';  ?>
						</div>
						<div class="row">						
							<?php echo '<p class="modal-body text-center">' . $cd . '</p>';?>
						</div>	
							
						<div class="row center-block">		
							<ul class="list-inline item-details">
								<li class="col-lg-4 text-center">Website: <br>
								
									<?php echo '<strong>' . $cu. '</strong>'; ?>
									
								</li>
								<li class="col-lg-4 text-center">Join Date:<br>
								
									<?php echo '<strong>' . $cjd . '</strong>'; ?>
									
								</li>
								<li class="col-lg-4 text-center">Merchant Type:<br>
									<strong>
										<?php echo $ct; ?>
									</strong>
								</li>
							</ul>
						</div>
					</div>
					
			</div>
		</section>
		<?php			
						}
					}
					catch (PDOException $e)
					{
						echo "Connection failed: " . $e->getMessage();
					}
			include_once "listings.php";
			include_once "footer.php";
		?>
	</body>
</html>