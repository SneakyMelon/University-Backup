function load(url) {

	var xmlhttp, //
	txt,
	x,
	xx,
	i; //variable list
	
	
	if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else { // code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//on state change
	xmlhttp.onreadystatechange = function () {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			txt = "<div id='xxx'>";
			
			//loads elements from the XML file
			
			x = xmlhttp.responseXML.documentElement.getElementsByTagName("topic");
			for (i = 0; i < x.length; i++) {
				xx = x[i].getElementsByTagName("title"); {
					try {
						txt = txt + xx[0].firstChild.nodeValue;
					} catch (er) {
						txt = txt + "<h2>Could not load head-tag</h2>";
					}
				}

				xx = x[i].getElementsByTagName("text"); {
					try {
						txt = txt + "<p>" + xx[0].firstChild.nodeValue + "</p>";
					} catch (er) {
						txt = txt + "<p> Could not load content. </p>";
					}
				}
			}
			txt = txt + "</div>";
			document.getElementById('response').innerHTML = txt;
		}
	}
	//send the request AJAX GET
	xmlhttp.open("GET", url, true);
	xmlhttp.send();
}
