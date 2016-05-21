
<?php

	//get values from the form
	
	$name    = $_POST['name'];
	$mobile  = $_POST['mobile'];
	$comment = $_POST['comments'];

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
	
	//$query = "INSERT INTO formInput (name, mobile, comments) VALUES($name, $mobile, $comment)";
	$query = "INSERT INTO `sql0706008`.`formInput` (`name`, `mobile`, `comments`) VALUES ('$name', '$mobile', '$comment');";
	
	mysqli_query($connection, $query);
	mysqli_close($connection);
								 
?>



<!doctype html>

<head>
	<title>0706008 - Web Scripting 2014</title>
	
	<meta name="description" content="Building blocks for Web Scripting...">
	<meta charset="utf-8">
	
	 <link rel="stylesheet" href="css/style.css">
	
</head>
<body>

<?php

	$sql = "SELECT * from formInput";
	$result2 = mysqli_query($connection, $sql);
	$num = mysqli_num_rows($result2);
	
	if ($num == 0)
	{
		echo "<p>0 Results found.</p>";
		exit;
	}
	else
	{
		$row = mysqli_fetch_array($result2);
		
		echo "ID = " . $row["id"] . "<br />";
		echo "name = " . $row["name"] . "<br />";
		echo "mobile = " . $row["mobile"] . "<br />";
		echo "Comments = " . $row["comments"] . "<br />";
	}
	
	

?>



</body>