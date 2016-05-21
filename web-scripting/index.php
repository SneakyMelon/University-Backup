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
			//calls on header template so I can edit the nav bar,
			//and have it applied to every page without the need
			//to edit each one individually
			require_once "scripts/nav_bar.php";
		?>	

		<section id="content">
				<?php
					//Default aside that is standard throughout
					//this two columb design
				
					include_once "scripts/contents_aside.php";
				?>
			
			<section id="contents">
				<?php
					//the contents of this page.
					include_once "scripts/index_contents.php";
				?>	
			</section>
		</section>

		<?php
			require_once "scripts/footer.php";
		?>
</body>