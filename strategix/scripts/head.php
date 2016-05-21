
<!DOCTYPE html>

<head>

<title>Strateg:IX Web Design</title>

<!-- CSS -->
<link rel="stylesheet" href="css/main.style.reset.css">
<link rel="stylesheet" href="css/main.style.css">
<!-- Fonts -->
<link href='http://fonts.googleapis.com/css?family=Fjord+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Cinzel' rel='stylesheet' type='text/css'>
<!-- END OF CSS -->




<?php

//if topic page contains a topic variable in URL
if(isset($_GET["topic"]))
{
	//then set an ID variable from the URL
	$id = $_GET["topic"];
	
	if ($id == 1) //if 1, load the DB XML file
	{
		?>
		 <script type = "text/javascript" >

			window.onload = function () {
			load("xml/database.xml")
		}
		</script >
		
		<?php
	}
	
	if ($id == 2) //if 2, load the JS XML FILE
	{
		?>
		<script type="text/javascript">

		window.onload = function () {
			load("xml/javascript.xml")
		}
		</script>
		
		<?php
	}
	if ($id == 3) //if 3, load the RIA FILE
	{
		?>
		<script type="text/javascript">
		
		window.onload = function () {
			load("xml/ria.xml")
		}
		</script>
		
		<?php
	}
	if ($id == 4) //if 4, then load the IMG / manipulation
	{
		?>
		<script type="text/javascript">
		
		window.onload = function () {
			load("xml/image_manipulation.xml")
		}
		</script>
		
		<?php
	}
}

?>


</head>
