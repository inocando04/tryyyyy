<?php

require "config/defined_access/db_config.php";

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT image FROM ". $TB_USERS ." WHERE cite_id='" . $_SESSION['cite_id'] . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the image data
    $row = $result->fetch_assoc();
    $imageData = $row['image'];

    // Debugging: Check if image data is retrieved
    if ($imageData) {
        $base64Image = base64_encode($imageData);
        echo '<img class="profile_view" src="data:image/jpeg;base64,' . $base64Image . '" />';
    } else {
        echo "Image data is empty.";
    }
    
} else {
    echo "No image found for the specified user.";
}

$conn->close();
?>
