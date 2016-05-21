<?php
	include_once "scripts/head.php";
?>

<body>
	
	<?php
		include_once "scripts/page_nav.php";
	?>
	
	<div id="content" class="not-menu">
		
		<div id="content-body" class="row">
			
			<?php 
				include_once "scripts/slideshow.php"; 
				
				echo '<h1 class="content-header">Web Design Topics</h1>';
				
				echo "
				<p>Click on one of the links below to view a recent web design topic...</p>
				
				<ul id='topics'>
				<li><a href='topics.php?topic=1'>Database Design</a></li>
				<li><a href='topics.php?topic=2'>JavaScript Programming</a></li>
				<li><a href='topics.php?topic=3'>Rich Internet Applications</a></li>
				<li><a href='topics.php?topic=4'>Image Manipulation</a></li>
				</ul>
				
				";
			?>	
			<div class="l">
				<div id="response">
					

				</div>
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</div>
		
	</div>
	
	<?php
		include_once "scripts/footer.php";
	?>
	
	<script src="js/topics.js"></script>
</body>