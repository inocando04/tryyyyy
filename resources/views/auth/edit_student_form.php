<div class="display_details">
    Update Student Pledge
</div>

    <form class="center_all_in_one_direction" id="editUpdateStudentForm" method="post">
        <label>CITE ID</label>
        <input type="text" name="inputted_citeid">
        <label2>New Total Contributions(amount)</label2>
        <input type="text" name="pledge">
        <button class="submit_button" type="submit" name="submit" value="Update">UPDATE PLEDGE</button>
    </form>
    <div id="responseMessageUpdateStudentRecord"></div>  
    <div class="guide_panel">
        <label2>Already Updated Pledge Amount? <a href="?search=system">Back To Profile</a></label2>
    </div>
    <script src="public/js/xml/update_student_record.js"></script>