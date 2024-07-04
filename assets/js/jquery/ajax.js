


function POST(url, data, onSuccess, onError) {
    $.ajax({
        url: url,
        type: 'POST',
        data: data,
        dataType: 'json', 
        success: function(response) {
            if (typeof onSuccess === 'function') {
                onSuccess(response); 
            }
        },
        error: function(xhr, status, error) {
            if (typeof onError === 'function') {
                onError({
                    status: xhr.status,
                    message: "ERROR",
                    hint: error,
                    response: xhr.responseText
                }); 
            }
        }
    });
}




    function SuccessMessage($message, $type=0){
        if($type==0){
            Swal.fire({
            title: 'Success!',
            text: $message,
            icon: 'success',
            confirmButtonText: 'OKAY'
        });
        }
        else{
            Swal.fire({
                title: 'Success!',
                text: $message,
                icon: 'success',
                confirmButtonText: 'OKAY'
            }).then(() => {
                window.location.reload();
            });;
        }
        
    }

    function ErrorMessage($message){
        Swal.fire({
            title: "Error!",
            text: $message,
            icon: 'error',
            confirmButtonText: 'OKAY'
        });
    }


