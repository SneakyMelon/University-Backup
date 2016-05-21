
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

if(isset($_GET["topic"]))
{
	$id = $_GET["topic"];
	
	if ($id == 1)
	{
		?>
		 <script type = "text/javascript" >

			window.onload = function () {
			load("xml/database.xml")
		}
		</script >
		
		<?php
	}
	
	if ($id == 2)
	{
		?>
		<script type="text/javascript">

		window.onload = function () {
			load("xml/javascript.xml")
		}
		</script>
		
		<?php
	}
	if ($id == 3)
	{
		?>
		<script type="text/javascript">
		
		window.onload = function () {
			load("xml/ria.xml")
		}
		</script>
		
		<?php
	}
	if ($id == 4)
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
