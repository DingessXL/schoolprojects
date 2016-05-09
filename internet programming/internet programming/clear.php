<?php
session_start();
require_once 'headerFoot.php';
pageHeader("Cart");
logIn();

if(isset($_SESSION['cart']))
{
	session_destroy();
	echo "Your cart has been emptied.";
}

?>