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
    <h1>Mis Pedidos</h1>
    <?php if (is_array($orders) && count($orders) > 0) : ?>
        <?php
        $contador = 1;
        foreach ($orders as $order) : ?>
            <div class="order">
                <h2>Pedido <?php echo $contador; ?></h2>
                <p>Data y hora: <?php echo $order['data_i_hora']; ?></p>
                <p>Importe total: <?php echo $order['import_total']; ?>€</p>
                <p>Cantidad total de productos: <?php echo $order['quantitat_total_productes']; ?></p>
            </div>
        <?php
            $contador++;
        endforeach; ?>

    <?php else : ?>
        <p>No tienes ninguna comanda.</p>
    <?php endif; ?>

</body>

</html>