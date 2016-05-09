<?php
function connectDB($server)
{
	$host = "localhost";
	$db = "danidslh_pizzastorehome";
	$user="danidslh_daniel";
	$pwd= "launch123";

	$connection = new mysqli($host,$user,$pwd,$db,3306);

	if($connection->connect_error)
		die("Unable to connect to database".$connection->connect_error);

	return $connection;
}


function closeConnection($results,$connection)
{
	$result->close();
	$connection->close();
}