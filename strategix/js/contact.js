

	//variable declarations
	var btn = id("send");
	var input = [];
		input = document.getElementById("contactForm").getElementsByTagName("input");

	var errors = []; //an array that keeps track of the form input error
	var regExp = {}; //regExpressions saved in an object adds ease of access
	
		regExp.stringOnly = /^[a-zA-Z ]+$/; //upper, lower, spaces
		regExp.tele = /\(?0( ?\d\)?){9,10}$/; //starts with 0, spaces, 9-10 long
		regExp.email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

	//function that validates the user input
function validate() {
	var name = input[0].value;
	var last = input[1].value;
	var email = input[2].value;
	var tele = input[3].value;
	var mess = document.getElementsByTagName("textarea")[0].value;

	this.params = "name=" + name + "&last=" + last + "&email=" + email + "&tele=" + tele + "&comment=" + mess;

	//check if its empty or matches against a letters only regExp
	if (name == "" || name.match(regExp.stringOnly) === null) {
		//if it does, add an error to errors array
		errors.push("- Incorrect Name: Letters and spaces only.");
		//display visually an where the error exists
		document.getElementById("contactForm").getElementsByTagName("input")[0].style.border = "3px solid red";
	}

	if (last == "" || last.match(regExp.stringOnly) === null) {
		//if it does, add an error to errors array
		errors.push("- Invalid Surname: Letters and spaces only.");
		//display visually an where the error exists
		document.getElementById("contactForm").getElementsByTagName("input")[1].style.border = "3px solid red";
	}

	if (email == "" || !email.match(regExp.email)) {
		//if it does, add an error to errors array
		errors.push("- Invalid Email Address.");
		//display visually an where the error exists
		document.getElementById("contactForm").getElementsByTagName("input")[2].style.border = "3px solid red";
	}

	if (tele == "" || !tele.match(regExp.tele)) {
		//if it does, add an error to errors array
		errors.push("- Invalid contact number - must start with 0 and be 9/10 numbers long.");
		//display visually an where the error exists
		document.getElementById("contactForm").getElementsByTagName("input")[3].style.border = "3px solid red";
	}

	if (mess == "") {
		//if it does, add an error to errors array
		errors.push("- You forgot to add a message");
		//display visually an where the error exists
		document.getElementsByTagName("textarea")[0].style.border = "3px solid red";
	}

		//if there are no errors, end the validation by returning true **where true == valid **
	if (errors.length == 0) {
		return true;
	} else {

		//at this point, there are error in the input
		var form = id("contactForm");

		//if the ID does not exists already, create it...
		if (!id("error_log")) {
			//create paragraph, and add a warning text, 
			var newTag = document.createElement("p");
			var tagText = document.createTextNode("Warning - please fix the errors highlighted in red before continuing.");

			//give the tag a red font to make it stand out to the uesr
			newTag.setAttribute("style", "margin: 7px; color: red;");
			newTag.setAttribute("id", "error_log");
			newTag.appendChild(tagText);

			//add to the document
			id("x").insertBefore(newTag, id("x").childNodes[0]);

			//create a list of errors (specifics errors)
			newTag = document.createElement("ul");
			newTag.setAttribute("id", "error_list");

			id("x").insertBefore(newTag, id("x").childNodes[0]);

			for (var i = errors.length - 1; i >= 0; i--) {
				var err = document.createElement("li");
				var txt = document.createTextNode(errors[i]);

				err.appendChild(txt);

				id("error_list").insertBefore(err, id("error_list").childNodes[0]);
			}
		}
		return false;
	}
}
//reset the form
function reset() {
	var i, //variables
	x = document.getElementById("contactForm").getElementsByTagName("input"),
	y = document.getElementsByTagName("textarea")[0];

	//for each error, remove red warning
	for (i = 0; i < x.length; i++) {
		x[i].removeAttribute("style");
	}

	y.removeAttribute("style");
	//delete all errors in the errors log
	errors.length = 0;

	//remove the list and the warning text
	id("x").removeChild(id("x").childNodes[0]);
	id("x").removeChild(id("x").childNodes[0]);
}

//function that gets an id from anywhere in the document
function id(e) {
	return document.getElementById(e);
}

//window onload creates a listener, on click
window.onload = function () {
	btn.onclick = function () {
		reset(); //reset the form first so every time you see a fresh form

		if (validate()) {
			console.log("OK"); //updates LOG to see
			updateText(); //runs an ajax function to add the details to a database
		} 
			return false;
		
	};
};

//new ajax object
var ajax = new XMLHttpRequest();

ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
        //when it has been loaded into database, delete form, and replace with a thank you notice	
		id("x").innerHTML = "Thank you for your comments";
		
		//LOG the reponse from the server
		console.log(ajax.responseText);
    }
}
function updateText() {
	//POST to the PHP file via AJAX POST
	var input = document.getElementById("contactForm").getElementsByTagName("input");
    ajax.open('POST', 'scripts/enquiry.php');
	ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded'); //the encoding that streams the data
	var data = "name=" + input[0].value;
		data += "&last=" + input[1].value; //values from the form
		data += "&tele=" + input[2].value;
		data += "&email="+ input[3].value;
		data += "&comment=" + document.getElementsByTagName("textarea")[0].value;

	ajax.send(data); //send the data
}