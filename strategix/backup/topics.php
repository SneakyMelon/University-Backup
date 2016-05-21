<?php
	include_once "scripts/head.php";
?>

<body>

<?php
	include_once "scripts/page_nav.php";
?>

	<section id="content" class="not-menu">
	
		<section id="content-body" class="row">

			<?php include_once "scripts/slideshow.php"; ?>
			
				<h1 class="content-header">
					Web Design Topics: Choose one to view...
				</h1>
			<div class="l">
				<div style="margin-left:50px;">
			<button id="v1" onclick="loadXMLDoc('xml/topic_one.xml')">Topic 1</button>
			<button id="v2">Topic 2</button>
			<button id="v3">Topic 3</button>
			<button id="v4">Topic 4</button>
				</div>
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</section>
	
	</section>
	
	<?php
		include_once "scripts/footer.php";
	?>
	
<script src="js/topics.js"></script>
</body>