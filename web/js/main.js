$('.cart').on('click', function(event) {
    event.preventDefault();

    $.ajax({
        url: '/cart',
        type: 'GET',
        dataType: 'html',
        success: function(result) {
            $('#cart .modal-content').html(result);

            $('#cart').modal('show');

            refreshHeaderCart();
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
            $('.cart').trigger('click');


        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
});

$('.modal-content').on('click', '.btn-close', function(event) {
    event.preventDefault();

    $(this).closest('.modal').modal('hide');
});

$('.modal-content').on('click', '.clear_cart', function(event) {
    event.preventDefault();

    if(confirm('Очистить корзину?'))
    {
        $.ajax({
            url: '/cart/clear',
            type: 'GET',
            dataType: 'html',
            success: function(result) {
                $('#cart .modal-content').html(result);

                refreshHeaderCart();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
});

$('.modal-content').on('click', '.delete span', function(event) {
    event.preventDefault();

    const product = parseInt($(this).data('product'));

    if(product)
    {
        $.ajax({
            url: '/cart/remove',
            type: 'GET',
            data: {product: product},
            dataType: 'html',
            success: function(result) {
                $('#cart .modal-content').html(result);

                refreshHeaderCart();
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
});

function refreshHeaderCart()
{
    $.ajax({
        url: '/cart/total',
        type: 'GET',
        dataType: 'html',
        success: function(result) {
            $('.header .cart span').html('(' + result + ')');
        },
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        }
    });
}

$(document).ready(function() {
    refreshHeaderCart();
});