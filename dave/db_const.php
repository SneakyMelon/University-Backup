<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

	# mysql db constants DB_HOST, DB_USER, DB_PASS, DB_NAME
	const DB_HOST = 'lochnagar.abertay.ac.uk';
	const DB_USER = 'sql1301826';
	const DB_PASS = '7NOskqrw';
	const DB_NAME = 'sql1301826';
	
	$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	
	if (!$con)
	{
	 die('Could not connect: ' . mysql_error());
	}
	
?>