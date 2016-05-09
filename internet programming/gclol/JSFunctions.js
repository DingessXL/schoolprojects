function validEmail(){
	var isValidEmail = false;
	var emailID = document.getElementById("emailID");
	var msg = document.getElementById("errEmail");

	if(emailID.value == "") {
		msg.innerText = "Email Required";
	}
	else if(contains(emailID.value,"@bobcats.gcsu.edu")){
		msg.innerHTML = "Invalid Email Address."
	}
	else{
		msg.innerText = "";
		isValidEmail = true;
	}
	return isValidEmail;
}
function validName()
{
	var isValidName=false;
	var nameId=document.getElementById("nameId");
	var msg=document.getElementById("errName");
	
	if(nameId.value=="")
		msg.innerText="Name field is required";
		else if (/[^a-zA-Z0-9\s]/.test(nameId.value))
			msg.innerText="Please enter a valid name!";
			else
				{
				msg.innerText="";
				isValidName=true;
				}
	return isValidName;
}

function validPwd()
{
	var isValidPwd=false;
	var pwd=document.getElementById("pwdId");
	var msg=document.getElementById("errPwd");
	
	if(pwd.value=="")
		msg.innerText="Password field is required";
	else if(pwd.value.length < 6)
		msg.innerText="Password not long enough!";
	else{
		isValidPwd=true;
		msg.innerHTML="";
	}
	return isValidPwd;
}

function allValid()
{
	return validName()&& validPwd() && validEmail()
}

function loginValid(){
	return validEmail() && validPwd();
}