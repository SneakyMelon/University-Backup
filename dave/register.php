<html>
<head>
<title>Admin Panel</title>
</head>
<body>

<?php 

	ini_set('display_errors', 1);
	error_reporting(E_ALL);

$pageTitle = "DaveMan's Shirts";
$section = "contact";

include 'inc/header.php'; 
include 'db_const.php';
include 'functions.php';
include 'title_bar.php';
?>

<div class="section page">
<div class="wrapper">
<h1>Register here</h1>
<p>

<?php 



	if (isset($_POST['submit']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		//echo "<p>Username: " . $username . "</p>";
		//echo "<p>password: " . $password . "</p>";
		
		if(empty($username) or empty ($password))
		{
			echo "<p>Please enter your details</p>";
		} else 
		{
			$password = md5($password);
			mysqli_query($con, "INSERT INTO users VALUES ('', '$username', '$password', '2', 'a')");
			
			echo "<p>Registration Successful</p>";
		}
	}
?>

<form method ='post'>
User name: <br />
<input type='text' name='username' />
<br /><br />
Password: <br />
<input type='password' name='password' />
<br /><br />
<input type='submit' name='submit' value='Register'/>
</form>
</div>
</div>

<?php include('inc/footer.php') ?>

</html>