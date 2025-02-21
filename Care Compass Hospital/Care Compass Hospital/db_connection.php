<?php
// Database connection details
$host = 'localhost'; // Database host
$username = 'root';  // Database username
$password = '';      // Database password (for XAMPP default is empty)
$dbname = 'hospital_db'; // Database name

// Create connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
