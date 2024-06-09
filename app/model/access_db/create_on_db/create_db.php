<?php

require "config/connection_db/create_connection.php";

// Check if the database exists, if not, create it
$dbCheckQuery = "SHOW DATABASES LIKE '" . $DB_NAME . "'";
$result = $conn->query($dbCheckQuery);

if ($result->num_rows == 0) {
    $createDBQuery = "CREATE DATABASE " . $DB_NAME;
    if ($conn->query($createDBQuery) === TRUE) {
        echo "Database created successfully.";
    } else {
        die("Error creating database: " . $conn->error);
    }
}

$conn->close();
?>
