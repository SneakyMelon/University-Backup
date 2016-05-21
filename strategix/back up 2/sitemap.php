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
					Site Map
				</h1>
			<div class="l">
				<!-- <img src="img/sitemap.jpg" alt="Map of the website" style="height: 600px; padding: 10px 0 0 50px;"/> -->
				<ul class="sitemap">
					<li><a href="index.php">Index</a></li>
					<li><a href="contact.php">Contact Us</a></li>
					<li><a href="about.php">About Us</a></li>
					<li><a href="tools.php">Web Tools</a></li>
					<li><a href="tutor.php">Tutor page</a></li>
					<li><a href="topics.php">Web Design Blog</a>
						<ul class="sitemap">
							<li><a href="topics.php?topic=1">Databases</a></li>
							<li><a href="topics.php?topic=2">javaScripting</a></li>
							<li><a href="topics.php?topic=3">RIA's</a></li>
							<li><a href="topics.php?topic=4">Image Manipulation</a></li>
						</ul>
					</li>
					<li><a href="sitemap.php">Site Map (YOU ARE HERE!)</a></li>
				</ul>
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</div>
	
	</div>
	
	<?php
		include_once "scripts/footer.php";
	?>
	

</body>