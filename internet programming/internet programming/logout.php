<?php
session_start();
require_once 'headerFoot.php';
pageHeader("Log Out");

if (isset($_SESSION['username'])) {
    session_destroy();
    echo "You have been logged out.";
}

?>