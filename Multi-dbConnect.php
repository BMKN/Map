<?php
$servername = '127.0.0.1';
$username = "rot";
$password = "";
$database = "test";

// Create connection

$mysqli  = new mysqli($servername, $username, $password,$database);

// Check connection
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}





?>