$('.cart').on('click', function() {
    $('#cart').modal('show');
});

$('.product-button__add').on('click', function(event) {
    event.preventDefault();

    const name = $(this).data('name');

    $.ajax({
        url: '/cart/add',
        type: 'GET',
        data: {name: name},
        dataType: 'html',
        success: function(result) {
            $('#cart .modal-content').html(result);

            $('.cart').trigger('click');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});