<?php require_once 'header.php';
require_once 'dbops.php';

pageHeader("Change Name");

$connection = connect();
if ($connection->connect_error)
	die ( "unable to connect to database" . $connection->connect_error );

	$newName= $_POST["newName"];
	$oldName= $_SESSION['login'];
	
	
	$query= "UPDATE `summoners` SET `sumName`='$newName' WHERE sumName='$oldName'";
	$result=$connection->query($query);
	if(!$result) die ("Query Failed".mysqli_error($connection));
	
	
	echo "<h2> Your name has been changed to $newName.</h2>";
	
	$_SESSION['login']=$newName;
	


?>