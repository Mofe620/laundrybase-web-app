<?php
session_start();
try {
  require_once "connect.php";
}
catch (Exception $e){
  $error = $e->getMessage();
  echo $error;
  die();
}

if (isset($_POST['login'])) {

  //Simple Filter
  $number = filter_input(INPUT_POST, 'pnumber', FILTER_SANITIZE_SPECIAL_CHARS);
  $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

  //Escaping it for the sake of Mysqli database charset compatibility
  $number = mysqli_escape_string($conn, $_POST['pnumber']);
  $email = mysqli_escape_string($conn, $_POST['email']);

  $sql = "SELECT * from clients where `PNUMBER` = '$number' and `EMAIL`= '$email' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {

    while ($row = mysqli_fetch_assoc($result)) {
      $_SESSION['name'] = $row['NAME'];
      $_SESSION['address'] = $row['ADDRESS'];
      $_SESSION['pnumber'] = $row['PNUMBER'];
      $_SESSION['userid'] = $row['O-ID'];
      $_SESSION['email'] = $row['EMAIL'];
      $userid = $row['O-ID'];

      header("location: loggedin_pickup.php");
      die();
    }

  } else {
      ?>
        <script type="text/javascript">
          alert("Incorrect Data. Please ensure you correctly fill in your Login Details ");
          window.location = "index.php";
        </script>
      <?php die();
    }
}


// if remember me clicked, store value in Cookies
if (!empty($_POST['remember'])) {
  //cookies for username format : cookie_name, cookie_value, cookie expiration
  setcookie("user", $_POST['pnumber'], time() + (10 * 365 * 24 * 60 * 60)); //10 years
  //cookies for password
  setcookie("user_email", $_POST['email'], time() + (10 * 365 * 24 * 60 * 60));//10 years
} else {
    if (isset($_COOKIE["user_login"])) {
      setcookie("user_login", "");
    if (isset($_COOKIE["userpassword"])) {
      setcookie("userpassword", "");
    }
  }
}

$conn->close();


// Making a password hash during registration
// $password_hash = password_hash($password);

// During login, check if password is correct::
//if(password_verify($password_fromlogin, $password_hash_fromdatabase))
//{ The password is correct } else { The password is not correct }

?>