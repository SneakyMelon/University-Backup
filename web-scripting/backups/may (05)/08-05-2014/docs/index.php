<?php 

	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	
	$con = mysqli_connect("lochnagar.abertay.ac.uk", 		//server
								 "sql0706008", 				//server username
								 "SF0zchbv", 				//server password
								 "sql0706008");				//database to query

	if(mysqli_connect_errno())
	{	
		echo "<p>Failed to connect to database. Please try again or contact system admin.</p>";
		echo "<p>Error number: " . mysqli_connect_error() . "</p>";
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Test Doc</title>
	<link rel="stylesheet" type="text/css" href="global.css" />
</head>



	<div id="content" class="clearfix">
		<section id="left">
			<div id="userStats" class="clearfix">
				<div class="pic">
					<a href="#"><img alt="" src="img/user_avatar.jpg" width="150" height="150" /></a>
				</div>
				
				<div class="data">
				
				<?php

					$sql = "SELECT * FROM staff WHERE ID = " . $_GET['staffID'];
					
					if ($result = mysqli_query($con, $sql)) 
					{
						$row = mysqli_fetch_array($result);

						echo "<h1>" . $row['name'] . "</h1>";
						echo "<h3>" . $row['from'] . "</h3>";
						echo "<h4>";
							echo '<a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a>';
						echo "</h4>"; 
				?>
					<div class="socialMediaLinks">
						<a href="http://twitter.com/" rel="me" target="_blank"><img alt="" src="img/twitter.png"  /></a>
						<a href="http://facebook.com" rel="me" target="_blank"><img alt="" src="img/facebook.gif" /></a>
					</div>
					<div class="sep"></div>
					<ul class="numbers clearfix">
					
					<?php
						echo "<li>Office: <span>" . $row['location'] . "</span></li>";
						echo "<li>D.o.B:  <span>" . $row['DOB']      . "</span></li>";
						echo "<li class='nobrdr'>Join Date: <span>" . $row['joinDate'] . "</span></li>"; 
					}?>
					</ul>
				</div>
			</div>
			
			<h1>About Me:</h1>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</section>
		
		
	</div>
</body>
</html>