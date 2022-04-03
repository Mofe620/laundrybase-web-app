<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['track'])){	

	
$number = mysqli_escape_string($conn, $_POST['number']);

$sql = "SELECT * from clients where `PNUMBER` = '$number' ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
     // output data of each row
	 while($row = mysqli_fetch_assoc($result)) { 
    
	
	if ($row['STATUS'] == 0){ echo ('Your Laundry is awaiting PickUp'); }
	if ($row['STATUS'] == 1){ echo ('Your Laundry is being attended to right now'); }
	if ($row['STATUS'] == 2){ echo ('Your Laundry is en route to your address, could be there any minute'); }
	if ($row['STATUS'] == 3){ echo ('Your Laundry has been delivered'); }
	
	
 
	 }
}

else { 
    echo ("No laundry with that phone number in our Records");	
    
}



}

$conn->close();
?>                                                                             