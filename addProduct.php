<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT');
header('Access-Control-Max-Age: 86400');
header('Access-Control-Allow-Headers: X-PINGOTHER, Content-Type, Origin, Authorization, Accept, Client-Security-Token');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dangki";

$json = file_get_contents('php://input');
$data = json_decode($json, true);

$usernamePost = (isset($data["username"])) ? $data["username"] : 0;
$passwordPost = (isset($data["password"])) ? $data["password"] : 0;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (email, password) VALUES ('$usernamePost', '$passwordPost')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>