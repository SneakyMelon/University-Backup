
function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("search-results").innerHTML="";
  document.getElementById("search-results").style.border="0px";
  return;
  }
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
    document.getElementById("search-results").innerHTML=xmlhttp.responseText;
    document.getElementById("search-results").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","scripts/search.php?q="+str,true);
xmlhttp.send();
}


//http://www.w3schools.com/php/php_ajax_livesearch.asp

function hideSearchResults()
{
    document.getElementById("search-results").innerHTML="";
    document.getElementById("search-results").style.border="";
}