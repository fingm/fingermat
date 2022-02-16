<?php
$servername = "localhost";
$database = "MySqlSimple";
$username = "root";
$password = "Newton9.80";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
mysqli_close($conn);
?>