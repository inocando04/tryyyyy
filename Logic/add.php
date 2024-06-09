<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $school_id = $_POST['school_id'];
    $name = $_POST['name'];

    $sql = "INSERT INTO students (school_id, name) VALUES ('$school_id', '$name')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
</head>
<body>
    <h1>Add Student</h1>
    <form method="post" action="">
        <p>Enter School ID: <input type="text" name="school_id" required></p>
        <p>Enter Name: <input type="text" name="name" required></p>
        <p><input type="submit" name="submit" value="Add"></p>
    </form>
</body>
</html>

<?php $conn->close(); ?>
