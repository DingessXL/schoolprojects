<html>
<head>
    <style>
        table, td, th {
            border: 1px solid black;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 800px;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>
</html>
<?php
session_start();
require_once 'headerFoot.php';
pageHeader("Menu");
logIn();

if (isset($_SESSION['cart'])) {
    echo "<div id='checkout'>";
    $colNames = array("Item ID", "Pizza Name", "Size", "Quantity", "Price");
    generateTable($_SESSION['cart'], $colNames);

    echo "<h3> Total Price: $" . $_SESSION["totalPrice"] . ".00</h3><br><br>";
    echo "<form action= 'placeOrder.php' method= 'post'>
		<legend>Personal Information:</legend>
		First name:
		<input type='text' name='firstname' value=' '><br><br>
		Last name:
		<input type='text' name='lastname' value=' '><br><br>
		Email Address:
		<input type='email' name='email' value=' '><br><br>
		Address:
		<input type='text' name='address' value=' '><br><br>
		Card Number:
		<input type='text' name='cardnumber' value=' ' maxLength='16'><br><br>
		<button>Place Order</button>
		</form>
  		</div>
  		<div id='placeOrder'>
  		<form action='clear.php' method='post'>
  		<button>Clear Order</button>
  		</form>
  		</div>";
}
else {
    echo "You have no items in the cart!";
    $_SESSION['totalPrice'] = 0;
}


?>