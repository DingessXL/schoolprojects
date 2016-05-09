<?php require_once 'header.php';
require_once 'dbops.php';

pageHeader("Login");
?>
<html>
<head>
	<script src= "JSFunctions.js"></script>
</head>
<body>
<?php
if(!(isset($_SESSION['login'])))
{
	echo<<<_END
<form class="center" action="login2.php" onSubmit="return loginValid()" method='post' id="sign-in">
  <fieldset>
    <legend>Sign in to Your Account</legend>
    <label>E-mail:<input id="emailId" type="email" name="email" onblur="validEmail()" required></label><span class="error" id="errEmail"></span>
   	<label>Password:<input id="pwdId" type="password" name="password" onblur="validPwd()" required></label><span class= "error" id="passErr"></span>
    <input type="submit" value="Enter">
  </fieldset>
</form>
		
_END;
}
else {
	echo<<<_END
	<h3>
	You are already logged in.
	</h3>
_END;
} //ends else*/
?>
</body>
</html>