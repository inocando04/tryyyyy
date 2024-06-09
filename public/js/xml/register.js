document.getElementById('registerForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the form from submitting the default way

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'app/model/access_db/process/register_process.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById('responseMessageRegister').textContent = response.message;

            if (response.message === 'Registration successful.') {
                setTimeout(function() {
                    window.location.href = 'index.php?search=login';
                }, 1000);

                // Clear all input fields in the form
                var inputs = document.querySelectorAll('#registerForm input');
                inputs.forEach(function(input) {
                   input.value = '';
                });      

            }
        } else {
            document.getElementById('responseMessageRegister').textContent = 'An error occurred!';
        }
    };

    xhr.send(formData); 
});
