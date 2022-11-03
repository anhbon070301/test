<?php
header('Access-Control-Allow-Origin: *');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dienthoai";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$query = "SELECT * FROM product";
$result = $conn->query($query);
$temparray = array();

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
        array_push($temparray, $row);
    } 
}   
echo json_encode($temparray);
?>