<html>
<head>
<title>Admin Panel</title>
</head>
<body>
<?php 
	include('inc/header.php'); 
	include 'db_const.php'; 
	include 'functions.php';
	include 'title_bar.php'; 
 ?>

<h3>Login here: </h3>

<form method ='post'>
<?php 
if (isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if(empty($username) or empty ($password))
	{
		echo "<p>Please enter your details</p>";
	}
	else 
	{
		$password = md5($password);
		$sql = "SELECT id FROM users WHERE username = '" . $username . "' AND password = '" . $password . "'";
		
		$query = mysqli_query($con, $sql);
		
		if ($result = mysqli_query($con, $sql) or die(mysqli_error($con))) 
		{
			/* determine number of rows result set */
			$row_cnt = mysqli_num_rows($result);

			if ($row_cnt === 1)
			{
				echo "<p>You are now logged in!</p>";
			}
			else
			{
				echo "<p>Incorrect credentials!</p>";
			}

			/* close result set */
			mysqli_free_result($result);
		}
	}
}
?>

Username: <br />
<input type='text' name='username' />
<br /><br />
Password: <br />
<input type='password' name='password' />
<br /><br />
<input type='submit' name='submit' value='Login'/>
</form>

</html>