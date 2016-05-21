


		//example add remove text via the DOM
		
		//the text to be added
	var text = "We are constantly learning, developing our skills, and mastering our processes. No challenge is to high for our levels of standards. We only strive for perfection.";
	
	var x = document.getElementById("abtCompany");

	
	//on load...
	window.onload = function () {

		x.onclick = function () {
			moreOrLess() //create an on click function that adds or removes the extra text
		}
	}
	function moreOrLess() {
		var y = document.getElementsByClassName("l")[0];

		if (document.getElementById("output")) { //if exists, remove it
			var z = document.getElementById("output");
			y.removeChild(z);
			x.innerHTML = "Want to know more? Click this link...";
		} else {//doesnt exist, so create it...
			var newItem = document.createElement("p"); // Create a <li> node
			var textnode = document.createTextNode(text); // Create a text node

			newItem.setAttribute("id", "output");// create a uniquely identifier 
			newItem.appendChild(textnode); // Append the text to <li>

			//var list = document.getElementById("myList");      // Get the <ul> element to insert a new node
			y.insertBefore(newItem, x); // Insert <li> before the first child of <ul>
			x.innerHTML = "Click to show less..."; //change  teh text back, reseting the form
		}
	}
