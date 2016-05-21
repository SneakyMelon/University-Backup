<!doctype html>

<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">	
</head>
<body>
	<?php
		
		ini_set("display_errors", 1);
		error_reporting(E_ALL);
		
		require_once "scripts/nav_bar.php";
		
			echo '<section id="content">';
			echo '<section id="contents">';

			echo "<h1>Signing up: Newsletter</h1>";
		
			echo "<p class='db_connect'>Establishing connection to Database.......</p>";
		

			require_once "scripts/db_login.php";
			echo "<p class='db_connect db_success'>A successfull Connection has been established.........</p>";

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
				echo "<p class='db_fail'>Incorrect name combination. Only the letters A-Z, a-z, and spaces are allowed.</p>";
				$valid = false;
			}
			//RegExp that allows xxx@xxx.xxx
			
			if(!preg_match($regex_email, $email))
			{
				echo "<p class='db_fail'>Incorrect Email combination. You must have some text followed by an '@', and an address, such as hotmail.com, or gmail.com.</p>";
				echo "<p class='db_fail'>You tried to enter: " . $email . "</p>";
				$valid = false;
			}

			if (!$valid) //if not valid, show back button and exit;
			{
				echo "<p><a href='javascript:window.history.back()'>Go back</a> and try again.</p>";
				include "scripts/footer.php";
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

					if ($row_cnt > 0)
					{
						printf("<p class='db_fail'>ERROR: Result set ['E-Mail'] has %d entry/ entries.\n", $row_cnt . "</p>");
						echo "<p class='db_fail'>This email already exists: ". $email . "</p>";
						echo "<p><a href='javascript:window.history.back()'>Go back</a> and try again.</p>";
							include "scripts/footer.php";
						exit;
					}
					else //if row_cnt = 0, passes validation test, continue to further evaluation (unique ID)
					{
						printf("<p class='db_success'>Result set ['E-Mail'] has %d entry/ entries.\n", $row_cnt . "</p>");
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
								
								
								if ($row_cnt > 0)
								{
									printf("<p class='db_fail'>ERROR: Result set ['UID'] has %d entry/ entries.\n", $row_cnt . "</p>");
									echo "<p><a href='javascript:window.history.back()'>Go back</a> and try again.</p>";
									$loop = true; //re-do loop for another random UID;
								}
								else
								{
									printf("<p class='db_success'>Result set ['UID'] has %d entry/ entries.\n", $row_cnt . "</p>");
									date_default_timezone_set('Europe/London');
									$loop = false;
									
									$d = date('Y-m-d');
									$t = date('H:i:s');

									$sql = "INSERT INTO `sql0706008`.`db_subscribe` (`UID`, `email`, `name`, `signupDate`, `time`) VALUES ('$UID', '$email', '$name', '$d', '$t')";
								
								//function:: get number of days until the release of a new newsletter (leap year safe)
										//Get the current month and year:
											$curMonth = date('n');
											$curYear  = date('Y');

											//Create a timestamp for 00:00 on the first day of next month:
											if ($curMonth == 12)
											{
												$firstDayNextMonth = mktime(0, 0, 0, 0, 0, $curYear+1);
											}
											else
											{
												$firstDayNextMonth = mktime(0, 0, 0, $curMonth+1, 1);
											}
											
											//The number of days til that date is the number of seconds between now and then divided by (24 * 60 * 60).
											$daysTilNextMonth = ($firstDayNextMonth - mktime()) / (24 * 3600);
											
											$daysTilNextMonth = (floor(intval($daysTilNextMonth) + 1));
											
											//echo "<p>" . $daysTilNextMonth . " days until a news letter will be released.</p>";

											if ($daysTilNextMonth > 0)
											{
												echo	"<p class='db_pass'>Thank you for joining our 'Once a Month Newsletter', release on the first of each month." .
														"<br />" .
														"You will recieve our next letter in around " . $daysTilNextMonth . " days time.</p>";
											}
											else //if:: the first of the month
											{
											
												echo	"<p class='db_pass'>Thank you for joining our 'Once a Month Newsletter', release on the first of each month. " .
														"<br />" .
														"As today is the first, you will recieve our next letter within the next few hours.</p>";
									
											}		
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
			echo "<p class='db_fail'>An Error has occured: Some things don't add up:</p>";
			
			//isset($_POST['name']) && !empty($_POST['name']) AND isset($_POST['email']) && !empty($_POST['email'])
			echo "<ul class='error-list'>";
			
				if (!isset($_POST['name']))
				{
					echo "<li class='db_fail'>NAME Variable is not set. </li>";
					$isSetValidation = false;
				}
				if (!isset($_POST['email']))
				{
					echo "<li class='db_fail'>Email Variable is not set. </li>";
					$isSetValidation = false;
				}
				if (!isset($_POST['name']))
				{
					echo "<li class='db_fail'>NAME Variable appears to be empty. </li>";
					$isSetValidation = false;
				}
				if (!isset($_POST['name']))
				{
					echo "<li class='db_fail'>Email Variable appears to be empty. </li>";
					$isSetValidation = false;
					
				}

			echo "</ul>";
			
			if (!$isSetValidation)
			{
				echo "<p>Please go <a href='index.php'>HOME</a> and try again.</p>";
			}
		}

				echo "</section>";
			echo "</section>";
			
			include "scripts/footer.php";
	?>
</body>