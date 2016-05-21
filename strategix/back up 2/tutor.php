<?php
	include_once "scripts/head.php";
?>

<body>
	
	<?php
		include_once "scripts/page_nav.php";
	?>
	
	<div id="content" class="not-menu">
		
		<div id="content-body" class="row">
			
			<?php include_once "scripts/slideshow.php"; ?>
			
			<h1 class="content-header">
				
			</h1>
			<div class="l">
				
				<h2>General requirements:</h2>
				<ol>
					<li>Clear visual identity and content consistent with the promotional purpose</li>
					<li>Easy to use intuitive interface where JavaScript is used to enhance the interactions</li>
					<li>The JavaScript code is abstracted and is properly structured and commented.</li>
					<li>Standards compliant up to HTML5 and CSS3 (validity tested)</li>
					<li>Functional, but need not be identical, across IE 8+, Firefox & Chrome browsers</li>
				</ol>
				
				<h2>Specific Requirements:</h2>

				<ol>
					<li>The correct use of variables, arrays and functions.</li>

					<li>A feature demonstrating content being removed and added from the page in response to a user action.  This must be implemented by removing and adding nodes to the DOM tree of the document.</li>

					<li>The use of AJAX to load the ‘web design topics’ information from a XML file or files.</li>

					<li>The use of JavaScript object oriented features with at least two methods defined in your code.  The methods must add usefulness of the application and not make use of pop-ups.</li>

					<li>The use of a server side php script to enhance your web – validate and upload to a database</li>

					<li>An additional feature constructed in JavaScript which you feel enhances the site.  This can include enhanced sophistication in the use of AJAX or OO features. </li>
				</ol>
				
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</div>
		
	</div>
	
	<?php
		include_once "scripts/footer.php";
	?>
	
	
</body>