<?php require_once 'header.php';
require_once 'dbops.php';

$connection = connect();
if ($connection->connect_error){
	die ( "Unable to connect to database" . $conection->connect_error );
}

	$email= $_POST["email"];
	$pass= $_POST["password"];

	$query= "SELECT `email`, `password`, `sumName` FROM `summoners` WHERE `email`='$email' and `password`='$pass'";
	$result= mysqli_query($connection, $query);

	if(!$result)
		die ("Query Failed".mysqli_error($connection));

	$rows = $result->num_rows;
	$search = false;

	for($i = 0; $i < $rows; $i ++)
	{
		$result->data_seek($i);
		$record = mysqli_fetch_array($result, MYSQLI_ASSOC );
		if($record["email"]== $email &&  $record["password"]==$pass)
		{
			$search = true;
			continue;
		}
	}
	if($search == false)
	{
		echo "<h3>Invalid login information!</h3>";
	
	}
	else
	{
		$_SESSION['login']=$record["sumName"];
		$name=$_SESSION['login'];
		echo <<<_END
	<h3>
	$name, You are now logged in!
	</h3>
_END;
	}
pageHeader("Login");
?>