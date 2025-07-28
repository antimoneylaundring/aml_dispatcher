<?php
$host = 'localhost';
$user = 'root';
$pass = ''; // if you're using XAMPP/WAMP, usually password is empty
$db   = 'aml_dispatcher';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// else{
//     echo "connection successfully";
// }
?>
