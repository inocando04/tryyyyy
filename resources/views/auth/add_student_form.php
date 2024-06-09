<div class="display_details">
    Add Student
</div>

    <form class="center_all_in_one_direction" id="addStudentForm" method="post">
        <label>First Name:</label>
        <input type="text" name="add_firstname" required>
        <label>Last Name:</label>
        <input type="text" name="add_lastname" required>
        <label>CITE ID:</label>
        <input type="text" name="add_school_id" required>
        <button class="submit_button" type="submit" name="submit" value="Add">Submit</button>
    </form>
    <div id="responseMessageAddStudent"></div>  
    <div class="guide_panel">
        <label2>CITE ID already exits? <a href="?search=system">Back To Profile</a></label2>
    </div>
    <script src="public/js/xml/add_student.js"></script>