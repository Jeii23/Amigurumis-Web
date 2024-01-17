<?php
session_start();
require_once __DIR__ . '/../model/orders.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

$userId = $_SESSION['user']['id'];
$orders = getOrdersByUserId($userId, $password_a8);

require_once __DIR__ . '/../view/mis_comandas.php';
