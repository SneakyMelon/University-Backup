<?php
	
	/*$con = mysqli_connect("lochnagar.abertay.ac.uk", //server
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
	
	

	$sql = "INSERT INTO `sql0706008`.`enquiry` (`name`, `last`, `email`, `tele`, `message`) VALUES ('$name', '$last', '$email', '$tele', '$message')";
	
	
	mysqli_query($con, $sql);
	mysqli_close($con); */
	
	$servername = "lochnagar.abertay.ac.uk";
	$username = "sql0706008";
	$password = "a8Bd5qcE";
	$dbname = "sql0706008";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	} 

	
	$myarray = &$_POST ; 
$name    = $myarray["name"];
$last	 = $myarray["last"];
$tele	 = $myarray['tele'];
$email	 = $myarray['email'];
$comment = $myarray['comment'];

$sql = "INSERT INTO enquiry (name, last, email, tele, message)
VALUES ('$name', '$last', '$tele', '$email', '$comment')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
	




//echo $name . " " . $last .  " " . $tele .  " " . $email . " "  . $comment; 
	

?>