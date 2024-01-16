<?php 
require_once __DIR__.'/../model/connectaDB.php';
require_once __DIR__.'/../model/categories.php';

$password_a8 = 'Viz3uVkJ'; //NO ESTOY SEGURO

// Inicia la sesión solo si no hay una sesión activa
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="../style/estilos.css">
</head>
<?php
$total_quantity = 0;
$total_cost = 0;

if (isset($_SESSION['cart'])) {  // Comprueba si el carrito existe
    foreach ($_SESSION['cart'] as $product_id => $quantity): 
        $product_details = getProductById($product_id, $password_a8); 

        // Suma la cantidad y el costo del producto al total
        // <p>Precio:<?php echo $product_details[0]['preu'];
        // <p>Cantidad: <?php echo $quantity; 
    
        $total_quantity += $quantity;
        $total_cost += $product_details[0]['preu'] * $quantity;
    endforeach; 
}
?>
<div class="cart-summary">
    <h2>Resumen del carrito:</h2>
    <?php if ($total_quantity > 0): ?>
        <?php foreach ($_SESSION['cart'] as $product_id => $quantity): 
            $product_details = getProductById($product_id, $password_a8); ?>
            <div class="cart-item">
                <p><?php echo $product_details[0]['nom']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No hay productos en el carrito.</p>
    <?php endif; ?>
    <p>Productos totales: <?php echo $total_quantity; ?></p>
    <p>Costo total: <?php echo $total_cost; ?>€</p>
</div>


