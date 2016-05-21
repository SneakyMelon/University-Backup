

function validate(){
	var form = document.forms[2];
	var error = false;
	var name, email, message, enquiry;
	
	var regExpName  = "/^[a-zA-Z ]+$/";
	var regExpEmail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
	
	name = form.name;
	email = form.email;
	message = form.message;
	
	enquiry = document.querySelector('input[type="radio"]:checked');
	
	if (name.value == "")
	{
		error = true;
	}
	
	if (email.value == "")
	{
		error = true;
	}

	if (message.value == "")
	{
		error = true;
	}

	if (enquiry.value == "")
	{
		error = true;
	}	
	
	
	
	
	
	
	
	
}