<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigurumi house</title>

    <link rel="stylesheet" href="../style/estilos.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</head>

<body>
    <?php
    $products = $products ?? [];
    $categories = $categories ?? [];
    $searchResults = $searchResults ?? [];
    ?>
    <div class="wrap">
        <div class="header">
            <h1><a href=index.php class="header-link">Amigurumi House</a></h1>
            <form id="search-form" action="../controller/buscar.php" method="get">
                <input id="search-input"type="text" name="query" placeholder="Buscar productos...">
                <input type="submit" value="Buscar">
            </form>

            <!-- Muestra los resultados de la búsqueda -->
            <?php foreach ($searchResults as $product) : ?>
                <div>
                    <h2><?php echo $product['nom']; ?></h2>
                    <p><?php echo $product['descripcio']; ?></p>
                </div>
            <?php endforeach; ?>
            <div class="login_register">
                <?php if (isset($_SESSION['user'])) : ?>
                    <span>Bienvenido, <?php echo $_SESSION['user']['username']; ?></span>
                    <a href="view/cesta.php" class="cesta">
                        <img src="imagenes/cesta.png" alt="Cesta" width="40" height="40">
                    </a>
                    <a href="view/mi_cuenta.php" class="mi_cuenta">Mi cuenta</a>
                    <a href="controller/logout.php" class="logout">Logout</a>
                <?php else : ?>
                    <a href="Login_Register/login.html" class="login">Login</a>
                    <a href="Login_Register/register.html" class="registre">Registro</a>
                <?php endif; ?>
            </div>
        </div>
    </div>




    <div class="store-wrapper">
        <div class="category_list">
            <?php if (is_array($categories)) : ?>
                <?php foreach ($categories as $category) : ?>
                    <a href="index.php?accio=categoria&categoria=<?php echo htmlentities(
                                                                        $category['id'],
                                                                        ENT_QUOTES | ENT_HTML5,
                                                                        'UTF-8'
                                                                    ) ?>" class="category_item" category="<?php echo htmlentities($category['id'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
                    "><?php echo htmlentities($category['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <section class="products-list">
            <?php if (is_array($products)) : ?>
                <?php foreach ($products as $product) : ?>
                    <div class="product-item" category="Esto">
                        <img src='../imagenes/<?php echo $product['imatge'] ?>.png' width="300" height="300" alt='<?php echo $product['nom'] ?>'>
                        <a href="index.php?id=<?php echo $product['id'] ?>"><?php echo $product['nom'] ?></a>
                        <p>Precio: <?php echo $product['preu'] ?>€</p>
                        <button class="details-button">Ver detalles</button>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </div>
    </div>

</body>

</html>