<?php
$accio = $_GET['accio'] ?? NULL;
switch ($accio) {
    case 'llistar-categories':
        include __DIR__.'/controller/llistar_categories.php';
        break;
    default:
        include __DIR__.'/controller/home.php';
        break;
}