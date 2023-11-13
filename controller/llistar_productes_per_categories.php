<?php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Obtiene la categoría de la URL
$categoria = $_GET['categoria'] ?? NULL;

$products = getProductByCategory($categoria, $password_a8); // Obtiene los productos 

// Devuelve los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($products);
?>
