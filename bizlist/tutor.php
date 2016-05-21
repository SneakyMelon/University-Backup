
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
			$page = "tutor";
			include_once "nav.php";
		?>
		
		<section id="about">
			<div class="container">
				<div class="row buffer-top">
					<div class="col-lg-12 text-center">
						<h2>Bobs Merchant - 0706008</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row buffer-top">
				  <div class="col-lg-8 col-lg-offset-2 text-left">
						<p style="color: #18bc9c; font-weight: bold;">	Summary of tables used in the Database and a link to the Admin functions with a note of the Admin User Name and password.
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 text-left">
						<p>
							<b>Admin Credentials</b><br>
							<b>Username:</b> pw1@test.account.com<br>
							<b>Password:</b> pw<br>
							<b>Admin Page: </b><a href="admin.php">Admin Page</a> || <b>Session error :: </b><a href="login.php">Admin Page</a>
						</p>
					</div>
				</div>
				
				<div class="row buffer-top">
				  <div class="col-lg-8 col-lg-offset-2 text-left">
						<p>	
							<b>Database Credentials</b><br>
							<b>Username:</b> sql0706008<br>
							<b>Password:</b> qOJdFuXG<br>
							<b>PHPMYADMIN </b><a href="https://phpmyadmin.abertay.ac.uk/phpmyadmin/">phpmyadmin login</a> 
						</p>
					</div>
				</div>
				<div class="row buffer-top">
				  <div class="col-lg-8 col-lg-offset-2 text-left">
						<p>	<b>Summary of tables used in the Database and a link to the Admin functions with a note of the Admin User Name and password.</b>
						</p>
					</div>
				</div>
				<div class="row buffer-top">
				  <div class="col-lg-8 col-lg-offset-2 text-left success">
						<p>
							In my Datebase, I have created a <b>Users</b> , <b>Company</b>, <b>userOwnsCompany</b>, <b>Payment</b>, and a <b>Listings</b> table.
						</p>
						<p>
							These tables are in third normal form, as no repeated values are recorded, each is separated into its own relevant table and connected 
							via unique identifiers. I have also set the DB up so that some values have default values when set up, eg creating new values. Examples can
							include the zero-fill for the SVC details, and default users to be set as non-admins. I have also tried to apply PDO::PARAM types to input
							where I can to ensure the right type of values are being inserted into the database.<br>
						</p>
						<p>
							To summaring the tables I have made, I'll start with the users table and go down. The Users Table stores the ID unique to the user, their 
							user name (as an email), a password, and their user level (default:: 0, Admin:: 1).
						</p>
						<p>
							The Company Table stores the information stored on the company, that is used to promote it through the listings. This is done by storing the ID,
							name, description, type of company, website, join date, and an image that can be uploaded. This is all collected when signing the registration form.
						</p>
						<p>
							The userOwnsCompany table is the connection between the users, and the company, as each user must belong to a company. This table stores the userOwnsCompany_id
							as well as the user_id from the users table, that corresponds to the company_id in the company table.
						</p>
						<p>
							The Payment table stores the Payment Information - as normal, has a unique ID, this table essentially the card details - the name of the person who paid for it, 
							the card number (if starting with 99), address, SVC number, expiry details, (month and year, uses auto-zero to fill an INT value 48 to 048 for the 3 digit constraint 
							on the data, the product they just bought (premium V business), and the date they bought it (used to determine 4 premium displays).
						</p>
						<p>
							Finally, I have a listings table, that holds a listing_id unique ID, the payment ID used to pay for this listing (card details, who paid, etc), the userOwnsCompany
							ID to determine which company the user works with), and then if the listing has been authorised or not, using the 1 for yes, and 0 for no values.
						</p>
					</div>
				</div>
			</div>
		</section>			
		<?php
			include_once "footer.php";
		?>
	</body>
</html>
