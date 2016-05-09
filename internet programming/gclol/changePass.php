<?php require_once 'header.php';
require_once 'dbops.php';

pageHeader("Change Name");

$connection = connect();
if ($connection->connect_error)
	die ( "unable to connect to database" . $conection->connect_error );

	$newPass=$_POST["newPass"];
	$oldPass=$_POST["oldPass"];


	$query= "UPDATE `summoners` SET `password`='$newPass' WHERE `password`='$oldPass'";
	$result=$connection->query($query);
	if(!$result) die ("Query Failed".$connection->error());


	echo "<h2> Your password has been changed.</h2>";

?>
