
<?php
	
	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	
	echo "<p>Connecting...</p>";
	$con = mysqli_connect("lochnagar.abertay.ac.uk", //server
								 "sql0706008", 				//server username
								 "SF0zchbv", 				//server password
								 "sql0706008");				//database to query

	if(mysqli_connect_errno())
	{	
		echo "<p>Failed to connect to database. Please try again or contact system admin.</p>";
		echo "<p>Error number: " . mysqli_connect_error() . "</p>";
		exit();
	}

	echo "<p>Connected.........</p>";

	/*$sql=  "SELECT *
			FROM db_subscribe
			WHERE email = 'two@gmail.com'";
		
		http://uk3.php.net/manual/en/mysqli-result.num-rows.php			
		if ($result = mysqli_query($con, $sql)) {

			 determine number of rows result set 
			$row_cnt = mysqli_num_rows($result);

			printf("Result set has %d rows.\n", $row_cnt);

			/* close result set 
			mysqli_free_result($result);
		} */

	if(isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email']))
	{
		$valid = true; //assume true, until otherwise stated
		
		$name  = mysql_escape_string($_POST['name']); 
		$email = mysql_escape_string($_POST['email']); // escapes characters such as ' :: Mark's = Mark\'s
		
		$name = mysql_escape_string($_POST['name']);
		$email = mysql_escape_string($_POST['email']);

		//if (!eregi("^[a-zA-Z ]+$", $name))
		/*
			regexpression:
				/ indicates start of expression
				^ indicates start of line
				[ ] indicates section being evaluated
				"a-zA-z " indicates lower case, upper case and spaces are allowed
				+ indicates that 1 or more of these[ ] sections are allowed
				$ indicates the end of the line
		*/
		$regex_name = "/^[a-zA-Z ]+$/";
		
		/*
			regexpression_email:
				/ indicates start of expression
				^ indicates start of line
				
				[ ] indicates section being evaluated (underscores, a-z lower case, 0-9 numbers allowed, hyphens allowed)
				+ indicates that 1 or more of these[ ] sections are allowed
				
				\.  full stops allowed, being breaked up with \ special char.
				*@ means 0 or 1 of @
				
				followed by any letters or numbers
				a full stop
				
				and [a-z]{2,3}) indicates max 2 or 3 length, a-z letters (.au, .ch, .com, etc)
				
				$ indicates the end of the line
		*/

		$regex_email= "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		
		if(!preg_match($regex_name, $name))
		{
			echo "<p>Incorrect name combination. Only the letters A-Z, a-z, and spaces are allowed.</p>";
			$valid = false;
		}
		//RegExp that allows xxx@xxx.xxx
		
		if(!preg_match($regex_email, $email))
		{
			echo "<p>Incorrect Email combination. You must have some text followed by an '@', and an address, such as hotmail.com, or gmail.com.</p>";
			$valid = false;
		}

		if (!$valid) //if not valid, show back button and exit;
		{
			echo "<a href='javascript:window.history.back()'>Go back</a>";
			exit; //if not valid, alert user why and stop script below;
		} 
		else //if email and name are valid, continue with script to further validation
		{
			$sql=  "SELECT *
					FROM db_subscribe
					WHERE email = '$email'";
			
			//http://uk3.php.net/manual/en/mysqli-result.num-rows.php			
			if ($result = mysqli_query($con, $sql)) 
			{
				//determine number of rows result set 
				$row_cnt = mysqli_num_rows($result);

				printf("Result set has %d rows.\n", $row_cnt);

				if ($row_cnt > 0)
				{
					echo "<p>This email already exists.</p>";
					echo "<p>Email: " . $email . "</p>";
					exit;
				}
				else //if row_cnt = 0, passes validation test, continue to further evaluation (unique ID)
				{
					$loop = true;
					while ($loop) //available - true
					{
						//prevents two unique ID's being chosen for different people
						$UID = mt_rand(); //better PHP randomiser
						$sql=  "SELECT *
								FROM db_subscribe
								WHERE UID = '$UID'";

						if ($result = mysqli_query($con, $sql))
						{
							$row_cnt = mysqli_num_rows($result);
							printf("Result set has %d rows.\n", $row_cnt);
							
							if ($row_cnt > 0)
							{
								$loop = true; //re-do loop for another random UID;
							}
							else
							{
								date_default_timezone_set('Europe/London');
								$loop = false;
								
								$d = date('Y-m-d');
								$t = date('H:i:s');

								$sql = "INSERT INTO `sql0706008`.`db_subscribe` (`UID`, `email`, `name`, `signupDate`, `time`) VALUES ('$UID', '$email', '$name', '$d', '$t')";
							
								echo "<p>Date:" . $d ."</p>";
								echo "<p>Time:" . $t ."</p>";
								echo "<p>Thank you for joining our Newsletter. You will recieve our next letter within the next couple of weeks.</p>";
								
								mysqli_query($con, $sql);
								mysqli_close($con);
							}
						}
					}
				}
				//close result set 
				mysqli_free_result($result);
			} 	
		}
	}
	else
	{
		$isSetValidation = true; //assumed true
		echo "some variables don't add up";
		
		//isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])
		
		if (!isset($_POST['name']))
		{
			echo "<p>NAME Variable is not set. </p>";
			$isSetValidation = false;
		}
		if (!isset($_POST['email']))
		{
			echo "<p>Email Variable is not set. </p>";
			$isSetValidation = false;
		}
		if (!isset($_POST['name']))
		{
			echo "<p>NAME Variable appears to be empty. </p>";
			$isSetValidation = false;
		}
		if (!isset($_POST['name']))
		{
			echo "<p>Email Variable appears to be empty. </p>";
			$isSetValidation = false;
			
		}
		if (!$isSetValidation)
		{
			echo "<p>Please go <a href='javascript:window.histsory.back(-1);'>back</a> and try again.</p>";
		}
	}
?>