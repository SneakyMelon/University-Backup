
<!doctype html>

<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/global.css">
	
    <script defer src="js/search.js" type="text/javascript"></script>
	
</head>
<body>
			
		<?php
			//calls on header template so I can edit the nav bar,
			//and have it applied to every page without the need
			//to edit each one individually
			require_once "scripts/nav_bar.php";
		?>	

		<section id="content">
				<?php
					//Default aside that is standard throughout
					//this two columb design
				
					include_once "scripts/contents_aside.php";
				?>
			
			<section id="contents">

				<?php
					include_once "scripts/db_login.php";
					
					if (isset($_GET['staffID']))
					{
						//run code to display staff information
						$sql = "SELECT * FROM staff WHERE ID = " . $_GET['staffID'];
						
						if ($result = mysqli_query($con, $sql)) 
						{
							$row = mysqli_fetch_array($result);
							
						echo "<h2>Viewing " . $row['name'] . "'s profile</h2>";
				?>
				<div id="staff-content" class="cleerfix">
					<section id="left">
						<div id="userStats" class="cleerfix">
							<div class="pic">
								<a href="#"><img alt="" src="img/user_avatar.jpg" width="150" height="150" /></a>
							</div>
				
							<div class="data">
								<?php
									$sql = "SELECT * FROM staff WHERE ID = " . $_GET['staffID'];
									
									if ($result = mysqli_query($con, $sql)) 
									{
										$row = mysqli_fetch_array($result);

										echo "<h1 class='h1-staff'>" . $row['name'] . "</h1>";
										echo "<h3 class='h3-staff'>" . $row['from'] . "</h3>";
										echo "<h4 class='h4-staff'>";
											echo '<a href="mailto:' . $row['email'] . '">' . $row['email'] . '</a>';
										echo "</h4>"; 
								?>
								<div class="socialMediaLinks">
									<a href="http://twitter.com/" target="_blank"><img alt="" src="img/twitter.png"  /></a>
									<a href="http://facebook.com" target="_blank"><img alt="" src="img/facebook.gif" /></a>
								</div>
								
								<div class="sep">
								</div>
								
								<ul class="numbers cleerfix">
								
								<?php
									echo "<li>Office: <span>" . $row['location'] . "</span></li>";
									echo "<li>D.o.B:  <span>" . $row['DOB']      . "</span></li>";
									echo "<li class='nobrdr'>Join Date: <span>" . $row['joinDate'] . "</span></li>"; 
								}?>
								</ul>
							</div>
						</div>
			
						<h1 class='h1-staff'>About Me:</h1>
						<p class='p-staff'>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt 
							ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
							laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
							velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
							in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</section>
				</div>		
			<?php
						
					}
				}
				else
				{
					echo "<h2>View Staff Profiles</h2>";
					//run code to show full staff list.
					//echo $row['FirstName'] . " " . $row['LastName'];
					
					$sql = "SELECT * FROM staff";
					if ($result = mysqli_query($con, $sql)) 
					{
						echo "<table>";
							echo "<tr>";
								//echo "<td>ID</td>";
								echo "<td>Name</td>";
								echo "<td>View</td>";
	
						while($row = mysqli_fetch_array($result)) 
						{
							echo "<tr>";
								//echo "<td>" . $row['id']       . "</td>";
								//echo "<td>" . $row['title']    . "</td>";
								echo "<td>" . $row['name'] . "</td>";   //. " " . $row['surname'] "</td>";	  
								echo "<td><a href='?staffID=" . $row['id'] . "'>View profile</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
				}
			?>
			</section>
		</section>

		<?php
			require_once "scripts/footer.php";
		?>

</body>