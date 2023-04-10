function categorylist(id)
{
 xmlHttp=GetXmlHttpObject1()
		if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		} 
		var url="ajax_category.php"
		url=url+"?id="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=stateChanged1 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
}

function stateChanged1() 
{ 
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
  document.getElementById("statenew").innerHTML=xmlHttp.responseText 
 } 
} 

function citylist(id)
{
//alert(id);
 xmlHttp=GetXmlHttpObject1()
		if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		} 
		var url="ajax_category.php"
		url=url+"?q="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=stateChanged2 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
}

function stateChanged2() 
{ 
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
  document.getElementById("citynew").innerHTML=xmlHttp.responseText 
 } 
} 

function communitylist(id)
{
 xmlHttp=GetXmlHttpObject1()
		if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request")
		return
		} 
		var url="comm_list.php"
		url=url+"?id="+id
		url=url+"&sid="+Math.random()
		xmlHttp.onreadystatechange=commChanged 
		xmlHttp.open("GET",url,true)
		xmlHttp.send(null)
}

function commChanged() 
{ 
 if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
  document.getElementById("caste").innerHTML=xmlHttp.responseText 
 } 
} 


function GetXmlHttpObject1()
{ 
 var objXMLHttp=null
 if (window.XMLHttpRequest)
 {
 objXMLHttp=new XMLHttpRequest()
 }
 else if (window.ActiveXObject)
 {
  objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
 }
 return objXMLHttp
}



