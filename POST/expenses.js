$('#expenses').on('submit', function(event) {
    event.preventDefault(); 

    var formData = $(this).serialize();
    var $url = base_url + "expense.php";

    POST($url, formData,
        function(response) {
            if (response.status === "success") {
                SuccessMessage(response.message,1);
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
