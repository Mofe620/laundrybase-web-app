<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");


$sql="update notifications set view = 1 where view = 0";
 if ($conn->query($sql) === TRUE) {
		 	
}

?>