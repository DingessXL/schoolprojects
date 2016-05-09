<?php
session_start();
require_once 'dbOperations.php';
require_once 'headerFoot.php';
pageHeader("Cart");
logIn();

if (isset($_POST['pizzaName'])) {
    $pN = $_POST["pizzaName"];
    $price = $_POST["price"];
    $pID = $_POST["pizzaID"];
    $size = $_POST["size"];
    $itemID = $size . $pID;

    if (!isset($_SESSION['totalPrice']))
        $_SESSION['totalPrice'] = $price;
    else
        $_SESSION['totalPrice'] += $price;

    if (!isset($_SESSION['cart'][$itemID])) {
        $_SESSION['cart'][$itemID]["pizzaID"] = $pID;
        $_SESSION['cart'][$itemID]["name"] = $pN;
        $_SESSION['cart'][$itemID]["size"] = $size;
        $_SESSION['cart'][$itemID]["quantity"] = 1;
        $_SESSION['cart'][$itemID]["price"] = "$" . $price . ".00";
    } else {
        $_SESSION['cart'][$itemID]["quantity"] += 1;
    }
    echo "<br>";
}
if (isset($_SESSION['cart'])) {
    $colNames = array("Item ID", "Pizza Name", "Size", "Quantity", "Price");
    generateTable($_SESSION['cart'], $colNames);
    echo "<h3> Total Price: $" . $_SESSION['totalPrice'] . ".00<h3>";
    echo "<form action='checkout.php' method='post'>
	<button>Check Out</button>
	</form>
	<br>
	<form action='clear.php' method='post'>
  	<button>Empty Cart</button></form>";
} else {
    echo "The cart is empty!";
}

?>