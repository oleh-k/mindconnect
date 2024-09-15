$(document).ready(function () {
            
    $('#fibonacciForm').on('submit', function (e) {
        e.preventDefault();  
        
        var name = $('#name').val();
        var userInput = $('#user_input').val();


        $.ajax({
            url: '/api/get_fibonacci.php',
            type: 'POST',
            data: {
                name: name,
                user_input: userInput
            },
            success: function (response) {
                alert("Response from server: " + response); 
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus);
            }
        });
    });
});
