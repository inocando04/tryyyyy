<?php

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a specific table exists
$tableCheckQuery = "SHOW TABLES LIKE '" . $TB_RECORDS . "'";
$result = $conn->query($tableCheckQuery);

if ($result->num_rows == 0) {

    if (!file_exists($SQL_FILEPATH)) {
        die("SQL file does not exist: " . $SQL_FILEPATH);
    }

    $sql = file_get_contents($SQL_FILEPATH);

    // Debug: Output the SQL content
    echo "Executing SQL: \n" . $sql;

    // Execute SQL statements
    if ($conn->multi_query($sql)) {
        do {
            // Store the first result set
            if ($result = $conn->store_result()) {
                $result->free();
            }
        } while ($conn->more_results() && $conn->next_result());
        echo "Tables created successfully.";
    } else {
        echo "Error executing SQL: " . $conn->error;
    }
} else {
    echo "Table " . $TB_RECORDS . " already exists.";
}

// Return the connection for global usage
return $conn;
?>
