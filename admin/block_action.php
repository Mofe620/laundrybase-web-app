<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");



if(isset($_POST['add'])){	
$id = mysqli_escape_string($conn, $_POST['id']);
$name = mysqli_escape_string($conn, $_POST['name']);
$number = mysqli_escape_string($conn, $_POST['number']);
$address = mysqli_escape_string($conn, $_POST['address']);

	
	
	$sql = "INSERT INTO laundryblock (`NAME`, `ADDRESS`, `CONTACT` )
VALUES ('$name','$address','$number')";

if ($conn->query($sql) === TRUE) {

			  
		header ("location: blocks.php");
              die();
			  
	       
				

  } 
   }
   
   
if(isset($_POST['bupdate'])){

		
$id = mysqli_escape_string($conn, $_POST['name']);
$number = mysqli_escape_string($conn, $_POST['number']);
$address = mysqli_escape_string($conn, $_POST['address']);


   
   $sql=" update laundryblock 
         set  
		     `ADDRESS`= IF('$address' = '', `ADDRESS`, '$address'), 
			 `CONTACT`= IF('$number' = '', `CONTACT`, '$number') 
   
   
         where `B-ID` = '$id' ";

     if ($conn->query($sql) === TRUE) {
		 
		 header ("location: blocks.php");
              die();
		 
	 }
	}



if(isset($_POST['delete'])){	
if ($_POST['id'] == ""){ header("location: blocks.php");};	
if (is_array($_POST['id'])){
	echo $_POST['id'];
	foreach ($_POST['id'] as $a){
		
		$sql="delete from laundryblock where `B-ID` = '$a' ";
		
		    if ($conn->query($sql) === TRUE) {
				
              	header("location: blocks.php");

		}

		
	}

}

}
		 
$conn->close();
?>
