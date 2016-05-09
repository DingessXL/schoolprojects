<?php
session_start();
require_once 'dbOperations.php';
require_once 'headerFoot.php';
pageHeader("Menu");
logIn();

$col = 4;
$connection = connectDB("localhost");
if ($connection->connect_error) die("unable to connect to database" . $conection->connect_error);

$query = "SELECT pizzaID, pizzaName, price, imageName FROM pizzas";

$result = $connection->query($query);

if (!$result) die ("Query failed" . $connection->connect_error);
$rows = $result->num_rows;

echo "<table>";
for ($i = 0; $i < $rows; $i++) {
    if ($i % $col == 0)
        echo "<tr>";
    $result->data_seek($i);
    $record = $result->fetch_array(MYSQLI_ASSOC);
    $pN = $record["pizzaName"];
    $price = $record["price"];
    $imgN = $record["imageName"];
    $pID = $record["pizzaID"];
    echo "<td>";

    echo "<form action='cart.php' method='post'>
	<img src='$imgN' alt='$pN' height='200px' width='200px'>
	<h4>$pN<br></h4>
	<h4> Price: $$price.00<br>
			<select name='size'>
  				<option value='S'>Small</option>
  				<option value='M'>Medium</option>
  				<option value='L'>Large</option>
  				<option value='XL'>Extra-Large</option>
			</select><br>
			<button>Add to Order</button>
			</h4>

		<input type='hidden' name=pizzaID value='$pID'>
  		<input type='hidden' name=pizzaName value='$pN'>
  		<input type='hidden' name=price value='$price'>
  		
</form>";

    echo "</td>";
    if ($i % $col == 3)
        echo "</tr>";
}
echo "</table>";


?>