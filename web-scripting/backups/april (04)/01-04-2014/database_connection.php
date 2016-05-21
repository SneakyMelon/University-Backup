<?php

$connection = mysqli_connect("lochnagar.abertay.ac.uk", //server
								 "sql0706008", 				//server username
								 "SF0zchbv", 				//server password
								 "sql0706008");				//database to query
								 
								 
	if(mysqli_connect_errno())
	{	
		echo "<p>Failed to connect to data0base. Please try again or contact system admin.</p>";
		echo "<p>Error number: " . mysqli_connect_error() . "</p>";
		exit;
	}
	else
	{
		echo "<p>Connected to Database...</p>";
	}
	
	
	/*
		//$query = "INSERT INTO formInput (name, mobile, comments) VALUES($name, $mobile, $comment)";
		$query = "INSERT INTO `sql0706008`.`formInput` (`name`, `mobile`, `comments`) VALUES ('$name', '$mobile', '$comment');";
	
		mysqli_query($connection, $query);
		mysqli_close($connection);
	
	*/
?>