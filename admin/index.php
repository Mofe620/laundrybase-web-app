<?php
session_start();
if (!isset($_SESSION['userid']) || (trim ($_SESSION['userid']) == '')){	
	header("location: login.php");
	?>
	
	<?php
	exit();
} else {
    header("location: dashboard.php");
}
?>