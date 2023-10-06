<?php
// Database connection parameters
$db_host = "localhost";      // Hostname of the MySQL server
$db_username = "root";       // MySQL username
$db_pass = "root";           // MySQL password
$db_name = "agens";          // Name of the database

// Establish a connection to the MySQL database
$connection = mysqli_connect("$db_host", "$db_username", "$db_pass", "$db_name") or die("Could not connect to MySQL");

// If the connection is successful, $connection now holds the connection object.
// You can use this connection to perform database queries.
// If the connection fails, the script will die and display an error message.
?>
