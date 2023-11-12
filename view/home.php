<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amigurumi house</title>

    <link rel="stylesheet" href="../style/estilos.css">
    
    <script src="js/script.js"></script>
</head>

<body>
    <div class="wrap">
        <div class="header">
            <h1><a href=index.php class="header-link">Amigurumi House</a></h1>
            <div class="login_register">
                <a href="Login_Register/login.html" class="category_item">Login</a>
                <a href="Login_Register/register.html" class="category_item">Registro</a>
            </div>
        </div>
   
    
        <div class="store-wrapper">
            <div class="category_list">
                <a href="index.php?accio=categoria&categoria=Anime" class="category_item" category="all">Anime</a>                
                <a href="index.php?accio=categoria&categoria=Fantasia" class="category_item" category="all">Fantasia</a>
                <a href="index.php?accio=categoria&categoria=Animal" class="category_item" category="all">Animales</a>
                <a href="index.php?accio=categoria&categoria=Planta" class="category_item" category="all">Plantas</a>
                <a href="index.php?accio=categoria&categoria=Espacio" class="category_item" category="all">Espacio</a>
                <a href="index.php?accio=categoria&categoria=Juegos" class="category_item" category="all">Juegos</a>
                <a href="index.php?accio=categoria&categoria=cienciaFiccion" class="category_item" category="all">Ciencia Ficcion</a>
            </div>
            <section class="products-list">
                <?php foreach ($products as $product): ?>
                    <div class="porduct-item" category="Esto">
                    <img src='../imagenes/<?php echo $product['imatge'] ?>.png' width="300" height="300" alt='<?php echo $product['nom'] ?>'>
                        <a href="#"><?php echo $product['nom'] ?></a>
                        <p><?php echo $product['descripcio'] ?></p>
                        <p>Precio: <?php echo $product['preu'] ?>€</p>
                    </div>
                <?php endforeach; ?>
            </section>
        </div>
    </div>

</body>

</html>
