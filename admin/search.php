<!doctype html>
<html>
    <head>
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	</head>
<body>
<!-- this file is for the "track_c" page -->
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
 while($row = mysqli_fetch_assoc($result))  {
		 	echo "<table class='table table-dark'>";
			echo "<tr>";
			echo "<th>"."NAME"."</th>";
			echo "<th>"."PHONE"."</th>";
			echo "<th>"."EMAIL"."</th>";
			echo "<th>"."ADDRESS"."</th>";
			echo "<th>"."ITEMS"."</th>";
			echo "<th>"."FEE"."</th>";
			echo "</tr>";
			echo "<tr>";
			echo "<td>".$row['NAME']."</td>";
			echo "<td>".$row['PNUMBER']."</td>";
			echo "<td>".$row['EMAIL']."</td>";
			echo "<td>".$row['ADDRESS']."</td>";
			echo "<td>".$row['ITEMS']."</td>";
			echo "<td>"."N".$row['PAYMENT']."</td>";
			echo "</tr>";
			echo "</table>";
}
?>


</body>
</html>