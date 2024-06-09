<?php
include 'db.php';

$school_id = $_GET['school_id'];

$sql = "DELETE FROM students WHERE school_id='$school_id'";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
