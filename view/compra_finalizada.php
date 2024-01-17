<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigurumi house</title>

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
    <h1>Compra finalitzada</h1>
</body>
</html>