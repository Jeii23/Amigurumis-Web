<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- // views/llistar_categories.php -->
    <ul>
        <?php include __DIR__ . '/../controller/llistar_categories.php'; ?>


        <?php foreach ($products as $product) : ?>
            <li>
                <h3><?php echo $product['nom'] ?></h3>
                <img src='<?php echo $product['imatge'] ?>' alt='<?php echo $product['nom'] ?>'>
                <p>Descripcion: <?php echo $product['descripcio'] ?></p>
                <?php echo $product['activo'] ? "<p>Activo</p>" : "<p>Inactivo</p>"; ?>
                <p>ID: <?php echo $product['id'] ?></p>
                <p>Precio: <?php echo $product['preu'] ?>€</p>
                <button class="añadir_carrito" data-id="<?php echo $product['id']; ?>">Añadir al carrito</button>
            </li>
        <?php endforeach; ?>

    </ul>
</body>

</html>