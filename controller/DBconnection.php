<?php
$servername = "localhost";
$username = "root";
$password = "root";
$mydb = "filmedb";

// Create connection
$db = mysqli_connect($servername, $username, $password, $mydb);

// Check connection
if ($db->connect_error) {
  die("Connection failed: " . $db->connect_error);
}
?>