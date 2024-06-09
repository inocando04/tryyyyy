<?php
session_start(); 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    require "../../../../config/defined_access/db_config.php";

    $conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $cite_id = $_POST['cite_id'];
    
    // Your deletion logic here
    $sql = "DELETE FROM $TB_RECORDS WHERE cite_id = '$cite_id'";
    $result = $conn->query($sql);
    if ($result) {
        echo 'Success';
    } else {
        echo 'Error';
    }
}
?>
