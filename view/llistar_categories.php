<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- // views/llistar_categories.php -->
2 <ul>
3 <?php foreach ($categories as $categoria): ?>
4 <li>
5 <h3><?php echo $categoria['nom'] ?> </h3>
6 <p><?php echo $categoria['descripcio'] ?> </p>
7 </li>
8 <?php endforeach; ?>
9 </ul>

</body>
</html>