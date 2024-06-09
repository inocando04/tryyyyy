<?php
require "../../../../config/defined_access/db_config.php";


$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);


if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

$response = ["message" => "Unknown error occurred"]; // Default response message

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $firstname = htmlspecialchars($_POST['add_firstname']);
    $lastname = htmlspecialchars($_POST['add_lastname']);
    $school_id = htmlspecialchars($_POST['add_school_id']);
    $pledge = '0'; // Default pledge value
    $pledgetotal = '280000'; // Default total pledge value

    // Check if the school_id already exists in the database
    $checkQuery = "SELECT cite_id FROM ".$TB_RECORDS." WHERE cite_id = ?";
    $checkStmt = $conn->prepare($checkQuery);

    if (!$checkStmt) {
        $response['message'] = 'Prepare check query failed: ' . $conn->error;
    } else {
        $checkStmt->bind_param("s", $school_id);
        $checkStmt->execute();
        $checkStmt->store_result();

        if ($checkStmt->num_rows > 0) {
            $response['message'] = "School ID already exists.";
        } else {

            $insertQuery = "INSERT INTO ".$TB_RECORDS." (firstname, lastname, cite_id, pledge, pledgetotal) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($insertQuery);

            if (!$stmt) {
                $response['message'] = 'Prepare insert query failed: ' . $conn->error;
            } else {
                $stmt->bind_param("sssss", $firstname, $lastname, $school_id, $pledge, $pledgetotal);

                if ($stmt->execute()) {
                    $response['message'] = "Adding Student Successful.";
                } else {
                    $response['message'] = "Execute insert query failed: " . $stmt->error;
                }
            }

            if (isset($stmt)) {
                $stmt->close();
            }
        }

        $checkStmt->close();
    }
}

$conn->close();

echo json_encode($response);
?>
