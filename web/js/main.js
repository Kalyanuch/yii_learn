$('.cart').on('click', function() {
    $.ajax({
        url: '/cart',
        type: 'GET',
        dataType: 'html',
        success: function(result) {
            $('#cart .modal-content').html(result);

            $('#cart').modal('show');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
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
            // $('#cart .modal-content').html(result);

            $('.cart').trigger('click');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});