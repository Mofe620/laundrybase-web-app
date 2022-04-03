 <?php
// conection file to connect web portal to database 

$servername = "localhost"; // your host
$username1 = "root";// database username
$password = ""; // database password
$database="lb"; // database name

// Create connection
$conn = new mysqli($servername, $username1, $password, $database);

try {
    require_once "connect.php";
}catch (Exception $e){
    $error = $e->getMessage();
    echo $error;
}

// Check connection or produce error
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>