<?php
session_start();

// Comprueba si el ID del producto está establecido
if (isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    // Comprueba si el carrito existe en la sesión
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Elimina el producto del carrito
    unset($_SESSION['cart'][$productId]);
}
?>
