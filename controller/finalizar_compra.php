<?php
require_once __DIR__ . '/../model/orders.php';
require_once __DIR__ . '/../model/categories.php';

$password_a8 = 'Viz3uVkJ';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$cart = $_SESSION['cart'] ?? [];

if (empty($cart)) {
    echo "<script>alert('Tu carrito está vacío. Agrega productos antes de realizar la compra.'); window.location.href='../view/cesta.php';</script>";
    exit;
}

if (createOrder($cart, $password_a8)) {
    echo "<script>alert('La compra se ha realizado correctamente.'); window.location.href='../view/compra_finalizada.php';</script>";
} else {
    echo "<script>alert('Hubo un error al realizar la compra.'); window.location.href='../view/cesta.php';</script>";
}
