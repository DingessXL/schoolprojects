<?php
session_start();
require_once 'headerFoot.php';
pageHeader("Login");
logIn();

if(!isset($_SESSION['loggedIn']))
{
	echo "<form action = 'login.php' method = 'post'>
		<fieldset>
			<legend>Log in:</legend>
			User Name:<br>
			<input type = 'text' name = 'username' value = ''><br>
			Password: <br>
			<input type = 'password' name = 'pwd' value = ''><br><br>
			<button>Log In</button></form>
			<form action = 'signup.php' method = 'post'>
			<button>New User?</button></form>
		</fieldset>";
}

else
	echo "<p style='color:red;'>You must log out first to use this feature.</p>";

?>