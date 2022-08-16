<?php
// conection file to connect web portal to database 

// define() is used to create constants
define("DB_HOST", "localhost");// your host
define("DB_USER", "root");// database username
define("DB_PASS", "");// database password
define("DB_NAME", "lb");// database name

// Create connection NOTE: Always in this order
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection or produce error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//else {echo "Connected successfully";}
?>