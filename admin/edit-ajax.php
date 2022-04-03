<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

$q = intval($_GET['q']);

$sql="select * from clients where `O-ID` = '".$q."' ";
$result = mysqli_query($conn, $sql);
$req = array();
 while($row = mysqli_fetch_assoc($result))  {
	 $contact = $row['PNUMBER'];
	 $address = $row['ADDRESS'];
	 $email = $row['EMAIL'];
	 $items = $row['ITEMS'];
	 $service = $row['SERVICE'];
	 $pickup = $row['PICKUP'];
	 $return = $row['RETURN'];
	 
	 $req = array( 'number' => $contact, 'address' => $address, 'email' => $email, 'items' => $items, 'service' => $service, 'pickup' => $pickup, 'return' => $return );
	
	
}
echo (json_encode($req));
?>