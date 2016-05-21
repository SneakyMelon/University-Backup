<!DOCTYPE html>
<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css">
	
    <script defer src="js/search.js" type="text/javascript"></script>
	<script defer src="js/form-validation.js" type="text/javascript"></script>
</head>
<body>		
			<?php
				require_once "scripts/nav_bar.php";
					echo '<section id="content">';
				include_once "scripts/contents_aside.php";
			?>
			
		<section id="contents">
			<?php
				if (isset($_GET['submit']))
				{
					echo "<p>Thank you for getting in touch. We aim to reply to all messages within a 48 hour period.</p>";
				}
				else
				{
					include_once "scripts/contact_form.php";
				}
			?>
		</section>
	</section>

	<?php
		require_once "footer.php";
	?>
</body>
