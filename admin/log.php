<?php
session_start();
include ("connect.php");
if(isset($_POST['login'])){
	
$username = mysqli_escape_string($conn, $_POST['username']);
$password = mysqli_escape_string($conn, $_POST['password']);

//$password=md5($password);

 /*if ( !filter_var($username, FILTER_SANITIZE_STRING) ||  !filter_var($password, FILTER_SANITIZE_STRING) ){
	 
?>


<?php	 
	 
}*/


	
$sql = "SELECT * from admin where username = '$username' and password= '$password' and status= 1 ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	
  
   while($row = mysqli_fetch_assoc($result)) {
	    $_SESSION['fname'] =$row['FNAME'];
	    $_SESSION['lname'] =$row['LNAME'];
      	$_SESSION['pnumber'] =$row['PNUMBER'];
		$_SESSION['admin_id']= $row['ID'];
		$_SESSION['username']= $row['USERNAME'];
		$_SESSION['email']= $row['EMAIL'];
		
		
		
		
		header ("location: dashboard.php");
              die();
			  
			  
   
   }
   
   
   
}   else {
		
	$_SESSION['error'] = array("Your username or password is incorrect.");
	header ("location: login.php");

die();

   }
   
   
      // if remember me clicked, store value in Cookies
  if (!empty ($_POST['remember'])) {
	  //cookies for username
	  setcookie("user_login", $_POST['username'], time()+ (10 * 365 * 24 * 60 * 60));
	  //cookies for password
	  setcookie("userpassword", $_POST['password'], time()+ (10 * 365 * 24 * 60 * 60));

  }else {
	  if (isset ($_COOKIE["user_login"])) {
		  setcookie ("user_login", " ");
		  if (isset ($_COOKIE["userpassword"])) {
		  setcookie ("userpassword", " ");
		  }
	  }
}

$conn->close();

}
/*  // Making a password hash during registration
  $password_hash = password_hash($password);

  // During login, check if password is correct::
  if(password_verify($password_fromlogin, $password_hash_fromdatabase))
  {
    // The password is correct
  }
  else
  {
    // The password is not correct
  }*/



?>