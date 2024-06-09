<?php
require "app/model/access_db/process/get_pledge_records.php";
?>

<div class="display_details">
   Student List
</div>
<?php if ($result->num_rows > 0): ?>
    <table border="1" style="margin-bottom: 20px;">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>CITE ID</th>
            <th>Total Contribution</th>
            <th>Total Amount</th>
            <?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'admin'): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'admin'): ?>
                    <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                    <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($row['cite_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['pledge']); ?></td>
                    <td><?php echo htmlspecialchars($row['pledgetotal']); ?></td>
                    <td>
                        <a style='margin-right: 20px;' href='?search=editStudentRecord&cite_id=<?php echo urlencode($row['cite_id']); ?>'>Update</a>
                        <a id="deleteStudentRecord" href='#' onclick="deleteStudent('<?php echo urlencode($row['cite_id']); ?>')">Delete</a>
                    </td>
                <?php elseif(isset($_SESSION['status']) || $_SESSION['status'] === 'student' && $_SESSION['cite_id'] === $row['cite_id']): ?>
                    <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                    <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($row['cite_id']); ?></td>
                    <td><?php echo htmlspecialchars($row['pledge']); ?></td>
                    <td><?php echo htmlspecialchars($row['pledgetotal']); ?></td>
                <?php else: ?>
                    <label2>No records found.</label2>
                    <?php break; ?>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
   <label2>Table Empty Nothing found.</label2>
<?php endif; ?>

<?php if(isset($_SESSION['status']) && $_SESSION['status'] === 'admin'): ?>
    <a href="?search=addStudent">Add New Student</a>
<?php endif; ?>
<script src="public/js/xml/delete_student.js"></script>