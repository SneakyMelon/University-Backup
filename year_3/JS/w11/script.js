
	// HTML elements that need manipulating
	var btn = document.getElementById("createAd");
	var adText = document.getElementById("adText");
	
	// Main content of the script
	function Ad()
	{		
		// Finalise method
		this.adFinalise = function(){
			
			// Gives some validation to the user that the ad is made
			adText.value = "Advert Created";
			btn.value = "Create another Advert";
			
			alert("Your advertisement is now ready.");	
		}
		
		// isAd method
		this.isAd = function(){
			// Checks if the elements exists by looking for its identifier
			if(document.getElementById("previewAdvert")){
				
				return 1; // ad exists
			}
			else{
				return 0; // No ad
			}
		}
		
		// getAdText method
		this.getAdText = function(){
			//returns the value of the users input as string format.
			return adText.value.toString();
		};
		
		// createAdvert method 
		this.createAdvert = function(){
			// Returns a value of 1 or 0 depending on whether a preview has previously been done.
			if (this.isAd())
			{
				// If yes, then change the properties of the preview HTML rather than create a new oner.
				// Prevents duplicate and infinite previews being created.
				document.getElementById("previewAdvert").innerHTML = this.getAdText();
			}
			else
			{
				// else, create a new Preview Advertisement.
				var tmp = new Array();
					
					// Each temp variable holds information to build up the advertisement.
					
					// The next node that runs the getAdText method.
					tmp[1] = document.createTextNode(this.getAdText()); 
					// Create the paragraph.
					tmp[2] = document.createElement("p");
					// Give the paragraph an identifier.
					tmp[2].setAttribute("id", "previewAdvert");
					// Add the text node to the paragraph.
					tmp[2].appendChild(tmp[1]);
					// Add the preview to the end of the body.
					document.body.appendChild(tmp[2]);
			}
			
			// Either if creating a new preview or not, still needs to be finalised
			// Allows a custom set of things to run after an ad has been made,
			// in future, can be customised to add additional features and options to the user.
			this.adFinalise();
		};
	}
	
	// Initialise the Script.
	function init()
	{
		// advert is now of an Ad object.
		var advert = new Ad();
		
		// CreateAdvert() will create a preview of the advert on the page.
		advert.createAdvert();
	}
	
	// Window on load adds event listeners to 
	// 1. the button - when its clicked, init function is run which creates an advert.
	// 2. the Input  - When the user clicks the field, it will clear.
	window.onload = function()
	{
		btn.addEventListener("click", function(){ init(); });
		adText.addEventListener("click", function(){adText.value="";});
	};

	
	