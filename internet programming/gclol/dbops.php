<?php
function connect()
{
    $SERVER_NAME = 'localhost';
    $DB_NAME = 'gclol';
    $USERNAME = 'root';
    $PASSWORD = '';

    $conn = new mysqli($SERVER_NAME, $USERNAME, $PASSWORD, $DB_NAME);
    if ($conn->connect_errno) {
        echo "Failed to connect to MySQL: (" . $conn->connect_errno . ") " . $conn->connect_error;
    }

    return $conn;
}

function close($conn){
    mysqli_close($conn);
}