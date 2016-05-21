<!doctype html>
<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">
    
    <script defer src="js/search.js" type="text/javascript"></script>
	<script defer src="js/rooms.js"  type="text/javascript"></script>
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
				<h2>Balmoral Castle Suites</h2>

				<div id="rooms">
					<p>Image slides. Hover over them to see larger image...</p>	
					
					<div id="cont">	
						<ul id="thumbs">
							<li><img class="thumbnail" src="http://m.travelpn.com/images/edinburgh/hotel/0/028262/Guest_room_F_3.jpg" alt = "Pic 1" /></li>
							<li><img class="thumbnail" src="http://m.travelpn.com/images/edinburgh/hotel/0/028262/Guest_room_F_4.jpg" alt = "Pic 1" /></li>
							<li><img class="thumbnail" src="http://m.travelpn.com/images/edinburgh/hotel/0/028262/Suite_F_3.jpg" alt = "Pic 1" /></li>
							<li><img class="thumbnail" src="http://aff.bstatic.com/images/hotel/max500/219/2194912.jpg" alt = "Pic 1" /></li>
							<li><img class="thumbnail" src="http://www.traveldelacreme.com/wp-content/gallery/balmoral/beauly-suite.jpg" alt = "Pic 1" /></li>
							<li><img class="thumbnail" src="http://pierreswesternfront.punt.nl/_files/2008-02-12/huisdoorn3-image004.jpg" alt = "Pic 1" /></li>
						</ul>

						<div id="holder">
							<img src="http://m.travelpn.com/images/edinburgh/hotel/0/028262/Guest_room_F_3.jpg" alt="Background Picture" />
						</div>
					</div>
				</div>
			</section>
		</section>

		<?php
			require_once "scripts/footer.php";
		?>
</body>

