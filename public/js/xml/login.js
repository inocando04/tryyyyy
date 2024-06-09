document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault(); 

    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'app/model/access_db/process/login_process.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            document.getElementById('responseMessageLogin').textContent = response.message;

            if (response.message === 'Login successfully.') {
                setTimeout(function() {
                    window.location.href = 'index.php?search=system';
                }, 1000);

                //removing the header_out and adding the header_in
                removingHeaderOutThenAddHeaderIn();

                var inputs = document.querySelectorAll('#loginForm input');
                inputs.forEach(function(input) {
                    input.value = '';
                });
            }
        } else {
            document.getElementById('responseMessageLogin').textContent = 'An error occurred!';
        }
    };

    xhr.send(formData);
});


