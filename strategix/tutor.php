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
				<ol class="padMeUp">
					<li>Clear visual identity and content consistent with the promotional purpose</li>
					<p>I have created a website that has a consistant look through out that is very similar on most modern browsers.</p>
					<li>Easy to use intuitive interface where JavaScript is used to enhance the interactions</li>
					<p>JavaScript is not appropriate to use all around this website, but it has been added where interaction can improve the features of the website.</p>
					<li>The JavaScript code is abstracted and is properly structured and commented.</li>
					<p>All JS code is commented, structured to the full extend and professionally coded.</p>
					<li>Standards compliant up to HTML5 and CSS3 (validity tested)</li>
					<p>All pages have passed CSS3 and HTML5 validation tests from the w3c.</p>
					<li>Functional, but need not be identical, across IE 8+, Firefox & Chrome browsers</li>
					<p>Is similair throughout, but not exact per browser.</p>
				</ol>
				
				<h2>Specific Requirements:</h2>

				<ol class="padMeUp">
					<li>The correct use of variables, arrays and functions.</li>
					<p>Arrays, variables, objects, arrays, methods, attributes for example have been implemented throughout the project.</p>
					<li>A feature demonstrating content being removed and added from the page in response to a user action.  This must be implemented by removing and adding nodes to the DOM tree of the document.</li>
					<p>The about page, and contact pages provide DOM add/ remove features - form validation with error login, and text being added, or removed in the about as a "more..."</p>
					<li>The use of AJAX to load the web design topic's information from a XML file or files.</li>
					<p>AJAX runs in two parts of the project - the contact submission runs a post Ajax request, which saves the results of the table to a database. The other AJAX loads the xml files as web design topics.</p>
					<li>The use of JavaScript object oriented features with at least two methods defined in your code.  The methods must add usefulness of the application and not make use of pop-ups.</li>
					<p>The tools section of the website runs off of a Tool object, which utilises methods, attributes, functions, and more.</p>
					<li>The use of a server side php script to enhance your web – validate and upload to a database</li>
					<p>PHP is used with AJAX form which saves to the database as well as a php which paginates the web design topics.</p>
					<li>An additional feature constructed in JavaScript which you feel enhances the site.  This can include enhanced sophistication in the use of AJAX or OO features. </li>
					<p>The additional features of the website are the contact form validation with colour aided help, the advanced restrictions on the tools objects and the contact form saving the input of the users to a database.</p>
				</ol>
				
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</div>
		
	</div>
	
	<?php
		include_once "scripts/footer.php";
	?>
	
	
</body>