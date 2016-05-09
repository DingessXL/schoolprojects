<?php
session_start();
require_once 'headerFoot.php';
require_once 'dbOperations.php';
pageHeader("Place Orders");
logIn();

$connection=connectDB("pizzastorehome");
if($connection->connect_error) die("Unable to connect to database".$connection->connect_error);

$firstName=$_POST['firstname'];
$lastName=$_POST['lastname'];
$email=$_POST['email'];
$address=$_POST['address'];
$cardNum=$_POST['cardnumber'];

$customerID=rand(6,99);
date_default_timezone_set('America/New_York');
$dateTime= date('m-d-Y');

echo "<h3>Your Information:</h3>First Name: ".$firstName."<br>Last Name: ".$lastName."<br>Email: ".$email."<br>Address: ".$address."<br>Card Number: XXXX-XXXX-XXXX-XXXX";
echo "<h3>Your Order:</h3>";
if(!$_SESSION['cart']){
	echo "Nothing in cart!";
}
else {
	foreach ($_SESSION['cart'] as $key => $item) {
		$size = $item["size"];
		$quantity = $item["quantity"];
		$pizzaID = $_SESSION['cart'][$key]['pizzaID'];
		$size = $_SESSION['cart'][$key]['size'];
		$price = $_SESSION['cart'][$key]['price'];
		$quantity = $_SESSION['cart'][$key]['quantity'];


		echo "Pizza ID: " . $pizzaID . "<br>Size: " . $size . "<br>Quantity: " . $quantity . "<br>Price: " . $price;

		$query = "INSERT INTO orders(`customerID`, `pizzaID`, `quantity`, `size`,`dateTime`)
		VALUES ('$customerID','$pizzaID', '$quantity','$size', '$dateTime')";

		$result = $connection->query($query);

		if (!$result) die ("Query failed" . $connection->connect_error);
	}
}
	echo "<br><h3>The order has been placed.</h3>";

if($result)
{
	session_destroy();
}

?>