<?php
// controller/home.php
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO
$products = getProductes($password_a8); // Agafem els productes 
include __DIR__.'/../view/home.php';
