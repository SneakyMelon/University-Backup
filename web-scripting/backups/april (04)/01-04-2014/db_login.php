<?php
	
	$connection = mysqli_connect("lochnagar.abertay.ac.uk", //server
								 "sql0706008", 				//server username
								 "SF0zchbv", 				//server password
								 "sql0706008");				//database to query
								 
								 
	if(mysqli_connect_errno())
	{	
		echo "<p>Failed to connect to database. Please try again or contact system admin.</p>";
		echo "<p>Error number: " . mysqli_connect_error() . "</p>";
		exit;
	}
	else
	{
		/*
			//debug: 
			
			echo "<script type='text/javascript'>";
			echo "alert('Database Connection Established . . .')";
			echo "</script>";			
		*/
	}
	
?>