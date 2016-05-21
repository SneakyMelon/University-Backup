
var error;

document.getElementById("frmSubmit").onclick = function()
{
	reset();
	validation();
	
	if (error)
	{
		window.location = "#content";
		return false;
	}
	else
	{
		document.forms[2].submit();
	}
};

function reset()
{	
	error = false;
	var q = document.getElementById("errorList");
		q.innerHTML = "ERROR: Message Not Sent!";
		q.style.display = "none";
		
	var x = "";
	
	x = document.getElementById("YourName");
		x.removeAttribute("style");

	x = document.getElementById("YourEmail");
		x.removeAttribute("style");

	x = document.getElementById("YourMessage");
		x.removeAttribute("style");
		
	x = document.getElementById("contactReason");
		x.removeAttribute("style");
}

		//enquiry     = document.querySelector('input[type="radio"]:checked'), 
	var regExpName  = /^[a-zA-Z ]+$/;
	var	regExpEmail = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/;
		
function validation()
{
	var name        = document.forms[2].name.value,
		email       = document.forms[2].email.value, 
		message     = document.forms[2].message.value; 
	

	if (name == "" || name.match(regExpName) == null)
	{
		createUserError("YourName", "Please re-check your name.");
	}
	
	if (email == "" || email.match(regExpEmail) == null)
	{
		createUserError("YourEmail", "Please re-check E-mail address.");
	}
	
	if (message == "" || message.length < 26)
	{
		createUserError("YourMessage", "Please re-check Comment.");
	}
	
	if (document.querySelector('input[type="radio"]:checked') === null)
	{
		createUserError("contactReason", "Please tick a reason for contact.");
	}
	
}

function createUserError(id, message)
{
	document.getElementById(id).style.border = "2px solid red";
	
	var e = document.getElementById("errorList");
		e.style.display = "block";
		e.innerHTML += "<br />" + message;
	
	error = true;
}
