<?php
session_start();
require_once 'headerFoot.php';
require_once 'dbOperations.php';
pageHeader("Welcome!");
logIn();

$connection = connectDB("pizzastorehome");
if ($connection->connect_error) die("Unable to connect to database" . $connection->connect_error);

if (!isset($_SESSION['loggedIn'])) {
    $firstName = $_POST['firstname'];
    $lastName = $_POST['lastname'];
    $address = $_POST['address'];
    $password = $_POST['pwd'];

    if (!strpos($firstName, "admin") && !strpos($lastName, "admin")) {
        $username = strtolower("$firstName.$lastName");
    }

    $query = "INSERT INTO customers(lastName, firstName, address, username, password) VALUES ('$lastName', '$firstName','$address','$username','$password')";
    $result = $connection->query($query);
    if (!$result) die(" Query failed!" . $connection->connect_error);
    echo "<h3>Thank you for signing up for Daniel's Pizza!</h3>";


    if ($result) {
        session_destroy();
    }
} else
    echo "<p>You are already logged in. To use this feature, please sign out.</p>";

?>