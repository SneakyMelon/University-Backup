
var btn = id("send");
var input = [];
input = document.getElementById("contactForm").getElementsByTagName("input")

	var errors = [];
var regExp = {};
regExp.stringOnly = /^[a-zA-Z ]+$/; //upper, lower, spaces
regExp.tele = /\(?0( ?\d\)?){9,10}$/; //starts with 0, spaces, 9-10 long
regExp.email = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;

function validate() {
	var name = input[0].value;
	var last = input[1].value;
	var email = input[2].value;
	var tele = input[3].value;
	var mess = document.getElementsByTagName("textarea")[0].value;

	this.params = "name=" + name + "&last=" + last + "&email=" + email + "&tele=" + tele + "&comment=" + mess;

	if (name == "" || name.match(regExp.stringOnly) === null) {
		errors.push("- Incorrect Name: Letters and spaces only.");
		document.getElementById("contactForm").getElementsByTagName("input")[0].style.border = "3px solid red";
	}

	if (last == "" || last.match(regExp.stringOnly) === null) {
		errors.push("- Invalid Surname: Letters and spaces only.");
		document.getElementById("contactForm").getElementsByTagName("input")[1].style.border = "3px solid red";
	}

	if (email == "" || !email.match(regExp.email)) {
		errors.push("- Invalid Email Address.");
		document.getElementById("contactForm").getElementsByTagName("input")[2].style.border = "3px solid red";
	}

	if (tele == "" || !tele.match(regExp.tele)) {
		errors.push("- Invalid contact number - must start with 0 and be 9/10 numbers long.");
		document.getElementById("contactForm").getElementsByTagName("input")[3].style.border = "3px solid red";
	}

	if (mess == "") {
		errors.push("- You forgot to add a message");
		document.getElementsByTagName("textarea")[0].style.border = "3px solid red";
	}

	if (errors.length == 0) {
		return true;
	} else {

		var form = id("contactForm");

		if (!id("error_log")) {
			var newTag = document.createElement("p");
			var tagText = document.createTextNode("Warning - please fix the errors highlighted in red before continuing.");

			newTag.setAttribute("style", "margin: 7px; color: red;");
			newTag.setAttribute("id", "error_log");
			newTag.appendChild(tagText);

			id("x").insertBefore(newTag, id("x").childNodes[0]);

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

function reset() {
	var i,
	x = document.getElementById("contactForm").getElementsByTagName("input"),
	y = document.getElementsByTagName("textarea")[0];

	for (i = 0; i < x.length; i++) {
		x[i].removeAttribute("style");
	}

	y.removeAttribute("style");

	errors.length = 0;

	id("x").removeChild(id("x").childNodes[0]);
	id("x").removeChild(id("x").childNodes[0]);
}

function id(e) {
	return document.getElementById(e);
}

window.onload = function () {
	btn.onclick = function () {
		reset();

		if (validate()) {
			//id("contactForm").submit();
			console.log("OK");
			updateText();
		} 
			return false;
		
	};
};

var ajax = new XMLHttpRequest();

ajax.onreadystatechange = function() {
    if (ajax.readyState == 4) {
        //document.getElementById('content').innerHTML = ajax.responseText;
		
		id("x").innerHTML = "Thank you for your comments";
		
		console.log(ajax.responseText);
    }
}
function updateText() {
	
	var input = document.getElementById("contactForm").getElementsByTagName("input");
    ajax.open('POST', 'scripts/enquiry.php');
	ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
	var data = "name=" + input[0].value;
		data += "&last=" + input[1].value;
		data += "&tele=" + input[2].value;
		data += "&email="+ input[3].value;
		data += "&comment=" + document.getElementsByTagName("textarea")[0].value;
    //ajax.send('name1=value1&name2=value2');
	//ajax.send(data);
	
	//var data = "var1=" + "Allan" +  "&var2=" + "Davidson";
	ajax.send(data);
}