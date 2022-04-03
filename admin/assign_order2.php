<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['assign'])){	

if ($_POST['id'] == ""){ header("location: assign.php");};
	

if (is_array($_POST['id'])){
	
	foreach ($_POST['id'] as $id){
		$block = mysqli_escape_string($conn, $_POST['block']);
        $tag = mysqli_escape_string($conn, $_POST['tag']);
        $service = mysqli_escape_string($conn, $_POST['service']);
		
		$sql="Select * from clients where `O-ID` = '$id' ";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) { 
        $items = $row['ITEMS'];
		
		$sql0="Select * from clients where `O-ID` = '$id' ";
        $result = mysqli_query($conn, $sql0);
        while($row = mysqli_fetch_assoc($result)) { 
        $date = $row['RETURN'];
        $due = date( 'Y-m-d', strtotime($date . ' -1 day' ));
		
				

        $sql1="Select * from clients where `O-ID` = '$id' ";
        $result = mysqli_query($conn, $sql1);
        while($row = mysqli_fetch_assoc($result)) { 
        $date = $row['RETURN'];
        $retrieve = date( 'Y-m-d', strtotime($date . ' -1 day' ));


    $sql = "INSERT INTO trackb (`O-ID`, `TAG`, `BLOCK`, `ITEMS`, `RETRIEVE`, `STATUS`)
VALUES ('$id','$tag','$block', '$items','$retrieve','PENDING' )";

 if ($conn->query($sql) === TRUE) {
	   }

    $sql2 = "INSERT INTO tagging (`O-ID`, `BLOCK`, `ITEMS`, `TAG`, `DUE_DATE`, `SERVICE`)
    VALUES ('$id','$block', '$items','$tag','$retrieve', '$service' )";

}

    

if ($conn->query($sql2) === TRUE) {

			  ?>
	       <script type="text/javascript">
		   alert("Tagging Successful!");
		   window.location="assign.php";
		   </script>
			<?php
}

$sql=" update clients set status = 2 where `O-ID` = '$id' ";

       if ($conn->query($sql) === TRUE) {
	   }

	   
} 



	}
}
}



}

$conn->close();
?>