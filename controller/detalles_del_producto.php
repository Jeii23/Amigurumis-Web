<?php
//controller/detalles_del_producto.php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Obtiene el ID del producto de la URL
$id = $_GET['id'] ?? NULL;

$product = getProductById($id, $password_a8); // Obtiene los detalles del producto 

// Devuelve los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($product);
?>

