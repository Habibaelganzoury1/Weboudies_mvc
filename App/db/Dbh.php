<?php
$hostname = 'localhost';  // Replace with your database host
$username = 'root';  // Replace with your database username
$password = '';  // Replace with your database password
$database = 'oudies';  // Replace with your database name

// Create a connection
$conn = new mysqli($hostname, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Close the connection (optional)
?>