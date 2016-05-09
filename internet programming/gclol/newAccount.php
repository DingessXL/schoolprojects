<?php require_once 'header.php';
require_once 'dbops.php';
pageHeader("Register");
$connection = connect();
if ($connection->connect_error)
	die ( "unable to connect to database" . $connection->connect_error );

	$uName= $_POST["username"];
	$pass= $_POST["password"];
	$email= $_POST["email"];

	$query = "INSERT INTO `summoners`(`email`, `sumName`, `password`) VALUES ('$email','$uName','$pass')";
	$result=$connection->query($query);
	if(!$result) die ("Query Failed".$connection->error());


	$_SESSION['login']=$uName;
	echo <<<_END
	<h2 class=lefty>
	Welcome $uName! <br>
	<br>
	You are now logged in.
	</h2>
_END;
?>