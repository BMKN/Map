<?php
$servername = '127.0.0.1';
$username = "rot";
$password = "";
$database = "test";

// Create connection
$connect = new mysqli($servername, $username, $password,$database);

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 






?>