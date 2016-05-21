<?php

/*

	2.	A “slideshow” of images controlled via Javascript. You should aim to have at 
		least 5 thumbnails that when chosen expand to a larger image.
		
			Shouldn't be to hard. Can create each page with one, or have it store in
			php URL variable what user is doing so each gallery displays images stored in
			the database depending what your doing? I don't know...
			
			Either that, or have this within a gallery page. You can try an upload to gallery
			so you can contribute to the gallery yourself. This contributes to another question
			[See Section No_4]

	3.	A page that is controlled through a parameter. This parameter determines the 
		data on the page as selected from a MySQL database.

			I was thinking about a venue hire, or some sort
	
			All information is store in the database, and you can selecet values in a
			form, and each one retreives values. Different rooms can be different calls
			to the database
	
			eg.
	
				Choose a function room
			
					1. 	Room 1 = room.php?id=1
						Room 2 = room.php?id=2
						Room 3 = room.php?id=3
		
					2. 	Each one has its own set of values and prices
					and different availability such as staff, or food, etc.
				
					All these values are stored as values in the DB.
				
	4.	A gallery of at least 9 images that are obtained from a server. A good 
		solution will be capable of pagination if there are lots of images available. 			
				
			Not sure how this can be done yet, but will need to look into this paginatin thing
			Also thinking about uploading images into the DB to make it more than its Nine
			Could be impressive if done right...

	5.	A contact or subscriber form, with all the fields data validated if possible,
		where the data is stored in a database and a tailored response given to the author.			 
				
				Pretty easy, just time consuming. Will have both:
				
					1. Subscribe to newsletter on each page as part of the ASIDE menu
					2. Contact Form
						Name
						Surname
						Email address
						Comment
						Have you contacted us before?
						
						Confirm submition
							Have a robot challenge,
								templates can be found for PHP forms
					
					Will have them validating in PHP and JS - explain reason of security
						- JS can be edited on client side
						- not on PHP unless hacked
						- JS takes load of server
							- gets wrong 10 times on JS = 10 times server saved
							- gets right on server once, lots of load saved
				
	6.	A final page that includes 300 words that give your reflection of the site, 
		how it matches the spec, and highlight the 3 best features of your site.			
				
		[Self explanatory]		
				
*/


?>

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
			require_once "nav_bar.php";
		?>	

		<section id="content">
				<?php
					//Default aside that is standard throughout
					//this two columb design
				
					include_once "contents_aside.php";
				?>
			
			<section id="contents">
				<?php
					//the contents of this page.
					include_once "index_contents.php";
				?>	
			</section>
		</section>

		<?php
			require_once "footer.php";
		?>

</body>