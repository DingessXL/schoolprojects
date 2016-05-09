<?php
session_start();
require_once 'headerFoot.php';
pageHeader("Sign Up");
logIn();

echo "<form action = 'newUser.php' method = 'post'>
	<fieldset>
		<legend>Sign Up:</legend>
		First Name: <br>
		<input type = 'text' name = 'firstname' value = ''><br>
		Last Name: <br>
		<input type = 'text' name = 'lastname' value = ''><br>
		Address: <br>
		<input type = 'text' name = 'address' value = ''><br>
		Password: <br>
		<input type = 'password' name = 'pwd' value = ''><br><br>
		<button>Submit</button>
	</fieldset>
</form>";

?>