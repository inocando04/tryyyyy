<?php
require "../../../../config/defined_access/db_config.php";

$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

$response = ["message" => "Unknown error occurred"]; // Default response message

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $school_id = htmlspecialchars($_POST['inputted_citeid']);
    $pledge = htmlspecialchars($_POST['pledge']);

    // Update the pledge for the existing cite id
    $updateQuery = "UPDATE ".$TB_RECORDS." SET pledge = ? WHERE cite_id = ?";
    $updateStmt = $conn->prepare($updateQuery);

    if (!$updateStmt) {
        $response['message'] = 'Prepare update query failed: ' . $conn->error;
    } else {
        $updateStmt->bind_param("ss", $pledge, $school_id);

        if ($updateStmt->execute()) {
            $response['message'] = "Updating Pledge Successful.";
        } else {
            $response['message'] = "Execute update query failed: " . $updateStmt->error;
        }

        $updateStmt->close();
    }
}

$conn->close();

echo json_encode($response);
?>
