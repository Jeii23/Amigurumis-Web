<?php
session_start();

$product_id = $_POST['id'];
$quantity = $_POST['quantity'];

// Comprueba si ya hay un carrito en la sesión. Si no, crea uno.
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Comprueba si el producto ya está en el carrito. Si no, lo añade.
if (!isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] = 0;
}

// Añade la cantidad especificada del producto al carrito.
$_SESSION['cart'][$product_id] += $quantity;

echo "Producto añadido al carrito.";
?>
