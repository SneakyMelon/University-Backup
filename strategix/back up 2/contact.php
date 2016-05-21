
<!-- ajax call to php which stores form info -->
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
					Getting in touch with StrategiX
				</h1>
			<div class="l">
				<div id="x" class="padMeUp">
				<p class="p10">Please use the form to contact us, or use the information on the panel to the right</p>
				
				<form id="frmContactPage" action="scripts/enquiry.php" method="POST">
				
				
				<ul id="contactForm">
					<li>
						<label>Enter your full name</label>
						<input class="short" name = "frmName" id ="frmName" type="text"  placeholder="Your name">&nbsp;
						<input class="short" name = "frmLast" id ="frmLast" type="text"  placeholder="Your Surnmae">
					</li>
					
					<li><label>Enter your E-mail</label></li>
					<li><input class="long" name="frmEmail" id="frmEmail" type="email"  placeholder="Your Email Address"></li>
					
					<li><label>Contact Number</label></li>
					<li><input  class="long" name="frmTel" id="frmTel" type="tel"  placeholder="e.g. +06 (031) 101 101"></li>
					
					<li><label>Enter your message:</label></li>
					<li><textarea  class="long" id = "frmMessage" name="frmMessage"  placeholder="Enter a message to send"></textarea></li>
				</ul>
					<input type="submit" value="Send" id="send">
				</form>
				</div>
			</div>
			<?php include_once "scripts/aside.php"; ?>
		</div>
	
	</div>
	
	<?php
		include_once "scripts/footer.php";
	?>
	
	<script src="js/contact.js"></script>
	
</body>

