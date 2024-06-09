function deleteStudent(cite_id) {
    if (confirm('Are you sure?')) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'app/model/access_db/process/delete_student_record.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Reload the page after deleting the row
                location.reload();
            }
        };
        xhr.send('cite_id=' + cite_id);
    }
    return false; // Prevent the default link behavior
}
