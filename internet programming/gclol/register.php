<?php
require_once 'dbops.php';
require_once 'header.php';
pageHeader("Register");
?>

<html>
<head>
    <script type="text/javascript" src="JSFunctions.js"></script>
</head>
<body>

<form action="newAccount.php" onsubmit=" return allValid()" method='post' id="sign-in">
  <fieldset>
    <legend>Create your account</legend>
    <label>Email:<input id="emailID" type="email" name="email" onblur="validEmail()"></label>
    <span class="error" id="errEmail"></span>
    <label>Username:<input id="nameId" type="text" name="username" onblur="validName()"></label>
	<span class="error" id="errName"></span>
	<label>Password<input id="pwdId" type="password" name="password" onblur="validPwd()"></label>
	<span class="error" id="errPwd"></span>
    <input type="submit" value="Enter">
  </fieldset>
</form>
</body>
</html>
