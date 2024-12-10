<?php
// Database connection
$host = 'localhost';
$username = 'root'; // your database username
$password = ''; // your database password
$dbname = 'spaceece_learning';

// Create a connection
$conn = mysqli_connect($host, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>