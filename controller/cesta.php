<?php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

session_start();

$cart = $_SESSION['cart'] ?? [];

// Conecta a la base de datos
$conn = connectaDB($password_a8);

$products = [];

// Recorre cada producto en el carrito
foreach ($cart as $product_id => $quantity) {
    // Utiliza la función getProductById para obtener los detalles del producto
    $product_details = getProductById($product_id, $password_a8);

    // Añade la cantidad al array de detalles del producto
    $product_details[0]['quantity'] = $quantity;

    // Añade los detalles del producto al array de productos
    $products[] = $product_details[0];
}
// Aquí podrías hacer una consulta a la base de datos para obtener los detalles de los productos en el carrito...

include '../view/cesta.php';
?>
