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
				StrategiX Web Desiner Tools
			</h1>
			<div class="l">
				
				<p>This page has some useful tools, built using a tools object, methods and attributes</p>
					<form >
						<ul>
							<li><label>Random Number Generator</label></li>
							<li><input type="number" id="rng_v"><input type="number" id="min" placeholder="min">
								<input type="number" id="max" placeholder="max"><input id="rng" type="submit" value="Generate"></li>
						</ul>
					</form>	
					<form >
						<ul>
							<li><label>Random Password Generator</label></li>
							<li><input type="text" id="rpg_v"><input type="number" id="pwlen" placeholder="length">
								<input id="rpg" type="submit" value="Generate"></li>
						</ul>
					</form>	
					<form >

						<ul>
							<li><label>Random Colour generator</label></li>
							<li><input type="text" id="rcg_v"><input id="rcg" type="submit" value="Generate"></li>
						</ul>
					</form>	
					<form >
						<ul>
							<li><label>Whats my screen size?</label></li>
							<li><input type="text" id="ssg_v"><input id="ssg" type="submit" value="Generate"></li>
						</ul>
					</form>	
					<form >
						<ul>
							<li><label>Date and Time</label></li>
							<li><input type="text" id="gtg_v"><input  id="gtg" type="submit" value="Generate"></li>
						</ul>
					</form>	
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</div>
		
	</div>
	
	<?php
		include_once "scripts/footer.php";
	?>
	
	<script src="js/tools.js"></script>
</body>