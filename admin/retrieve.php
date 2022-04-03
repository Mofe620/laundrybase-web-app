<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['retrieve'])){	

if ($_POST['tag'] == ""){ header("location: track_b.php");};
 

if (is_array($_POST['tag'])){
	
	foreach ($_POST['tag'] as $tag){
		
		$sql="update trackb set `STATUS` = 'RETRIEVED' where `TAG` = '$tag'";
		
		if ($conn->query($sql) === TRUE) {
			

		}
		
		$sql="select * from tagging where `TAG` = '$tag'";
		
		$result = mysqli_query($conn, $sql);
		
		while($row = mysqli_fetch_assoc($result)) { 

        $id = $row['O-ID'];

        $sql=" update clients set status = 3 where `O-ID` = '$id' ";

        if ($conn->query($sql) === TRUE) {
			
			header("location: track_b.php");

		}

		
	}

	}
}
}

if(isset($_POST['remove'])){
	
	if ($_POST['tag'] == ""){ header("location: track_b.php");};
	

    if (is_array($_POST['tag'])){
	
	foreach ($_POST['tag'] as $tag){
		
		$sql="delete from trackb where `TAG` = '$tag'";
		
		if ($conn->query($sql) === TRUE) {
			

		}
		
		
		$sql="select * from tagging where `TAG` = '$tag'";
		
		$result = mysqli_query($conn, $sql);
		
		while($row = mysqli_fetch_assoc($result)) { 

        $id = $row['O-ID'];

        $sql=" update clients set status = 1 where `O-ID` = '$id' ";

        if ($conn->query($sql) === TRUE) {
			
			
		}
		
		$sql = "delete from tagging where `TAG` = '$tag'";
		if ($conn->query($sql) === TRUE) {
			header("location: assign.php");

		}

		
	}

	}
}
}
?>