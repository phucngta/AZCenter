function createXmlHttp()
{
	var xmlHttp = null;
	try
	{
		 // Firefox, Opera 8.0+, Safari
		 xmlHttp=new XMLHttpRequest();
		}
		catch (e)
		{
	 // Internet Explorer
	 try
	 {
	 	xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
	 }
	 catch (e)
	 {
	 	try
	 	{
	 		xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
	 	}
	 	catch (e)
	 	{
	 		alert("Your browser does not support AJAX!");
	 		return false; 
	 	}
	 }
	}
	return xmlHttp; 
}

function getUsers(group_id)
{
	xmlHttp = new createXmlHttp();
	url = 'users/index/'+group_id;

	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState =="complete")
		{
			document.getElementById('ajax_display').innerHTML = xmlHttp.responseText;
		}
	} 
}
function getKhoahoc(makh) 
{
	xmlHttp = new createXmlHttp();
	url = 'khoahoc/indexs/'+makh;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

	xmlHttp.onreadystatechange=function()
	{
		if(xmlHttp.readyState==4 || xmlHttp.readyState =="complete")
		{
			document.getElementById('ajax_display').innerHTML = xmlHttp.responseText;
		}
	} 
}

function previewImage(input) 
{
	if (input.files && input.files[0]) 
	{
		var reader = new FileReader();
		reader.onload = function (e) {
			$('#view')
			.attr('src', e.target.result)
			.width(200)
			.height(200);
		};
		reader.readAsDataURL(input.files[0]);
	}
}

function kiem_tra_user(str) {
	
	var xmlhttp = new createXmlHttp();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("ketqua").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",'kiem_tra_user/'+str, true);
    xmlhttp.send();

    }

function kiem_tra_email(str) {

    var xmlhttp = new createXmlHttp();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            document.getElementById("idemail").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",'kiem_tra_email/'+str, true);
    xmlhttp.send();
    } 
