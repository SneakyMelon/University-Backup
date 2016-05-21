<h2>Contact Balmoral Castle</h2>
	<form method="POST" action="?submit" class="contact-form"> <!-- onsubmit="return validation()" --> 
		<div id="errorList">ERROR: Message Not Sent!</div>

		<ul>
			<li class="li-header">Contact Form</li>
			<li>
				<label for="YourName">*Your Name</label>
				<input class="input-text" type="text" name="name" id="YourName" placeholder="eg. Allan Davidson" />
			</li>
			
			<li>
				<label for="YourEmail">*Your Email</label>
				<input class="input-text" type="email" name="email" id="YourEmail" placeholder="eg. email@provider.com"/>
			</li>
			
			<li>
				<label for="YourMessage">*Your Message</label>
				<textarea class="input-textarea" name="message" id="YourMessage" maxlength="255" placeholder="Must be a min. of 25 characters and a max. of 255 characters."></textarea>
			</li>
			
			<li class="li-header">Additional Information</li>
			
			<li><label>Reason for contact:</label>
				<ul id="contactReason">
					<li>
						<input type="radio" name="reason" id="reason1" value="ReportError">
						<label for="reason1" class="reason-label">Report Errors</label>
					</li>
				
					<li>
						<input type="radio" name="reason" id="reason2" value="HireFunctionRoom">
						<label for="reason2" class="reason-label">Hire a function Room</label>
					</li>
				
					<li>
						<input type="radio" name="reason" id="reason3" value="GeneralEnquiry">
						<label for="reason3" class="reason-label">General Enquiry</label>
					</li>
					<li>
						<input type="radio" name="reason" id="reason4" value="Job">
						<label for="reason4" class="reason-label">Working with Us</label>
					</li>
					<li>
						<input type="radio" name="reason" id="reason5" value="Other">
						<label for="reason5" class="reason-label">Other</label>
					</li>
				</ul>
			</li>

			<li class="li-header"></li>
			
			<li>
				<label>&nbsp;</label> <!-- aids in alignment. -->
				<input  type="button" 
						class="frmButton" 
						name="frmSubmit" 
						id="frmSubmit" 
						value="Send a Message!" />
						<!-- onclick = "reset()"  -->
					
			</li>
		</ul>
	</form>