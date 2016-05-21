	
	
	var btn = document.getElementById("v1");
		
		btn.onclick = function()
		{
			loadXMLDoc("xml/topic_one.xml");
			//var t = new topics("xml/topic_one.xml");
			console.log ("OK");
			//t.ajax();
		}
	/*
	function topics (url)
	{
		var xmlhttp,txt,xx,x,i, u = url;
	
		this.ajax = function()
		{
			this.compatableTest();
			
			xmlhttp.onreadystatechange = function()
			{
			
				if (xmlhttp.readyState === 4 && xmlhttp.status === 200)
				{
				
					txt = "<h1>Web Topics: You are viewing Databases</h1>";
								
					x = xmlhttp.responseXML;//.documentElement.getElementsByTagName("CD");
					
 txt="<table border='1'><tr><th>Title</th><th>Artist</th></tr>";
    x=xmlhttp.responseXML.documentElement.getElementsByTagName("CD");
    for (i=0;i<x.length;i++)
      {
      txt=txt + "<tr>";
      xx=x[i].getElementsByTagName("TITLE");
        {
        try
          {
          txt=txt + "<td>" + xx[0].firstChild.nodeValue + "</td>";
          }
        catch (er)
          {
          txt=txt + "<td>&nbsp;</td>";
          }
        }
    xx=x[i].getElementsByTagName("ARTIST");
      {
        try
          {
          txt=txt + "<td>" + xx[0].firstChild.nodeValue + "</td>";
          }
        catch (er)
          {
          txt=txt + "<td>&nbsp;</td>";
          }
        }
      txt=txt + "</tr>";
      }
    txt=txt + "</table>";
				document.getElementsByClassName("l")[0].innerHTML=txt;
				}
			};
			
			this.send(u);
		};

		this.compatableTest = function ()
		{
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			else
			{// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
		};
		
		this.send = function (url)
		{
			xmlhttp.open("GET",url,true);
			xmlhttp.send();
		};
	}
*/

function loadXMLDoc(url)
{
var xmlhttp;
var txt,xx,x,i;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    txt="<table border='1'><tr><th>Title</th><th>Artist</th></tr>";
    x=xmlhttp.responseXML.documentElement.getElementsByTagName("CD");
    for (i=0;i<x.length;i++)
      {
      txt=txt + "<tr>";
      xx=x[i].getElementsByTagName("TITLE");
        {
        try
          {
          txt=txt + "<td>" + xx[0].firstChild.nodeValue + "</td>";
          }
        catch (er)
          {
          txt=txt + "<td>&nbsp;</td>";
          }
        }
    xx=x[i].getElementsByTagName("ARTIST");
      {
        try
          {
          txt=txt + "<td>" + xx[0].firstChild.nodeValue + "</td>";
          }
        catch (er)
          {
          txt=txt + "<td>&nbsp;</td>";
          }
        }
      txt=txt + "</tr>";
      }
    txt=txt + "</table>";
    document.getElementsByClassName("l")[0].innerHTML=txt;
    }
  }
xmlhttp.open("GET",url,true);
xmlhttp.send();
}