var text = "BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH BLAH ";
var x = document.getElementById("abtCompany");

window.onload = function()
{

	x.onclick = function(){
		moreOrLess()
		}
}
function moreOrLess()
{
	var y = document.getElementsByClassName("l")[0];
	
	if (document.getElementById("output"))
	{
		var z = document.getElementById("output");
		y.removeChild(z);
		x.innerHTML = "Want to know more? Click this link...";
	}
	else
	{
		var newItem = document.createElement("p") ;       // Create a <li> node
		var textnode = document.createTextNode(text);   // Create a text node
		
		newItem.setAttribute("id", "output");
		newItem.appendChild(textnode);                     // Append the text to <li>

		//var list = document.getElementById("myList");      // Get the <ul> element to insert a new node
		y.insertBefore(newItem, x);   // Insert <li> before the first child of <ul>
		x.innerHTML = "Click to show less...";
	}
}

