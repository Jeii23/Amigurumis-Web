<?php
// controller/llistar_productes_per_categories.php

require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Obtiene la categoría de la URL
$categoria = $_GET['categoria'] ?? NULL;

$products = getProductByCategory($categoria, $password_a8); // Agafem els productes 
$categories = getCategories($password_a8); // Agafem els productes 

include __DIR__.'/../view/home.php';

?>