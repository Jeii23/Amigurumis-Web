<?php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

$categories = getCategories($password_a8); // Obtiene las categorías 


include __DIR__.'/../view/home.php';

// Devuelve los datos en formato JSON
//header('Content-Type: application/json');
//echo json_encode($categories);
?>