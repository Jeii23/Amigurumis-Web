<?php
session_start();

$product_id = $_POST['id'];
$quantity = $_POST['quantity'];


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (!isset($_SESSION['cart'][$product_id])) {
    $_SESSION['cart'][$product_id] = 0;
}

$_SESSION['cart'][$product_id] += $quantity;

echo "Producto añadido al carrito.";
?>
