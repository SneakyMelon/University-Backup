<?php

	ini_set("display_errors", 1);
	error_reporting(E_ALL);
	
	
	if (!isset($_GET['page'] || $page = $_GET['page'] > 3 || $page = $_GET['page'] < 0) //gallery.php with no page declaration
	{
		$page = 1;
	}
	else
	{
		$page = $_GET['page']
	}
	
	
	$sql = 	"SELECT * FROM imageGallery";
	
	
		$styles = "
			img{
				padding: 10px;
				height: 300px;
				width: 400px;
				display: block;
				
			}";
			
			printf ("<style type='text/css'>%s</style>", $styles);

	echo "<p>Connecting...</p>";
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

	echo "<p>Connected.........</p>";
	
	if ($result = mysqli_query($con, $sql)) 
	{
		echo "<p>SQL_query works...</p>";
		
		while($row = mysqli_fetch_array($result))
		{
			//echo $row['id'] . " " . $row['image'] . " " . $row['description'];
			//echo "<br>";
			
			printf ("<img class='gallery pic-%d' src='%s' alt='%s' />", $row['id'], $row['image'], $row['description']);


		}
	}

?>