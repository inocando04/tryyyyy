document.getElementById('addStudentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the default way

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'app/model/access_db/process/add_student_process.php', true);

    xhr.onload = function() {
        var responseMessage = document.getElementById('responseMessageAddStudent');
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            responseMessage.textContent = response.message;

            if (response.message === 'Adding Student Successful.') {
                setTimeout(function() {
                    window.location.href = 'index.php?search=system';
                }, 1000);

                // Clear all input fields in the form
                var inputs = document.querySelectorAll('#addStudentForm input');
                inputs.forEach(function(input) {
                    input.value = '';
                });
            }
        } else {
            responseMessage.textContent = 'An error occurred!';
        }
    };

    xhr.onerror = function() {
        document.getElementById('responseMessageAddStudent').textContent = 'An error occurred during the request.';
    };

    xhr.send(formData); 
});
