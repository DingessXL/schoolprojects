<?php session_start();
session_regenerate_id(true);
error_reporting(0);
function pageHeader($pt)
{	
	if(!(isset($_SESSION['login'])))
	{
		echo <<<_END
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link href="main2.css" type="text/css" rel="stylesheet">
    <header>
    <span>Georgia College Ladder</span>
    <a href="index.php">Home</a>
    <a href="formLoginLol.php">Log-in</a>
    <a href="register.php">Register</a>
    </header>
 	<br>
_END;
	}
	else 
	{
	echo <<<_END
	<link href="main2.css" type="text/css" rel="stylesheet">
    <header>
    <span>Georgia College Ladder</span>
    <a href="index.php">Home</a>
    <a href="index2.php">Ladder</a>
    <a href="account.php">Your Account</a>
    <a href="logout.php">Logout</a>
    </header>
    <h5> Welcome, {$_SESSION['login']}.</h5>
_END;
	}
}
?>