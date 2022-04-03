<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['edit'])){
	

$id = mysqli_escape_string($conn, $_POST['name']);
$email = mysqli_escape_string($conn, $_POST['email']);
$number = mysqli_escape_string($conn, $_POST['pnumber']);
$address = mysqli_escape_string($conn, $_POST['address']);
$items = mysqli_escape_string($conn, $_POST['items']);
$pickup = mysqli_escape_string($conn, $_POST['pickup']);
$return = mysqli_escape_string($conn, $_POST['return']);
$service = mysqli_escape_string($conn, $_POST['service']);




 $sql=" update clients 
         set 
		     `EMAIL`= IF('$email' = '', `EMAIL`, '$email'),
             `PNUMBER`= IF('$number' = '', `PNUMBER`, '$number'),
		     `ADDRESS`= IF('$address' = '', `ADDRESS`, '$address'), 
			 `PICKUP`= IF('$pickup' = '', `PICKUP`, '$pickup'),  				 
             `ITEMS`= IF('$items' = '', `ITEMS`, '$items'), 
		     `SERVICE`= IF('$service' = '', `SERVICE`, '$service'), 
			 `RETURN`= IF('$return' = '', `RETURN`, '$return') 
   
         where `O-ID` = '$id' ";

     if ($conn->query($sql) === TRUE) {
		header("location: incoming.php");
	 }




}
$conn->close();
?>