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

function kiem_tra_user(str) 
{
	var ketqua = document.getElementById('ketqua');
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(str.match(alphaExp)){
		if(str.length >= 6 && str.length <= 9){
		var xmlhttp = new createXmlHttp();
	    xmlhttp.onreadystatechange = function() {
	        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
	        	ketqua.setAttribute("class", "label label-success");
	            ketqua.innerHTML = xmlhttp.responseText;
	        }
	    };
	    xmlhttp.open("POST",'kiem_tra_user/'+str, true);
	    xmlhttp.send();
    	}else{
    		ketqua.setAttribute("class", "label label-danger");
    		ketqua.innerHTML = 'Vui lòng nhập tên từ 6->9 ký tự';
    		ketqua.focus();
    	}
    }else{
    	ketqua.setAttribute("class", "label label-danger");
    	ketqua.innerHTML = 'Vui lòng nhập chữ và số';
    	ketqua.focus();
    }
}

function phone(sdt){
	valid= document.getElementById('valid');
	var numericExpression = /^[0-9]+$/;
	if(sdt.match(numericExpression)){
		if(sdt.length >= 10 && sdt.length <= 11){
			valid.innerHTML = 'OK';
		}
	}
valid.setAttribute("class","label label-danger");
valid.innerHTML ='Vui lòng nhập đúng số điện thoại';
}



function kiem_tra_email(str) {
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(str.match(emailExp)){
    var xmlhttp = new createXmlHttp();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        	document.getElementById('idemail').setAttribute("class","label label-success");
            document.getElementById("idemail").innerHTML = xmlhttp.responseText;
        }
    };
    xmlhttp.open("POST",'kiem_tra_email/'+str, true);
    xmlhttp.send();
    }
    else {
    	document.getElementById('idemail').setAttribute("class","label label-danger");
    	document.getElementById('idemail').innerHTML = 'Vui lòng nhập đúng định dạng';
    	document.getElementById('email').focus();

}
}
function kiem_tra_ten(str){
	var nameexg= /^[a-zA-Z]+$/;
	if(str.match(nameexg)){
		document.getElementById('ten').setAttribute("class","label label-success")
		document.getElementById('ten').innerHTML ="Có thể dùng";
	}
	else{
	document.getElementById('ten').focus();
	document.getElementById('ten').innerHTML = 'Vui Lòng Nhập đúng định dạng';
}
}


