<?php require_once 'header.php';
require_once 'dbops.php';
unset($_SESSION['login']);
pageHeader("Logout");
echo "<h3> You are now logged out. </h3>"
?>