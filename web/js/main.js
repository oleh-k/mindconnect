$(document).ready(function () {

    get_data();
            
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


function get_data () {
    $.ajax({
        url: '/api/gat_data.php',
        type: 'GET',
        data: {
            page: 1,
            per_page: 10
        },
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                var tableBody = '';

                for (var i = 0; i < response.data.length; i++) {
                    tableBody += '<tr>';
                    tableBody += '<td>' + response.data[i].name + '</td>';
                    tableBody += '<td>' + response.data[i].user_input + '</td>';
                    tableBody += '<td>' + response.data[i].fibonacci_number + '</td>';
                    tableBody += '</tr>';
                }

                $('#fibonacciTable tbody').html(tableBody);
            } else {
                alert('Failed to fetch data.');
            }
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus);
        }
    });
}