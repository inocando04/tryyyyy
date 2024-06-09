<?php
session_start();
require "../../../../config/defined_access/db_config.php";

// Create connection
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize input data
    $hardcoded_citeid = $conn->real_escape_string($_POST['hardcoded_citeid']);
    $hardcoded_password = $conn->real_escape_string($_POST['hardcoded_password']);

    // SQL query to select data
    $sql1 = "SELECT firstname, lastname, cite_id, image, status, password FROM " . $TB_USERS;
    $resultusers = $conn->query($sql1);

    $loginSuccessful = false;
    $invalidPassword = false;

    while($row = $resultusers->fetch_assoc()) {
        if($hardcoded_citeid === $row['cite_id']) {
            if ($hardcoded_password === $row['password']) {
                
                $_SESSION['fullname'] = $row['firstname'] . " " . $row['lastname'];
                $_SESSION['status'] = $row['status'];
                $_SESSION['cite_id'] = $row['cite_id'];

                $imageData = $row['image'];
                header("Content-type: image/png");
                $_SESSION['profile_image'] = $imageData;

                echo json_encode(["message" => "Login successfully."]);
                $loginSuccessful = true;
                break;
            } else {
                $invalidPassword = true;
            }
        }
    }

    if (!$loginSuccessful) {
        if ($invalidPassword) {
            echo json_encode(["message" => "Invalid password."]);
        } else {
            echo json_encode(["message" => "Account didn't exist."]);
        }
    }
}

$conn->close();
?>
