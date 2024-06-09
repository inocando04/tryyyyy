document.getElementById('editUpdateStudentForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the default way

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'app/model/access_db/process/append_pledge_record.php', true);
    // Update the content type header
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function() {
        var responseMessage = document.getElementById('responseMessageUpdateStudentRecord');
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            responseMessage.textContent = response.message;

            if (response.message === 'Updating Pledge Successful.') {
                setTimeout(function() {
                    window.location.reload(); // Reload the page to update the student record
                }, 1000);

                // Clear all input fields in the form
                var inputs = document.querySelectorAll('#editUpdateStudentForm input');
                inputs.forEach(function(input) {
                    input.value = '';
                });
            }
        } else {
            responseMessage.textContent = 'An error occurred!';
        }
    };

    xhr.onerror = function() {
        document.getElementById('responseMessageUpdateStudentRecord').textContent = 'An error occurred during the request.';
    };

    // Send the form data
    xhr.send(new URLSearchParams(formData));
});
