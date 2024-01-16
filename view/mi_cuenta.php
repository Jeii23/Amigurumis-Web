<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style/estilos.css">

</head>

<body>
    <div class="wrap">
        <div class="header">
            <h1><a href=../index.php class="header-link">Amigurumi House</a></h1>
        </div>
        <div class="center">
            <?php
            // Inicia la sesión
            session_start();

            // Obtiene los datos del usuario de la sesión
            $user = $_SESSION['user'];
            ?>

            <div class="profile-image">
                <?php if (!empty($user['profile_image'])) : ?>
                    <img src="<?php echo '../fitxers/' . $user['profile_image']; ?>" alt="Foto de perfil">
                <?php else : ?>
                    <img src="../fitxers/default-profile.webp" alt="Foto de perfil por defecto">
                <?php endif; ?>
            </div>
            <form action="../controller/mi_cuenta.php" method="post" enctype="multipart/form-data">
                <div class="column">
                    <label for="username">Nombre:</label><br>
                    <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" pattern="[A-Za-z\s]+" required><br>
                    <label for="email">Correo Electrónico:</label><br>
                    <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br>
                    <label for="password">Contraseña:</label><br>
                    <input type="password" id="password" name="password" pattern="[A-Za-z0-9]+"><br>
                    <input type="file" name="profile_image" /><br>
                    <input type="submit" value="Guardar cambios" />
            </form>

        </div>

</body>

</html>