<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $school_id = $_POST['school_id'];
    $name = $_POST['name'];
    $bill_amount = $_POST['bill_amount'];

    $sql = "UPDATE students SET name='$name', bill_amount='$bill_amount' WHERE school_id='$school_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    $school_id = $_GET['school_id'];
    $sql = "SELECT * FROM students WHERE school_id='$school_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>
    <h1>Edit Student</h1>
    <form method="post" action="">
        <input type="hidden" name="school_id" value="<?php echo $row['school_id']; ?>">
        <p>Enter Name: <input type="text" name="name" value="<?php echo $row['name']; ?>"></p>
        <p>Enter Bill Amount: <input type="number" step="0.01" name="bill_amount" value="<?php echo $row['bill_amount']; ?>"></p>
        <p><input type="submit" name="submit" value="Update"></p>
    </form>
</body>
</html>

<?php $conn->close(); ?>
