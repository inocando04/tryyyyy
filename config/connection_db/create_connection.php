<?php
require "config/defined_access/db_config.php";

// Create connection
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, '', $DB_PORT);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
