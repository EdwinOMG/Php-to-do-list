<?php
$hostname = 'localhost';
$username = 'root';
$password = 'root';
$database = 'php_project';


$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
  echo ();
}
?>
