<?php
// Database configuration
$dbHost     = "ahmaddb.c1p9kjmg9mgh.us-east-1.rds.amazonaws.com";
$dbUsername = "root";
$dbPassword = "ahmad12345";
$dbName     = "ahmaddb";

// Create database connection
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

?>
