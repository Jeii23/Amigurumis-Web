<?php
//index.php
$accio = $_GET['accio'] ?? NULL;
$categoria = $_GET['categoria'] ?? NULL;
switch ($accio) {
    case 'llistar-categories':
        include __DIR__.'/controller/llistar_categories.php';
        break;
    case 'categoria':
        include __DIR__.'/controller/llistar_productes_per_categories.php';
        break;
    default:
        include __DIR__.'/controller/home.php';
        break;
}
