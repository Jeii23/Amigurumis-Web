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

    <?php
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $quantity) : ?>
            <!-- Aquí deberías mostrar los detalles del producto -->
            <p>Producto ID: <?php echo $product_id; ?></p>
            <p>Cantidad: <?php echo $quantity; ?></p>
    <?php endforeach;
    } else {
        echo "<p>Tu carrito está vacío.</p>";
    }
    ?>

    <button>Finalizar compra</button>
</body>

</html>