<?php require_once 'header.php';
require_once 'dbops.php';

pageHeader("Account");

echo<<<_END

<form action="changeName.php" onsubmit="return allValid()" method='post' class="change">
  <fieldset>
    <legend>Change your account name</legend>
    <label>New Username:<input id="newName" type="text" name="newName" value=""></label>
    <input type="submit" value="Enter">
  </fieldset>
</form>

<form action="changePass.php" onsubmit="return allValid()" method='post' class="change">
  <fieldset>
    <legend>Change your password</legend>
	<label>Old Password:<input id="oldPass" type="password" name="oldPass" value=""></label>
    <label>New Password:<input id="newPass" type="password" name="newPass" value=""></label>
    <input type="submit" value="Enter">
  </fieldset>
</form>

_END;
?>