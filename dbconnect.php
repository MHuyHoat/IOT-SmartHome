<?php
$database = "iotlight";
$username = "admin";
$password = "1223";
// Create connection
$conn = mysqli_connect("localhost", $username,$password,$database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>