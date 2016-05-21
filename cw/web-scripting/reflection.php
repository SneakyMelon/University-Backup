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
				<h2>Reflective summary</h2>
				
				<p>
					During the creation of my site, I have followed the specification as closely as possible,
					but used a wide variety of approaches to solving the problems at hand.
				</p>
				<p>
					I have spent a considerable amount of time learning and going above and beyond the specification 
					to further learn HTML, JavaScript, CSS and PHP.
				</p>
				<p>
					First is my newsletter subscription form. This sends the information to a validation process, 
					where it checks to see that the name only contains letters and spaces, and the email address only
					contains characters defined in the email rule (must contain @, .com/.co.uk, etc.). 
				</p>
				<p>
					As part of the validation process, you are given a unique number, (checks to see if one exists already,
					and loops until one is found) and then checks to see if the same email address is found, returning 
					appropriate error messages.
				</p>
				<p>
					Once all the data is correctly inserted and processed, it is then uploaded and saved onto the database. 
					It then informs you how many days until the next newsletter is sent (1st of each month).
				</p>
				<p>
					This matches the criteria of creating a form with a validation process, uploading to a database and customised results.
				</p>
				<p>
					Another feature of my site is my pagination in my 9 image gallery. I have a simple design, but have added 
					the feature of changing results per page. This uses JavaScript to interact with PHP – where JavaScript gets 
					information from the DOM and sends it to the $_GET variables within PHP and the results are shown accordingly.
					This meets the 9 Page gallery question as it contains the pagination process with the ability to customise it,
					as well as the images being retrieved from the database.
				</p>
				<p>
					Another feature is my staff list. It shows a list of current staff, retrieved from the database, 
					and provides a link to a staff profile page containing some useful information about them. This meets
					the requirement of having a page controlled via parameters, and determining the data provided.
				</p>
				<p>
					In conclusion, I am really happy with the final resulting website and I hope you are as happy with it as I am.
				</p>
				<p>
					Allan.
				</p>
			</section>
		</section>

		<?php
			require_once "scripts/footer.php";
		?>

</body>