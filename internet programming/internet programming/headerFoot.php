<html>
<style>
    @import url(http://fonts.googleapis.com/css?family=Roboto);

    html {
        font-family: "Roboto", sans-serif;
        padding: 0px;
        margin: 0 auto;
        background-color: white;
        background-image: -moz-repeating-linear-gradient(-45deg, transparent, transparent 25px,#ADDFEA 25px,#ADDFEA 50px);
        background-image: -webkit-repeating-linear-gradient(-45deg, transparent, transparent 25px,#ADDFEA 25px,#ADDFEA 50px);
        background-image: -o-repeating-linear-gradient(-45deg, transparent, transparent 25px,#ADDFEA 25px,#ADDFEA 50px);
        background-image: -ms-repeating-linear-gradient(-45deg, transparent, transparent 25px,#ADDFEA 25px,#ADDFEA 50px);
        background-image: repeating-linear-gradient(-45deg, transparent, transparent 25px,#ADDFEA 25px,#ADDFEA 50px);
    }
    table {
        border-collapse: collapse;
        color: black;
        width: 800px;
    }

    table, td, th {
        border: 1px solid black;
        text-align: left;
    }

    h2 {
        font-size: 2vh;
        color: black;
    }

    body {
        text-align: center;
        margin: 0 auto;
        color: black;
        font-size: 2vh;
        width: 812px;
        background: white;
    }

    a:link {
        color: blue;
        font-size: 24px;
        margin-right: 10px;
        text-decoration: none;
    }

    a:hover, a:visited, a:active {
        color: lightblue;
    }

    form {
        text-align: center;
        margin: 0 auto;
        vertical-align: middle;
        margin-top: 25px;
    }

    header {
        width: 812px;
    }

    button {
        margin: 10px 10px 10px;
        border: 1px black solid;
        -webkit-box-shadow: black 2px 2px;
        padding: 10px 10px;
        font-size: 3vh;
        color: black;
    }

    .image1 {
        height: 30vh;
        width: 812px;
        position: relative;
    }

    h5 {
        font-size: 50px;
        font-weight: bold;
        color: white;
        text-shadow: 2px 2px black;
        position: absolute;
        z-index: 10;
        margin: 0 auto;
    }

    #login {
        position: fixed;
        background: white;
        border-radius: 5px;
        right: 2%;
        top: 2%;
        padding: 10px;
    }

    #goback{
        position: fixed;
        background: white;
        border-radius: 5px;
        right: 2%;
        top: 12%;
        padding: 10px;
    }

    #logina{
        text-decoration: none;
        font-size: 12pt;
        color: blueviolet;
    }
</style>

<?php
function logIn()
{
    if (isset($_SESSION['adminLogin']) || isset($_SESSION['userLogin'])) {
        if (isset($_SESSION['username'])) {
            $_SESSION['loggedIn'] = "yes";
            echo "<div id='login'>You are logged in as: <br>" . $_SESSION['username'] . ".";
            echo "( <a id='logina' href='logout.php'>Log Out</a>)</div>";
        }
    }
}

function pageHeader($test)
{
    echo "<header><h5>DANIEL'S PIZZA STORE</h5>
    <img src='headerimg.png' class='image1'>
	<a href='about.php'>ABOUT</a>
	<a href='menu.php'>MENU</a>
	<a href='checkout.php'>CHECKOUT</a>
	<a href='formLogin.php'>LOGIN</a>
	<a href='cart.php'>CART</a></header>";

    echo"<div id='goback'>
        <a id='logina' href= 'http://www.danieldingess.me'>Back to Personal <br> Website</a>
        </div>";
}


function generateTable($arr, $colNames)
{
    echo "<table>";
    echo "<tr>";

    foreach ($colNames as $col) {
        echo "<th>$col</th>";
    }
    echo "</tr>";
    foreach ($arr as $record) {
        echo "<tr>";
        foreach ($record as $col)
            echo "<td>$col</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>