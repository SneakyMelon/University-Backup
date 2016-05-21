<?php

	echo "<h1>Backup Directory</h1>";
	echo "<h2>0706008 - Allan Davidson - Rich Internet Applications</h2>";

	$dir    = './backup/';
	$files  = scandir($dir, 1);
	
	rsort($files);
	
	echo "<ul style='list-style-type: none;'>";
	foreach ($files as $value) 
	{
		echo "<li><a href='./backup/$value'> $value </a></li>\r\n";
	}
	echo "</ul>";
?>
