<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['finish'])){	

if ($_POST['id'] == ""){ header("location: track_c.php");};

if (is_array($_POST['id'])){
	
	foreach ($_POST['id'] as $id){
		
		$sql="update clients set `STATUS` = 4 where `O-ID` = '$id'";
		
		    if ($conn->query($sql) === TRUE) {
				
              	header("location: track_c.php");

		}

		
	}

}

}
?>