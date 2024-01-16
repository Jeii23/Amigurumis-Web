<?php
// controller/buscar.php
require_once __DIR__ . '/../model/connectaDB.php';
require_once __DIR__ . '/../model/products.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// controller/buscar.php

$query = $_GET['query'];

// Busca productos que coincidan con la consulta
$products = searchProducts($query, $password_a8);

// Comprueba si $products es un array
if (is_array($products)) {
    // Si $products es un array, lo convierte en JSON y lo devuelve
    // Devuelve los productos que coinciden en formato JSON
    header('Content-Type: application/json');
    echo json_encode($products);
} else {
    // Si $products no es un array, devuelve un error
    echo json_encode([]);
}
