<aside>
    <div id="side-columb">                
        <div class="side-item">
            <h3>New Website</h3>
            <p> 
                Welcome to Balmoral's new slick Website, 
                created with love and affection. Currently in
                Development, so there are more changes to come.
            </p>
        </div>
           
        <div class="side-item hide-on-device">
            <h3>Opening hours</h3>
       
            <p>
                Our opening times are from:
            </p>
            
            <p>
            8.00am until 6.30pm (Monday through Saturday)
            and we are Closed on Sundays
            </p>
        </div>
        
        <div class="side-item hide-on-device">
            <h3>Search for other Castles</h3>

             <form onreset="hideSearchResults()" action="#" method="post">
                 <input type="text" placeholder="e.g. 'Balmoral Castle'" onkeyup="showResult(this.value)">
                 <input type="reset" value="Clear">
                 <div id="search-results"></div>
            </form>

        </div>
       
        <div class="side-item">
            <h3>Sign up for updates</h3>
       
            <form action="newsletter.php" method="post">
				<label for="name">Name:</label>
				<input id="name" name="name" type="text" required placeholder="e.g. Allan Davidson">
			
				<label for="email">E-mail</label>
				<input id="email" name="email" type="email" placeholder="e.g. someone@example.com" required>
				
				<div class="clearfix"></div>
				
				<input type="submit" value="Subscribe">
            </form>
        </div>
        
        <div class="side-item hide-on-device">
        <h3>Contact Us</h3>
            <p> 
                Want to know more? Have a question?
                Please don't hesitate
                to get in touch via our
                
                <a href="contact.php">
                    Contact Page
                </a>
            </p>	
        </div>
    </div>
</aside>