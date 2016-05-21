<?php

	$con = mysqli_connect("lochnagar.abertay.ac.uk", //server
								 "sql0706008", 				//server username
								 "a8Bd5qcE", 				//server password
								 "sql0706008");				//database to query

	if(mysqli_connect_errno())
	{	
		echo "<p class='db_connect db_fail'>Failed to connect to database. Please try again or contact system admin.</p>";
		echo "<p class='db_connect db_fail'>Error number: " . mysqli_connect_error() . "</p>";
		include "footer.php";
		exit();
	}
?>