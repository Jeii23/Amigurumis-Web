<?php
session_start();

// Comprueba si el ID del producto y la cantidad están establecidos
if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Comprueba si el carrito existe en la sesión
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Actualiza la cantidad del producto en el carrito
    $_SESSION['cart'][$productId] = $quantity;
}
?>
