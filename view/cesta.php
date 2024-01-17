<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de la compra</title>
    <link rel="stylesheet" href="../style/estilos.css">
    <script src="../js/scriptCesta.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>

<body>
    <div class="wrap">
        <div class="header">
            <h1><a href=../index.php class="header-link">Amigurumi House</a></h1>
            <div class="login_register">
                <span>Bienvenido, <?php echo $_SESSION['user']['username']; ?></span>
                <a href="../view/cesta.php" class="cesta">
                    <img src="../imagenes/cesta.png" alt="Cesta" width="40" height="40">

                </a>
                <a href="../view/mi_cuenta.php" class="mi_cuenta">Mi cuenta</a>
                <a href="../controller/logout.php" class="logout">Logout</a>
            </div>
        </div>
    </div>

    <h1>Carrito de la compra</h1>
    <?php include __DIR__ . '/../controller/cesta.php'; ?>

    <?php

    if (!empty($products)) {
        foreach ($products as $product) {
            echo "<p>Producto: " . $product['nom'] . "</p>";
            echo "<img class='product-image' src='../imagenes/" . $product['imatge'] . ".png' alt='" . $product['nom'] . "'>";
            echo "<p>Precio: " . $product['preu'] . "€</p>";
            echo "<p>Cantidad: <input type='number' class='quantity' data-product-id='" . $product['id'] . "' value='" . $product['quantity'] . "' min='1'></p>";
            echo "<button class='remove' data-product-id='" . $product['id'] . "'>Eliminar</button>";
        }
    } else {
        echo "<p>Tu carrito está vacío.</p>";
    }
    $total = 0;
    foreach ($products as $product) {
        $total += $product['preu'] * $product['quantity'];
    }
    echo "<p>Total: " . $total . "€</p>";
    ?>

    <button class="finalizar-compra" onclick="window.location.href='../index.php?accio=finalizar-compra'">Finalizar compra</button>
    <button class="borrar-todo">Borrar todo</button>

</body>

</html>