<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);
session_start();
//$userid= $_SESSION['id'];
include ("connect.php");

if(isset($_POST['submit'])){	

	
$name = mysqli_escape_string($conn, $_POST['name']);
$email = mysqli_escape_string($conn, $_POST['email']);
$number = mysqli_escape_string($conn, $_POST['pnumber']);
$address = mysqli_escape_string($conn, $_POST['address']);
//$items = mysqli_escape_string($conn, $_POST['items']);
$pickup = mysqli_escape_string($conn, $_POST['pickup']);
$return = mysqli_escape_string($conn, $_POST['return']);
$service = mysqli_escape_string($conn, $_POST['service']);
$message = "You have successfully requested our Laundry service. Our PickUp team will be at your specified address in no time!";
$shirts = mysqli_escape_string($conn, $_POST['shirts']);
$trousers = mysqli_escape_string($conn, $_POST['trousers']);
$children = mysqli_escape_string($conn, $_POST['children']);
$blouses = mysqli_escape_string($conn, $_POST['blouses']);
$skirts = mysqli_escape_string($conn, $_POST['skirts']);
$suits = mysqli_escape_string($conn, $_POST['suits']);

if ($service == "Wash and Fold"){ $sql = 'select  `W-F` from prices where `ITEMS` = "Shirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u1 = $row['W-F'];
										$p1 = (int)$u1 * (int)$shirts;
										
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Skirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u2 = $row['W-F'];
										$p2 = (int)$u2 * (int)$skirts;
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Trousers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u3 = $row['W-F'];
										$p3 = (int)$u3 * (int)$trousers;
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Blouses" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u4 = $row['W-F'];
										$p4 = (int)$u4 * (int)$blouses;
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Suits and Blazers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u5 = $row['W-F'];
										$p5 = (int)$u5 * (int)$suits;
										
										
										$sql = 'select  `W-F` from prices where `ITEMS` = "Children Wears" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u6 = $row['W-F'];
										$p6 = (int)$u6 * (int)$children;
										
										if ($shirts != 0){ $c1 = $shirts."Shirts";} else { $c1 = "";};
										if ($skirts != 0){ $c2 = $skirts."Skirts";} else { $c2 = "";};
										if ($suits != 0){ $c3 = $suits."Suits";} else { $c3 = "";};
										if ($blouses != 0){ $c4 = $blouses."Blouses";} else { $c4 = "";};
										if ($trousers != 0){ $c5 = $trousers."Trousers";} else { $c5 = "";};
										if ($children != 0){ $c6 = $children."Children Wears";} else { $c6 = "";};
										
									
 $price = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6; 
 $items = $c1."".$c2."".$c3."".$c4."".$c5."".$c6; 
                                      

$sql = "INSERT INTO clients (`NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `ITEMS`, `PICKUP`,  `SERVICE`, `RETURN`, `PAYMENT` )
VALUES ('$name','$email','$number','$address', '$items', '$pickup', '$service', '$return', '$price' ); "; 

   
if ($conn->query($sql) === TRUE) {
	} else { echo mysqli_error($conn);
	//die();
}
			$sql = "INSERT INTO notifications (`NAME`, `SERVICE`, `TIME` )
VALUES ('$name','$service', now() ); ";

      if ($conn->query($sql) === TRUE) {
		  
	
	?>
	<script>
	  alert("Cheers! You've Requested Laundry Service. Our PickUP Staff will be with you shortly.");
	  window.location = "pricing.php";
	  $('#successModal').modal('show');
	</script>
	<?php
              die();	  
		 
  } 






									}}							}}}
									}					
								  }
	
	
if ($service == "Only Iron"){ $sql = 'select  `IRON` from prices where `ITEMS` = "Shirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u1 = $row['IRON'];
										$p1 = (int)$u1 * (int)$shirts;
										
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Skirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u2 = $row['IRON'];
										$p2 = (int)$u2 * (int)$skirts;
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Trousers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u3 = $row['IRON'];
										$p3 = (int)$u3 * (int)$trousers;
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Blouses" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u4 = $row['IRON'];
										$p4 = (int)$u4 * (int)$blouses;
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Suits and Blazers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u5 = $row['IRON'];
										$p5 = (int)$u5 * (int)$suits;
										
										
										$sql = 'select  `IRON` from prices where `ITEMS` = "Children Wears" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u6 = $row['IRON'];
										$p6 = (int)$u6 * (int)$children;
										
										if ($shirts != 0){ $c1 = $shirts."Shirts";} else { $c1 = "";};
										if ($skirts != 0){ $c2 = $skirts."Skirts";} else { $c2 = "";};
										if ($suits != 0){ $c3 = $suits."Suits";} else { $c3 = "";};
										if ($blouses != 0){ $c4 = $blouses."Blouses";} else { $c4 = "";};
										if ($trousers != 0){ $c5 = $trousers."Trousers";} else { $c5 = "";};
										if ($children != 0){ $c6 = $children."Children Wears";} else { $c6 = "";};
										
									
 $price = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6; 
 $items = $c1."".$c2."".$c3."".$c4."".$c5."".$c6; 
                                      

$sql = "INSERT INTO clients (`NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `ITEMS`, `PICKUP`,  `SERVICE`, `RETURN`, `PAYMENT` )
VALUES ('$name','$email','$number','$address', '$items', '$pickup', '$service', '$return', '$price' ); "; 

   
if ($conn->query($sql) === TRUE) {
	} else { echo mysqli_error($conn);
	//die();
}
			$sql = "INSERT INTO notifications (`NAME`, `SERVICE`, `TIME` )
VALUES ('$name','$service', now() ); ";

      if ($conn->query($sql) === TRUE) {
		  
	
	?>
	<script>
	  alert("Cheers! You've Requested Laundry Service. Our PickUP Staff will be with you shortly.");
	  window.location = "pricing.php";
	  $('#successModal').modal('show');
	</script>
	<?php
              die();	  
		 
  } 






									}}							}}}
									}					
								  }

if ($service == "Dry Clean"){ $sql = 'select  `D-C` from prices where `ITEMS` = "Shirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u1 = $row['D-C'];
										$p1 = (int)$u1 * (int)$shirts;
										
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Skirts" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u2 = $row['D-C'];
										$p2 = (int)$u2 * (int)$skirts;
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Trousers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u3 = $row['D-C'];
										$p3 = (int)$u3 * (int)$trousers;
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Blouses" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u4 = $row['D-C'];
										$p4 = (int)$u4 * (int)$blouses;
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Suits and Blazers" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u5 = $row['D-C'];
										$p5 = (int)$u5 * (int)$suits;
										
										
										$sql = 'select  `D-C` from prices where `ITEMS` = "Children Wears" '; 
                                   $result = mysqli_query($conn, $sql);
					                while($row = mysqli_fetch_assoc($result)) {
										$u6 = $row['D-C'];
										$p6 = (int)$u6 * (int)$children;
										
										if ($shirts != 0){ $c1 = $shirts."Shirts";} else { $c1 = "";};
										if ($skirts != 0){ $c2 = $skirts."Skirts";} else { $c2 = "";};
										if ($suits != 0){ $c3 = $suits."Suits";} else { $c3 = "";};
										if ($blouses != 0){ $c4 = $blouses."Blouses";} else { $c4 = "";};
										if ($trousers != 0){ $c5 = $trousers."Trousers";} else { $c5 = "";};
										if ($children != 0){ $c6 = $children."Children Wears";} else { $c6 = "";};
										
									
 $price = (int)$p1 + (int)$p2 + (int)$p3 + (int)$p4 + (int)$p5 + (int)$p6; 
 $items = $c1."".$c2."".$c3."".$c4."".$c5."".$c6; 
                                      

$sql = "INSERT INTO clients (`NAME`, `EMAIL`, `PNUMBER`, `ADDRESS`, `ITEMS`, `PICKUP`,  `SERVICE`, `RETURN`, `PAYMENT` )
VALUES ('$name','$email','$number','$address', '$items', '$pickup', '$service', '$return', '$price' ); "; 

   
if ($conn->query($sql) === TRUE) {
	} else { echo mysqli_error($conn);
	//die();
}
			$sql = "INSERT INTO notifications (`NAME`, `SERVICE`, `TIME` )
VALUES ('$name','$service', now() ); ";

      if ($conn->query($sql) === TRUE) {
		  
	
	?>
	<script>
	  alert("Cheers! You've Requested Laundry Service. Our PickUP Staff will be with you shortly.");
	  window.location = "pricing.php";
	  $('#successModal').modal('show');
	</script>
	<?php
              die();	  
		 
  } 






									}}							}}}
									}					
								  }								  
								  
} 
$conn->close();
?>