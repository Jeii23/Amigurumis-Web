document.addEventListener('DOMContentLoaded', (event) => {

    $(document).ready(function () {
        $('.borrar-todo').click(function (event) {
            event.preventDefault();

            $.ajax({
                url: '../controller/vaciar_carrito.php',
                type: 'POST',
                data: { borrar_todo: true },
                success: function () {
                    location.reload();
                },
                error: function () {
                    console.log('Hubo un problema con la operación de fetch');
                }
            });
        });
    });
    $('.quantity').change(function () {
        var productId = $(this).data('product-id');
        var quantity = $(this).val();

        $.ajax({
            url: '../controller/update_quantity.php',
            type: 'POST',
            data: { product_id: productId, quantity: quantity },
            success: function () {
                location.reload();
            },
            error: function () {
                console.log('Hubo un problema con la operación de fetch');
            }
        });

    });


    $('.remove').click(function () {
        var productId = $(this).data('product-id');

        $.ajax({
            url: '../controller/remove_from_cart.php',
            type: 'POST',
            data: { product_id: productId },
            success: function () {
                location.reload();
            },
            error: function () {
                console.log('Hubo un problema con la operación de fetch');
            }
        });
    });

});
