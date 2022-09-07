<?php
session_start();
include ("connect.php");

$pwd = $_SESSION['pwd'];
$username=$_SESSION['username'];
//Handle Return
if(isset($_POST['continue'])){
	session_start();
	$password = mysqli_escape_string($conn, $_POST['password']);
	$prev = mysqli_escape_string($conn, $_POST['prev_page']);
	if($password == $pwd){
		$_SESSION['admin_id']= $username;
		header('Location: ' . $prev);
	} else {
		header("location: login.php");
	}
}
?>