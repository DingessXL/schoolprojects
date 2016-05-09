<?php
session_start();
require_once 'headerFoot.php';
require_once 'dbOperations.php';
pageHeader("Hello!");
logIn();

date_default_timezone_set("America/New_York");
$dateTime=date('m-d-Y');
$col=4;

$connection=connectDB("pizzastorehome");
if($connection->connect_error) die("Unable to connect to database".$connection->connect_error);

$username=$_POST['username'];
$password=$_POST['pwd'];
if(!isset($_SESSION['username']))
{
	$_SESSION['username'] = $username;
}

$query="SELECT * FROM customers WHERE username = '$username' AND password = '$password'";
$result=$connection->query($query);
if(!$result) die(" Query failed!".$connection->connect_error);



if($result && !strpos($username, "admin"))
{
	if(!isset($_SESSION['userLogin']))
	{
		$_SESSION['userLogin']="yes";
	}
	echo "<h3>Welcome back,'$username'</h3>";
}


if($result)
{
	if(strpos($username, "admin"))
	{
		if(!isset($_SESSION['adminLogin']))
		{
			$_SESSION['adminLogin']="yes";
		}
		echo "<h3>Welcome back ".$_SESSION['username']."!</h3>";
		$adminQuery="SELECT * FROM orders WHERE dateTime = '$dateTime'";
		$resultForAdmin=$connection->query($adminQuery);
		if(!$resultForAdmin) die ("Sorry, we can't retrieve those orders for you.".$connection->connect_error);
		if($resultForAdmin)
		{
			echo "<h4> ".$dateTime ."'s orders.</h4>";
			$rows=$resultForAdmin->num_rows;
			echo "<table>";
			echo "<th>Customer ID</th><th>Pizza ID</th><th>Size</th><th>Quantity</th>";
				for($i = 0; $i<$rows; $i++){
					if($i%$col==0)
					echo "<tr>";
					$resultForAdmin->data_seek($i);
					$record= $resultForAdmin->fetch_array(MYSQLI_ASSOC);
					$customerID = $record["customerID"];
					$pID = $record["pizzaID"];
					$size = $record["size"];
					$quantity = $record["quantity"];
					echo "<td>$customerID</td><td>$pID</td><td>$size</td><td>$quantity</td>";
					echo "</tr>";
			}
			echo "</table>";
		}
		
	}
}

?>