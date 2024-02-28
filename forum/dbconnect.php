<?php
// Database configuration
$servername = "localhost";
$username = "root"; // default username for XAMP
$password = ""; //default password for XAMP (blank)
$database = "mydb";
//Create connection
$conn = new mysqli($servername, $username, $password,$database);


//Check connection

if ($conn->connect_error) {

	die("Connection failed: " .  $conn->connect_error);

}

?>