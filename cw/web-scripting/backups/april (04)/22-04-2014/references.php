<!doctype html>
<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">
    
    <script defer src="js/search.js" type="text/javascript"></script>
</head>
<body>

<?php

	ini_set('auto_detect_line_endings',true);
	ini_set("display_errors", 1);
	
	error_reporting(E_ALL);

	include_once "nav_bar.php";
		
	echo '<section id="content">';
	
	include_once "contents_aside.php";	
		
		echo '<section id="contents">';
			//echo dirname(__FILE__);
			//returns "/home/UAD/0706008/public_html/cw/web-scripting";
			
			$ref = dirname(__FILE__) . "/references.txt";
			
			echo "<h1>References</h1>";
			$handle = fopen("$ref", "r");
			
			if ($handle) 
			{
				while (($line = fgets($handle)) !== false) 
				{

					if (!(strpos($line, 'http') === 0)) // if line != start with http
					{
						echo "<h3>$line</h3>";
					}
					else
					{
						if (strpos($line, 'http') === 0) //starts with http (at position[0])
						{
							//to pass w3c validation: use urlencode
							// -- however, this then alters the A-tags and no longer
							// links to the sites, but rather mayar.abertay.ac.uk/~0706008/cw/web-scripting/$line
							//and as such, fails on two errors...
							
							//$strNewLine = urlencode($line); 
							
							$source = "<a class='reference-list-item' href='$line'>$line</a><br />";
							echo $source;
						}
					}
				}
			}
			else 
			{
				// error opening the file.
				echo "Can not open file...";
			}
			
			fclose($handle);
			
		echo "</section>";
		echo "</section>";
		
	require_once "footer.php";
?>
</body>