<?php
// Inicia la sesión al principio de tu archivo
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$accio = $_GET['accio'] ?? NULL;
$categoria = $_GET['categoria'] ?? NULL;

switch ($accio) {
    case 'llistar-categories':
        require_once __DIR__.'/controller/llistar_categories.php';
        require_once __DIR__.'/view/llistar_categories.php';
        break;
    case 'categoria':
        require_once __DIR__.'/controller/llistar_productes_per_categories.php';
        require_once __DIR__.'/view/llistar_productes_per_categories.php';
        break;
    case 'cesta':
        require_once __DIR__.'/controller/cesta.php';
        require_once __DIR__.'/view/cesta.php';
        break;
    case 'finalizar-compra':
        require_once __DIR__.'/controller/finalizar_compra.php';
        break;    
    default:
        require_once __DIR__.'/controller/home.php';
        require_once __DIR__.'/view/home.php';
        break;
}
