<?php
include 'db.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
</head>
<body>
    <h1>Student List</h1>
    <a href="add.php">Add New Student</a>
    <table border="1">
        <tr>
            <th>School ID</th>
            <th>Name</th>
            <th>Bill Amount</th>
            <th>Actions</th>
        </tr>
        <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['school_id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo number_format($row['bill_amount'], 2, '.', ','); ?></td>
            <td>
                <a href="edit.php?school_id=<?php echo $row['school_id']; ?>">Edit</a>
                <a href="delete.php?school_id=<?php echo $row['school_id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>

<?php $conn->close(); ?>
