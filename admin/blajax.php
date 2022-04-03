<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

$q = intval($_GET['q']);

$sql="select * from laundryblock where `B-ID` = '".$q."' ";
$result = mysqli_query($conn, $sql);
$info = array();
 while($row = mysqli_fetch_assoc($result))  {
	 $contact = $row['CONTACT'];
	 $address = $row['ADDRESS'];
	 $info = array( 'number' => $contact, 'address' => $address);
	
	
}
echo (json_encode($info));
?>