function formValidation(){

	// Make quick references to our fields
	var username =  document.getElementById('username');
	var email =  document.getElementById('email');
	var re_password = document.getElementById('re_password');
	var password = document.getElementById('password');
	var name = document.getElementById('name');
	var phone = document.getElementById('phone');

	//  to check empty form fields.
if(textAlphanumeric(username, 'Nhập đúng định dạng bao gồm chữ') && lengthDefine(username,6,9)){
	if(validPass(re_password,password,'Pass không trùng')){
		if(emailValidation(email,'Vui lòng nhập 1 email hợp lệ')){
			if(inputAlphabet(name,'Vui Lòng Nhập đúng tên')){
				if(lengthDefine(phone,10,11)){
					return true;
				}
			}
		}

	}

}
return false;

	// Check each input in the order that it appears in the form!

//function that checks whether input text is numeric or not.
function validPass(re_password,password,alertMsg){
	password = document.getElementById('password').value;
	if(re_password.value.match(password)){
		return true;
	}
	else{
		document.getElementById('validPass').innerText = alertMsg;
		re_password.focus();
		return false;
	}
}


function textNumeric(inputtext, alertMsg){
	var numericExpression = /^[0-9]+$/;
	if(inputtext.value.match(numericExpression)){
		return true;
	}else{
		document.getElementById('p6').innerText = alertMsg;  //this segment displays the validation rule for zip
		inputtext.focus();
		return false;
	}
}


//function that checks whether input text is an alphabetic character or not.

function inputAlphabet(inputtext){

	var alphaExp = /^[a-zA-Z]+$/;
	if(inputtext.value.match(alphaExp)){
		return true;
	}else{
		//document.getElementById('p1').innerText = alertMsg;  //this segment displays the validation rule for name
		//alert(alertMsg);
		//inputtext.focus();
		return false;
	}
}
// TEST

//function that checks whether input text includes alphabetic and numeric characters.

function textAlphanumeric(inputtext, alertMsg){
	var alphaExp = /^[0-9a-zA-Z]+$/;
	if(inputtext.value.match(alphaExp)){
		return true;
	}else{
		document.getElementById('vali_username').innerText = alertMsg; //this segment displays the validation rule for address
		inputtext.focus();
		return false;
	}
}

// Function that checks whether the input characters are restricted according to defined by user.

function lengthDefine(inputtext, min, max){
	var uInput = inputtext.value;
	if(uInput.length >= min && uInput.length <= max){
		return true;
	}else{
		document.getElementById('p2').innerText = "* Vui lòng nhập số kí tự từ " +min+ " đến " +max+ " *"; //this segment displays the validation rule for username
		inputtext.focus();
		return false;
	}
}

// Function that checks whether a option is selected from the selector and if it's not it displays an alert message.

function trueSelection(inputtext, alertMsg){
	if(inputtext.value == "Please Choose"){
		document.getElementById('p4').innerText = alertMsg; //this segment displays the validation rule for selection
		inputtext.focus();
		return false;
	}else{
		return true;
	}
}

// Function that checks whether an user entered valid email address or not and displays alert message on wrong email address format.

function emailValidation(inputtext){
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	if(inputtext.value.match(emailExp)){
		return true;
	}else{
		// document.getElementById('p3').innerText = alertMsg; //this segment displays the validation rule for email
		inputtext.focus();
		return false;
	}
}