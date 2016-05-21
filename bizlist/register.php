	<?php
		ini_set("display_errors", 1);
		error_reporting(E_ALL);
	
		$page = "register";
		
		include "functions.php";
		

			//if the user tried to register, but was unsuccessfull use the info here to repopulate the boxes
		
			//$_SESSION['from_info'] = array();
			$user 		= $_SESSION['from_info']["username"];	//username
			$company 	= $_SESSION['from_info']["company"];	//company name
			$desc 		= $_SESSION['from_info']["desc"];	//company description
			$url 		= $_SESSION['from_info']["url"];	//website URL
			$type		= $_SESSION['from_info']["type"]; 	//company type
			$img 		= null;
			
	if ($_SERVER['REQUEST_METHOD'] == 'POST') 	
	{
		//image upload
		
		//get the image file extension
		$temporary = explode(".", $_FILES["cp"]["name"]);
		$file_extension = end($temporary);
	
		//array of valid extensions
		$validextensions = array("jpeg", "jpg", "png");
		
		$un = $_POST['un']; //username
		$pw = $_POST['pw']; //password
		$cn = $_POST['cn']; //company name
		$cd = $_POST['cd']; //company description
		$wu = $_POST['wu']; //website URL
		$ct = $_POST['ct']; //company types [separate by comma, or semi-colon?]
							//later implementation???
	
		//update the session to the new form submission
				
		$_SESSION['from_info']["username"] = $un;	//username
		$_SESSION['from_info']["company"] = $cn;	//company name
		
		$_SESSION['from_info']["desc"] 	= $cd;	//company description
		$_SESSION['from_info']["url"] 	= $wu;	//website URL
		$_SESSION['from_info']["type"]	= $ct; 	//company type
	
		//check if valid input
		if (   ($_FILES["cp"]["type"] == "image/png" || 
				$_FILES["cp"]["type"] == "image/jpg" || 
				$_FILES["cp"]["type"] == "image/jpeg") &&
				$_FILES["cp"]["size"] < 100000 &&
				in_array($file_extension, $validextensions))
		{
			if ($_FILES["cp"]["error"] > 0) 
			{
				//display error
				echo "Return Code: " . $_FILES["cp"]["error"] . "<br/><br/>";
			}
			else
			{
				//upload image
			
				//http://stackoverflow.com/questions/19017694/1line-php-random-string-generator
				$ran_string = substr("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ", mt_rand(0, 50 ) ,1 ) . substr( md5(time()), 1);
				
				$file_name = $ran_string  . "." . $file_extension;
				move_uploaded_file($_FILES["cp"]["tmp_name"], "uploads_" . $file_name);
				
				$img = "uploads_" . $file_name;
			
				
			
				try 
				{
					//database connection with credentials
					$conn = DB_CONNECT();
					
					$conn->beginTransaction();

					date_default_timezone_set('Europe/London');
					$date = date('Y-m-d');
					
						$user_id	= null;
						$company_id	= null;
									
					
					/* 
						*** ****** ****** ***** ******* ****** **** ***** 
										insert into	company
						*** ****** ****** ***** ******* ****** **** ***** 
					*/
					
					$sql = "INSERT INTO company (company_id,
												company_name,
												company_description,
												company_type,
												company_website,
												company_join_date,
												image)
							VALUES(?,?,?,?,?,?,?)";
					
					$statement = $conn->prepare($sql);
					
					$statement->bindParam(1, $id, PDO::PARAM_INT);
					$statement->bindParam(2, $cn, PDO::PARAM_STR);
					$statement->bindParam(3, $cd, PDO::PARAM_STR);
					
					$statement->bindParam(4, $ct, PDO::PARAM_STR);
					
					$statement->bindParam(5, $wu, PDO::PARAM_STR);
					$statement->bindParam(6, $date,PDO::PARAM_STR);
					$statement->bindParam(7, $img, PDO::PARAM_STR);
						$statement->execute();
					
					$company_id = $conn->lastInsertId();

					/* 
						*** ****** ****** ***** ******* ****** **** ***** 
									insert into		users
						*** ****** ****** ***** ******* ****** **** ***** 
					*/
					
					$sql = "INSERT INTO users (email,password) VALUES(?,?)";		
					$statement = $conn->prepare($sql);
					
					$statement->bindParam(1, $un, PDO::PARAM_STR);
					$statement->bindParam(2, $pw, PDO::PARAM_STR);
						$statement->execute();
					
					$user_id = $conn->lastInsertId();
					
					/* 
						*** ****** ****** ***** ******* ****** **** ***** 
										insert into	userOwnsCompany
						*** ****** ****** ***** ******* ****** **** ***** 
					*/
										
					$sql = "INSERT INTO userOwnsCompany (user_id, company_id) VALUES (?,?)";
					$statement = $conn->prepare($sql);			
					
					$statement->bindParam(1, $user_id, PDO::PARAM_INT);
					$statement->bindParam(2, $company_id, PDO::PARAM_INT);
						$statement->execute();

					//commit transaction
					$conn->commit();
				}
				//catch any errors
				catch(PDOException $e)
				{
					//error fallback
					echo "Connection failed: " . $e->getMessage();
					$conn->rollback();
				}	
					
				$conn = null;
				//navigate user to login page now they are registered
				header("location: login.php?registered");
			}
		}
		else 
		{
			//if errors, take them back to re fill out the form keeping the data input already
			//excluding password and image
			$_SESSION['form_errors'] = true;				
			header("location: register.php#register");
		}
	} //END IF SERVER TYPE POST
	else
	{
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
			include_once "nav.php";
		?>
		
		<?php
			//green background if defined, white otherwise
			$bg = "success";
			$buffer = true;
			
			include_once "listings.php";
		?>	

		
		<!-- Contact Section -->
		<section class="" id="register">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<h2>Register Your Interest</h2>
						<hr class="star-primary">
					</div>
				</div>
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2">
						<!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
						<!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
						<form enctype="multipart/form-data" name="" id="" novalidate action = "register.php" method ="POST">
						

						   <div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Email Address</label>
									<input <?php echo 'value= "' . $user . '"' ?> type="email" name="un" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
								<?php	
									if ($user == ""){
										echo '<p class="help-block text-danger">Please enter your Email address.</p>';
									}
								?>	
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Password</label>
									<input type="password" name="pw" class="form-control" placeholder="Password" id="password" required data-validation-required-message="Please enter a memorable password.">
								<?php		
									echo '<p class="help-block text-danger">Please enter a secure password.</p>';
								?>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Company Name</label>
									<input <?php echo 'value= "' . $company . '"' ?> type="text" name="cn" class="form-control" placeholder="Company Name" id="company" required data-validation-required-message="Please enter your company name.">
								<?php	
									if ($company == ""){
										echo '<p class="help-block text-danger">Please enter your company name.</p>';
									}
								?>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Company description</label>
									<input <?php echo 'value= "' . $desc . '"' ?> type="text" name="cd" class="form-control" placeholder="Company Description" id="description" required data-validation-required-message="Please enter your company description.">
								<?php	
									if ($desc == ""){
										echo '<p class="help-block text-danger">Please enter a description for your company.</p>';
									}
								?>
								</div>
							</div>
							
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Company URL</label>
									<input <?php echo 'value= "' . $url . '"' ?> type="url" name="wu" class="form-control" placeholder="Website URL" id="url" required data-validation-required-message="Please enter your company website.">
								<?php	
									if ($url == ""){
										echo '<p class="help-block text-danger">Please enter your website address.</p>';
									}
								?>
								</div>
							</div>

							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>Merchant type</label>
									<input <?php echo 'value= "' . $type . '"' ?> type="text" name="ct" class="form-control" placeholder="Company Type: plumbing, gaming, joineery, etc." id="type" required data-validation-required-message="Please enter what your company sells.">
								<?php	
									if ($type == ""){
										echo '<p class="help-block text-danger">Please enter the type of business you run.</p>';
									}
								?>
								</div>
							</div>
							<div class="row control-group">
								<div class="form-group col-xs-12 floating-label-form-group controls">
									<label>File Upload</label>
									<input type="file" name="cp" class="form-control" id="upload" required data-validation-required-message="Please enter a image representation of your company.">
								<?php			
									echo '<p class="help-block text-danger">Please enter an image that describes your company (Max 100kB).</p>';
								?>
								</div>
							</div>
							
							<div id="preview">
								<img id="previewimg" src=""><img id="deleteimg" src="delete.png">
								<span class="pre">IMAGE PREVIEW</span>
							</div>

							
							<br> <!-- todays date, website, description, company type (plumber, game merchant, electrician...) -->
							<div id="success"></div>
							<div class="row">
								<div class="form-group col-xs-12">
									<button type="submit" class="btn btn-success btn-lg text-center center-block">Register a New Account</button>
								</div>
							</div>
							
						</form>
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
<?php 
	} 
?>