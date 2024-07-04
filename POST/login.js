$('#loginForm').on('submit', function(event) {
    event.preventDefault(); 

    var formData = $(this).serialize();
    var $url = base_url + "login.php";

    POST($url, formData,
        function(response) {
            if (response.status === "success") {
                window.location.href = base_url + response.route; 
            } else {

                ErrorMessage(response.message);
            }
        },
        function(error) {
            console.error('Error:', error);
            ErrorMessage('There was a problem with your request.');
        }
    );
});
