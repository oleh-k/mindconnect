
var currentPage = 1;
var perPage = 10;

$(document).ready(function () {


    get_data(currentPage);
            
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
                let o = JSON.parse(response);
                $('#result').text('Your Fibonacci number: ' + o.data.fibonacci);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert("Error: " + textStatus);
            }
        });
    });

    $('#nextBtn').on('click', function () {
        currentPage++;
        get_data(currentPage);
    });

    $('#prevBtn').on('click', function () {
        if (currentPage > 1) {
            currentPage--;
            get_data(currentPage);
        }
    });
});


function get_data (page) {

    $.ajax({
        url: '/api/gat_data.php',
        type: 'GET',
        data: {
            page: page,
            per_page: perPage
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