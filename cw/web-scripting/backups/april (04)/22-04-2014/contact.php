<head>
	<title>0706008 - Web Scripting Coursework [2014]</title>
	
	<meta name="description" content="Coursework for the module Web Scripting">
	<meta charset="utf-8">
	
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/contact-form.css">
	
    <script defer src="js/search.js" type="text/javascript"></script>
	
</head>
<body>		
	<?php
		require_once "nav_bar.php";
			echo '<section id="content">';
		include_once "contents_aside.php";

			?>
			
		<section id="contents">
		
		<h1>Balmoral Castle Contact Us Page</h1>
			<form method="post" action="" onsubmit="return:false" class="contact-form">
				<div id="imessageOK">Thank you! Message Sent!</div>
				<div id="imessageERROR">ERROR: Message Not Sent!</div>

				<ul>
					<li class="iheader">Contact Form</li>
					<li>
						<label for="YourName">*Your Name</label>
						<input class="itext" type="text" name="name" id="YourName" />
					</li>
					
					<li>
						<label for="YourEmail">*Your Email</label>
						<input class="itext" type="text" name="email" id="YourEmail" />
					</li>
					
					<li>
						<label for="YourMessage">*Your Message</label>
						<textarea class="itextarea" name="message" id="YourMessage"></textarea>
					</li>
					
					<li class="iheader">Additional Information</li>
					
					<li><label for="Iprefer">Reason for contact:</label>
						<ul>
							<li>
								<input class="iradio" type="radio" checked="checked" name="Iprefer" id="Iprefer2" value="ReportError">
								<label for="Iprefer2" class="ilabel">Report Errors</label>
							</li>
						
							<li>
								<input class="iradio" type="radio" name="Iprefer" id="Iprefer3" value="HireFunctionRoom">
								<label for="Iprefer3" class="ilabel">Hire a function Room</label>
							</li>
						
							<li>
								<input class="iradio" type="radio" name="Iprefer" id="Iprefer4" value="GeneralEnquiry">
								<label for="Iprefer4" class="ilabel">General Enquiry</label>
							</li>
							<li>
								<input class="iradio" type="radio" name="Iprefer" id="Iprefer5" value="Job">
								<label for="Iprefer4" class="ilabel">Working with Us</label>
							</li>
						</ul>
					</li>

					<hr />
					<li>
						<label>&nbsp;</label> <!-- aids in alignment. -->
						<input type="button" class="ibutton" onclick="sendForm()" name="SendaMessage" id="SendaMessage" value="Send a Message!" />
					</li>
				</ul>
			</form>
		</section>
	</section>

	<?php
		require_once "footer.php";
	?>
</body>
