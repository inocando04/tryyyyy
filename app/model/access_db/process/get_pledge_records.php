<?php
    require "config/defined_access/db_config.php";

    $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    

   $sql = "SELECT * FROM " . $TB_RECORDS;
   $result = $conn->query($sql);
?>