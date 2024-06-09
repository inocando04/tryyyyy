<?php
require "../../../../config/defined_access/db_config.php";

// Create connection
$conn = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_NAME, $DB_PORT);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["message" => "Connection failed: " . $conn->connect_error]));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['register_firstname'];
    $lastname = $_POST['register_lastname'];
    $cite_id = $_POST['register_citeid'];
    $password = $_POST['register_password'];
    $retypepassword = $_POST['register_ReTypePassword'];
    $status = "student";

    // Validate password and confirm password match
    if ($password !== $retypepassword) {
        echo json_encode(["message" => "Password does not match."]);
        exit();
    }
    
    $sql1 = "SELECT cite_id FROM " . $TB_USERS;
    $resultusers = $conn->query($sql1);
    
    if ($resultusers->num_rows > 0) {
        while ($row = $resultusers->fetch_assoc()) {
            if ($cite_id === $row["cite_id"]) {
                echo json_encode(["message" => "Cite ID already exists."]);
                exit();
            }
        }
    }

    // Handle image upload
    if (isset($_FILES["profile"]) && $_FILES["profile"]["error"] == 0) {
        $imageData = file_get_contents($_FILES["profile"]["tmp_name"]);
        $imageSize = $_FILES["profile"]["size"];
        $uploadOk = 1;

        // Check file size
        if ($imageSize > 2000000) { // 2MB max size
            echo json_encode(["message" => "Sorry, your file is too large."]);
        }

        // Check if image file is an actual image
        $check = getimagesize($_FILES["profile"]["tmp_name"]);
        if ($check === false) {
            echo json_encode(["message" => "File is not an image."]);
        }

        // Check file format
        $imageFileType = strtolower(pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION));
        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo json_encode(["message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed."]);
        }

        // Insert into database
        $stmt = $conn->prepare("INSERT INTO ". $TB_USERS ." (firstname, lastname, cite_id, image, status, password) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $firstname, $lastname, $cite_id, $imageData, $status, $password);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Registration successful."]);
        } else {
            echo json_encode(["message" => "Error: " . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(["message" => "No file was uploaded or there was an upload error."]);
    }
}

$conn->close();
?>
