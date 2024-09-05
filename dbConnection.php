<?php
$servername = "localhost";  // or the server address if not localhost
$username = "root";         // your database username
$password = "";             // your database password (empty if none)
$dbname = "my_local_db";    // your actual database name

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
